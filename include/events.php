<?

$year = $_REQUEST[y];
$month = $_REQUEST[m];
$day = $_REQUEST[d];

if($year == '') {
  $year = date(Y);
}

if($month == '') {
  $month =date(n);
}

if($day == '') {
  $day = date(j);
}

$nextd = $day + 1;
$nextm = $month;

if($nextd > date("t", mktime(0, 0, 0, $month, $day, $year))) {
  $nextd = 1;
  $nextm = $month + 1;
}

if($nextm > 12) {
  $nextm -= 12;
  $nexty = $year + 1;
} else {
  $nexty = $year;
}

$prevd = $day - 1;
$prevm = $month;
if($prevd < 1) {
  $prevd = date("t", mktime(0, 0, 0, $month - 1, $day, $year));
  $prevm = $month - 1;
}

if($prevm < 1) {
  $prevm += 12;
  $prevy = $year - 1;
} else {
  $prevy = $year;
}


$date = mktime(0, 0, 0, $month, $day, $year);

print "<a href=\"javascript:history.go(-1)\">back</a>";
print "<h1>";
print date("l j, F Y", $date);
print "</h1>";
print "<a href=\"events.php?y=$prevy&m=$prevm&d=$prevd\">previous day</a> - ";
print "<a href=\"book.php?date=$date\">book an event this day</a> - ";
print "<a href=\"events.php?y=$nexty&m=$nextm&d=$nextd\">next day</a>";
print "<hr>";

?>