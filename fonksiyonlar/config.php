<?php 
$host="localhost";
$username="root";
$password="";
$vt="teknoloji";

$baglan= @mysql_connect($host,$username,$password) or die("Sunuyucuya bağlantı sağlanamadı.".mysql_error());
mysql_select_db($vt,$baglan) or die("Veritabanına bağlantı sağlanamadı.");
mysql_query("SET NAMES 'UTF8'");
mysql_query("SET character_set_connection='UTF8'");
mysql_query("SET character_set_client='UTF8'");
mysql_query("SET character_set_results='UTF8'");
?>