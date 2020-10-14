<?php
$con = mysql_connect("localhost","root","");
if(!$con)
	die(mysql_error());

$db = mysql_select_db('test');
if(!$db)
	die(mysql_error());


?>