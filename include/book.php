<head>
<script type="text/javascript" src="location.js"></script>
</head>

<a href="javascript:history.go(-1)">back</a>
<hr>

<?

$date = $_REQUEST[date];
$fecha = getdate($date);
$hoy = date("l d, F Y", mktime(0, 0, 0, $fecha[mon], $fecha[mday], $fecha[year]));



print "You are booking an event for<br> <b>$hoy</b> \n";

print '<hr>';

print "<form action=\"$_SERVER[PHP_SELF]\" method=\"POST\"> \n";

include 'bookform.php';

print '</form>'."\n";

//print_r($fecha);


?>