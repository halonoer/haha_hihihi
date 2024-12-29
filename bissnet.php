<?php

$usr = "root";
$psw = "";
$srv = "localhost";// ; "192.168.101.9"  "192.168.101.244"; 
//  $srv =     "192.168.101.244" ;
//$srv = "192.168.101.21"; 
$dbuse = "kayaku_fleet";
$isdbselect = '';
$dbconnect = "";

$link = mysql_connect($srv, $usr, $psw); // or die(mysql_error())
mysql_select_db($dbuse, $link);

if (!$link) {
	$e = mysql_error($link);  // For oci_parse errors pass the zconnection handle
	$dbconnect = "false";
	echo htmlentities($e['Terjadi masalah dengan koneksi ke database server!!!']);
} {
	$dbconnect = "true";
}

if (!$isdbselect) {
	mysql_select_db($dbuse, $link);
} else {
	echo 'database selected succesfully';
}
//echo "Koneksi ke database mysql server berhasilllll";


?>