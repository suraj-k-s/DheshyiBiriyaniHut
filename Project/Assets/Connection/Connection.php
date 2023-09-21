<?php

$Conn=mysql_connect("localhost","root","");
$db=mysql_select_db("db_biriyani_hut",$Conn);

if(!$Conn)
{
	die("Connection Failed:".mysqli_connect_error());
}

?>