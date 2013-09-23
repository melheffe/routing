<?php
$host="localhost";
$QQ="root";//user
$p="";//password
$db=mysql_connect($host,$QQ,$p)
or die ("No pude conectarme a la base de datos");
mysql_select_db("eric_routes")
or die ("No puedo acceder a la base de datos del sistema");
?>