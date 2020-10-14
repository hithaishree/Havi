<?php
session_start();
if(isset($_SESSION['admin']))
{
require "db.php";
$result = mysql_query("delete from register where uname='".$_GET['uname'] ."'") or die(mysql_error());


if($result)
	header('Location:displayall.php');

}
else
	header('Location:login.php');


?>