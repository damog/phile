<a href="javascript:history.go(-1)">back</a>
<hr>

<?

$date = $_REQUEST[date];
$fecha = getdate($date);
$hoy = date("l d, F Y", mktime(0, 0, 0, $fecha[mon], $fecha[mday], $fecha[year]));



print "You are booking an event for<br> <b>$hoy</b>";

print '<hr>';

include 'bookform.php';

//print_r($fecha);


?>