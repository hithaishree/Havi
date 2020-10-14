<?php
session_start();
if(isset($_SESSION['username']))
{
echo "Welcome :-".$_SESSION['username']. "<br><br>";
require "db.php";
$result = mysql_query("select * from register where uname='".$_SESSION['username'] ."'") or die(mysql_error());

$row = mysql_fetch_array($result);
$arr = explode(",", $row[4]);
?>
<form method="post" action="#">
Username:- <input type="text" name="uname" value="<?php echo $row[1]; ?>" > <br>
password:- <input type="text" name="pwd" value="<?php echo $row[2]; ?>" > <br>
Semester:- <input type="text" name="semester" value="<?php echo $row[3]; ?>" > <br>

Event List:-<br>
<input type="checkbox" name="event[]" value="c" <?php foreach($arr as $event){ if($event == 'c') echo 'checked'; } ?> > C <br> 
<input type="checkbox" name="event[]" value="java" <?php foreach($arr as $event){ if($event == 'java') echo 'checked'; } ?>> JAVA <br> 

<input type="checkbox" name="event[]" value="php" <?php foreach($arr as $event){ if($event == 'php') echo 'checked'; } ?>> PHP <br> 

<input type="checkbox" name="event[]" value="wd" <?php foreach($arr as $event){ if($event == 'wd') echo 'checked'; } ?> > Web Designing <br> <br><br>
<input type="submit" name="submit" value="Update"> 

</form>
<?php
if(isset($_POST['submit']))
{
require "db.php";
$str = implode(",", $_POST['event']);
$result = mysql_query("update register set pwd='".$_POST['pwd']. "', semester='".$_POST['semester']."',events='".$str ."' where uname='".$_POST['uname'] ."' ") or die(mysql_error());


if($result)
	header('Location:display.php');

}

}else
{
	header('Location:login.php');

}

?>