<?php

/*****************************************************************
 * phile: the PHP file manager					 *
 *			       					 *
 *  David Moreno Garza <damog@damog.net>			 *
 *****************************************************************/

$path = $HTTP_GET_VARS['path'];
$default = basename($_SERVER['PHP_SELF']);
$dir = ".";
$icontheme = "mini";
$color1 = "white";
$color2 = "lightgray";
$color = $color1;

if(isset($path)) {
  $dir .= $path;
}

if($path != "") {
  $slash = "";
} else {
  $slash = "/";
}

echo "<h1>Content of $slash$path</h1>";
echo "<hr>";

echo "<table border=0 width=100% cellspacing=0>";
echo "<tr><th align=left>Filename</th><th align=left>Last Modified</a></th></tr>";

$archivos = array();

if ($handle = opendir($dir)) {
  while (false !== ($file = readdir($handle))) {
    if($file != "." && $file != "$default" && $file != "phile-core") {
      array_push($archivos, $file);
      $fileext = strrchr($file,".");
      $link = $file;
      $url = $dir."/".$file;
      if(is_dir($url)) {
	$modifiedTime = filemtime($url."/.");
	$openit = opendir($url);
	$countdir = 0;
	while (false !== ($filedir = readdir($openit))) {
	  if($filedir != "." && $filedir != "..") {
	    $countdir++;
	  }
	}
	closedir($openit);
	$result = "$countdir items.";			
      } else {
	$size = (filesize($url))/1024;
	$result = "Size: ".round($size,2)." kb.";
      }
      require ("phile-core/procesaURL.php");
      echo "<tr bgcolor=$color><td>";
      if($color == $color1) {
	$color = $color2;
      } else {
	$color = $color1;
      }
      echo "<p><a href=\"$url\"><img src=\"phile-core/images/$icontheme/$image\" border=0 align=left> $link</a><br>";
      if($file != ".." && $file != ".") {
	echo "<font size=1>$result</font></p>";
      }
      echo "</td><td>";
      echo "<font size=2>";
      if($file != "..") {
	echo date("F d, Y. H:i:s", $modifiedTime);
      }
      echo "</font>";
      echo "</td></tr>";
    }
  }
  echo "</table>";
  include("phile-core/foot.php");
  closedir($handle);
}

//sort($archivos);
//print_r($archivos);

?>