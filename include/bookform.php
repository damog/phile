<?
print '<p>Event\'s name:<br>';
?>

<input type="text" name="name" maxlength="255" size="40" />
</p>

<p>Start date of event: <br>
<? print $hoy; ?> at 
<select name="starttime">
<?
for($a = 8; $a < 21; $a++) {
  echo "<option value=\"$a\">$a:00";
}
?>
</select>

<select name="startgmt">
<?
for($a = -12; $a < 12; $a++) {
  if($a == 0) {
    print "<option selected value=\"$a\">GMT";
  } else {
    print "<option value=\"$a\">GMT $a";
  }
}
?>
</select>


</p>

<p>End date of event: <br>
<select name="endday">
<?
$selected = $fecha[mday];
for($a = 1; $a <= 31; $a++) {
  if($a == $selected) {
    print "<option selected value=\"$selected\">$selected";
  } else {
    print "<option value=\"$a\">$a";
  }
}
print '</select> ';

print '<select name="endmonth">';
$selected = $fecha[mon];
for($a = 1; $a <= 12; $a++) {
  $amonth = date("F", mktime(0, 0, 0, $a, 1, 2000));
  if($a == $selected) {
    print "<option selected value=\"$selected\">$amonth";
  } else {
    print "<option value=\"$a\">$amonth";
  }
}
print '</select> ';

print '<select name="endyear">';
$selected = $fecha[year];

for($a = 2004; $a <= 2012; $a++) {
  if($selected == $a) {
    print "<option selected value=\"$selected\">$selected</a>";
  } else {
    print "<option value=\"$a\">$a";
  }
}
print '</select> at ';
?>

<select name="endtime">
<?
for($a = 8; $a < 21; $a++) {
  echo "<option value=\"$a\">$a:00";
}
?>
</select>

<select name="endgmt">
<?
for($a = -12; $a < 12; $a++) {
  if($a == 0) {
    print "<option selected value=\"$a\">GMT";
  } else {
    print "<option value=\"$a\">GMT $a";
  }
}
?>
</select>
</p>

<p>
The event will take place at:<br>
<? include 'location.php'; ?>
</p>

<p>
Spoken languages of event:<br>
<table border="0">
<tr>
<td>First</td>
<td>Second</td>
<td>Third</td>
</tr>
<tr>
<?
for($a = 1; $a <= 3; $a++){
  print '<td>';
  print "<select name=\"lang$a\">\n";
  print "<option selected> ";
  include 'conexion.php';
  $query = "SELECT id, name FROM languages ORDER BY name";
  $db->setFetchMode(DB_FETCHMODE_ASSOC);
  $result = $db->query($query);
  while($return = $result->fetchRow()) {
    print "<option value=".$return[id].">".$return[name]."\n";
  }
  $db->disconnect();
  print '</select>';
  print '</td>';
}
?>
</tr>
</table>
</p>