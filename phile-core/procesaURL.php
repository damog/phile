<?php

if($fileext == ".jpg") {
$image = "jpg.png";
} else if($fileext == ".xls") {
$image = "xls.png";
} else if($fileext == ".php") {
$image = "php.png";
} else if ($fileext == ".avi") {
$image = "avi.png";
} else if ($fileext == ".bak") {
$image = "bak.png";
} else if ($fileext == ".bmp") {
$image = "bmp.png";
} else if ($fileext == ".bz2") {
$image = "bz2.png";
} else if ($fileext == ".css") {
$image = "css.png";
} else if ($fileext == ".deb") {
$image = "deb.png";
} else if ($fileext == ".doc") {
$image = "doc.png";
} else if ($fileext == ".gif") {
$image = "gif.png";
} else if ($fileext == ".gz") {
$image = "gz.png";
} else if ($fileext == ".mp3") {
$image = "mp3.png";
} else if ($fileext == ".html") {
$image = "html.png";
} else if ($fileext == ".png") {
$image = "png.png";
} else if ($fileext == ".pdf") {
$image = "pdf.png";
} else if ($file == "..") {
$ruta = explode('/',$path);
$value = count($ruta) -1;
$borrar = "/".$ruta[$value];
$reemplazo = str_replace($borrar,"",$path);
$url = "$default?path=$reemplazo";
$image = "folder.png";
$link = "Parent Directory";
} else if (is_dir($dir."/".$file)) {
$url = "$default?path=$path/$file";
$image = "folder.png";
} else {
$image = "unknown.png";
}

?>