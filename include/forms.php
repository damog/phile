<?

function addEvent() {
  print "<p>Name of the event: <br>";
  print "<input type=\"text\" name=\"name\" maxlenght=\"255\" /></p>";

  print "<p>Topic: <br>";
  print "<select name=\"topic\" size=\"1\">";
  print "</select>";

  print "<p>Short description: <br>";
  print "<input type=\"text\" name=\"short\" maxlenght=\"255\" /></p>";

  print "<p>Long description: <br>";
  print "<textarea name=\"long\"></textarea></p>";

}

addEvent();

function topics() {
  include 'conexion.php';
  $query = "SELECT id, topic FROM topics";
  $db->setFetchMode(DB_FETCHMODE_ASSOC);
  $result = $db->query($query);
  $ids = array();
  $topics = array();
  while($return = $result->fetchRow()) {
    array_push($ids, $return[id]);
    array_push($topics, $return[topic]);
  }
  if (DB::isError($db)) {
    return FALSE;
  } else {
    $regresa = array(id => $ids, topic => $topics);
    return $regresa;
  }
}

print "<hr>";
print_r(topics());

?>