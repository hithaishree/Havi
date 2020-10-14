<form method="post" action="#">
Username:- <input type="text" name="uname" > <br>
password:- <input type="text" name="pwd" > <br><br><br>
<input type="submit" name="submit" value="Login">
<a href="register.php"> Register Yourself!!! </a>
</form>
<?php
if(isset($_POST['submit']))
{
session_start();
if($_POST['uname'] == 'admin' && $_POST['pwd'] == 'admin')
{
 $_SESSION['admin'] = 'admin';
 header('Location:displayall.php');

}
else
{
require "db.php";
$result = mysql_query("select * from register where uname='".$_POST['uname'] ."' and pwd='".$_POST['pwd'] ."'") or die(mysql_error());
//$row = mysql_fetch_array($result);
$n = mysql_num_rows($result);
if($n == 1)
{
	$_SESSION['username'] =$_POST['uname'];
	header('Location:display.php');
}
else
	echo "invalid username and password";
}
}

?>