<?php
print "<center>";
print "<a href=\"$_SERVER[PHP_SELF]\">this month</a> | <a href=\"$_SERVER[PHP_SELF]?v=y\">this year</a><hr>";

if($_REQUEST[v] == 'm' or $_REQUEST[v] == '') {
  $mes = $_REQUEST[m];
  $anio = $_REQUEST[y];
  
  if($mes == '') {
    $mes = date(n);
  }
  
  if($anio == '') {
    $anio = date(Y);
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

  print "<a href=\"$_SERVER[PHP_SELF]?y=$prevy&m=$prevm\"><- previous month</a> ";
  print "<a href=\"$_SERVER[PHP_SELF]?y=$nexty&m=$nextm\"> next month -></a>";
  print "<br><br>";
  print drawCalendar($mes, $anio);
} else {
  $anio = $_REQUEST[y];
  if($anio == '') {
    $anio = date(Y);
  }
  $prevy = $anio-1;
  $nexty = $anio +1;

  print "<a href=\"$_SERVER[PHP_SELF]?v=y&y=$prevy\"><- previous year</a> ";
  print "<a href=\"$_SERVER[PHP_SELF]?v=y&y=$nexty\"> next year -></a>";
  print "<h1>$anio</h1>";
  for($a = 1; $a <= 12; $a++) {
    print drawcalendar($a,$anio)."<hr>";
  }

}



function DayOfWeek($month,$year)
{
$firstofthemonth = strtotime("$month/01/$year");
$firstofthemonthArray = getdate($firstofthemonth);
$startday = $firstofthemonthArray['wday'];
return $startday;
}

function DaysInMonth($month, $year)
{
 for ($i = 31; $i > 0; $i--) {
  if (checkdate($month, $i, $year)) {
   return $i;
  }
 }
 return 0;
}

function DrawCalendar($month, $year)
{
 $DateArray = getdate(strtotime("$month/01/$year"));

 echo ("<table border=1> \n");
 echo ("<tr><td colspan=\"7\" align=\"center\">\n");
 echo $DateArray['month']." ".$year;
 echo ("</td></tr>\n");
 echo ("<tr>");
 echo ("<td width=\"15%\" align=\"center\">Sun</td>");
 echo ("<td width=\"14%\" align=\"center\">Mon</td>");
 echo ("<td width=\"14%\" align=\"center\">Tue</td>");
 echo ("<td width=\"14%\" align=\"center\">Wed</td>");
 echo ("<td width=\"14%\" align=\"center\">Thu</td>");
 echo ("<td width=\"14%\" align=\"center\">Fri</td>");
 echo ("<td width=\"15%\" align=\"center\">Sat</td>");
 echo ("</tr>\n");

  $dayofweek = DayOfWeek($month, $year);
  $daysinmonth = DaysInMonth($month, $year);
  $lastcell = ( ceil(($daysinmonth + $dayofweek) / 7 )*7 );
  for($i = 0; $i < $lastcell; $i = $i + 1)
  {
    if( $i % 7 == 0)
      echo ("<tr>\n");
    if($i < $dayofweek OR $i > $daysinmonth + $dayofweek -1)
      echo ( "<td>&nbsp;</td>\n");
    else
    {
      $date = $i - $dayofweek +1;
      $printdate = "<a href=\"events.php?y=$year&m=$month&d=$date\">$date</a>";
      if($date == date(j)) {
	echo "<td bgcolor=\"#c8bbbb\" align=\"center\"><b>$printdate</b></td>";
      } else {
      echo("<td align=\"center\">$printdate</td>\n");
      }
    }
    if( (($i+1)%7) == 0)
        echo("</tr>");
 }
  echo ("</table>\n");
}
?>