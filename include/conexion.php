<?

require_once 'DB.php';
 
$DB_host = 'localhost';
$DB_user = 'damogar';
$DB_pass = 'events';
$DB_dbName = 'events';
$DB_dbType = 'mysql';
 
$dsn = $DB_dbType . "://"
  . $DB_user . ":"
  . $DB_pass . "@"
  . $DB_host . "/"
  . $DB_dbName;
 
$db = DB::connect($dsn, false);
 
if (DB::isError($db)) {
  die($db->getDebugInfo());
}

?>