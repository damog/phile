<?

function addEvent($topics) {
  print "<p>Name of the event: <br> \n";
  print "<input type=\"text\" name=\"name\" maxlenght=\"255\" /></p> \n";

  print "<p>Topic: <br> \n";
  print "<select name=\"topic\" size=\"1\"> \n";
  for($a = 0; $a < count($topics[id]); $a++) {
    print "<option value=\"".$topics[id][$a]."\">".$topics[topic][$a];
    print "\n";
  }
  print "</select> \n";

  print "<p>Short description: <br> \n";
  print "<input type=\"text\" name=\"short\" maxlenght=\"255\" /></p>\n";

  print "<p>Long description: <br> \n";
  print "<textarea name=\"long\"></textarea></p> \n";
}

function regions() {
  include 'conexion.php';
$query

function topics() {
  include 'conexion.php';
  $query = "SELECT id, topic FROM topics ORDER BY topic";
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

$topics = topics();
addEvent($topics);

?>