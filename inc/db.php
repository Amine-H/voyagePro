<?php
if(!isset($isIndex))die('');
$server = "127.0.0.1";
$database = "voyagePro";
$user = "root";
$pass = "";
@$mysqlC = mysql_connect($server,$user,$pass);
@mysql_set_charset("utf8");
if(!$mysqlC){die("Erreur ! [connection impossible]");}
if(!mysql_select_db($database)){die("Erreur ! [selection de la base de données ".$database." impossible]");}
?>
