<?php
# PHP Calendar (version 2)
# http://keithdevens.com/software/php_calendar
#  see example at http://keithdevens.com/weblog
# License: http://keithdevens.com/software/license



$mes = $_REQUEST[m];
$anio = $_REQUEST[y];

if($mes == '' || $anio == '') {
  $anio = date(Y);
  $mes = date(n);
}

$prevm = $mes-1;
$prevy = $anio;
$nextm = $mes+1;
$nexty = $anio;

if($prevm < 1) {
  $prevm += 12;
  $prevy--;
}

if($nextm > 12) {
  $nextm -= 12;
  $nexty++;
}

print "<center>";
print "<a href=\"$_SERVER[PHP_SELF]\">today</a><hr>";
print "<a href=\"$_SERVER[PHP_SELF]?y=$prevy&m=$prevm\"><--- Previous</a> ";
print "<a href=\"$_SERVER[PHP_SELF]?y=$nexty&m=$nextm\"> Next ---></a>";
print "<br><br>";
print generate_calendar($anio, $mes);


function generate_calendar($year, $month, $days = array(), $day_heading_length = 3, $month_href = NULL){
	$first_of_month = mktime (0,0,0, $month, 1, $year);
	#remember that mktime will automatically correct if invalid dates are entered
	# for instance, mktime(0,0,0,12,32,1997) will be the date for Jan 1, 1998
	# this provides a built in "rounding" feature to generate_calendar()

	static $day_headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$maxdays   = date('t', $first_of_month); #number of days in the month
	$date_info = getdate($first_of_month);   #get info about the first day of the month
	$month     = $date_info['mon'];
	$year      = $date_info['year'];

	$calendar  = '<table class="calendar">'."\n";

	#use the <caption> tag or just a normal table heading. Take your pick.
	#http://diveintomark.org/archives/2002/07/03.html#day_18_giving_your_calendar_a_real_caption
	#$calendar .= "<tr><th colspan=\"7\" class=\"month\">$date_info[month], $year</th></tr>\n";
	$calendar .= '<caption class="month">'.
		($month_href ? '<a href="'.htmlspecialchars($month_href).'">' : '').
		"$date_info[month], $year".
		($month_href ? '</a>' : '').
		"</caption>\n";

	#print the day headings "Mon", "Tue", etc.
	# if day_heading_length is 4, the full name of the day will be printed
	# otherwise, just the first n characters
	if($day_heading_length > 0 and $day_heading_length <= 4){
		$calendar .= '<tr>';
		foreach($day_headings as $day_heading){
			$calendar .= '<th abbr="'.$day_heading.'" class="dayofweek">'.
				($day_heading_length != 4 ? substr($day_heading, 0, $day_heading_length) : $day_heading) .
			'</th>';
		}
		$calendar .= "</tr>\n";
	}
	$calendar .= '<tr>';

	$weekday = $date_info['wday']; #weekday (zero based) of the first day of the month
	$day = 1; #starting day of the month

	#take care of the first "empty" days of the month
	if($weekday > 0){$calendar .= '<td colspan="'.$weekday.'">&nbsp;</td>';}

	#print the days of the month
	while ($day <= $maxdays){
		if($weekday == 7){ #start a new week
			$calendar .= "</tr>\n<tr>";
			$weekday = 0;
		}
		if(isset($days[$day]) and is_array($days[$day])){
			$d = &$days[$day];
			#stupid PHP notices....
			$link    = isset($d[0]) ? $d[0] : NULL;
			$classes = isset($d[1]) ? $d[1] : NULL;
			$content = isset($d[2]) ? $d[2] : NULL;

			$calendar .= '<td' . ($classes ? ' class="'.htmlspecialchars($classes).'">' : '>') .
				($link ? '<a href="'.htmlspecialchars($link).'">' : '') .
				(isset($content) ? $content : $day) .
				($link ? '</a>' : '') .
				'</td>';
		}else{
			$calendar .= '<td>'.$day.'</td>';
		}
		$day++;
		$weekday++;
	}
	#take care of the remaining "empty" days of the month
	if($weekday != 7){$calendar .= '<td colspan="'.(7-$weekday).'">&nbsp;</td>';}

	return $calendar . "</tr>\n</table>\n";
}



?>
