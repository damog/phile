<?

if(basename($_SERVER[HTTP_REFERER]) == basename($_SERVER[PHP_SELF]) and $_POST) {
	   print_r($_POST);
} else {
?>


<head>
<script type="text/javascript" src="location.js"></script>
</head>
<body>
<form>

<table border="1">
<tr>
<td>Region</td>
<td>Country</td>
<td>Province/City</td>
</tr>

<tr>
<td>
<select onchange="set_country(this,country,city_state)" size="1" name="region">
<option value="" selected="selected">Select region</option>
<option value=""></option>
<script type="text/javascript">
setRegions(this);
</script>
</select>
</td>

<td>
<select name="country" size="1" disabled="disabled" onchange="set_city_state(this,city_state)"></select>
</td>

<td>
<select name="city_state" size="1" disabled="disabled" onchange="print_city_state(country,this)"></select>
</td>

</tr>
</table>
</form>
</body>
					  <? } ?>