<form method="post" action="#">
Username:- <input type="text" name="uname" > <br>
password:- <input type="text" name="pwd" > <br>
Semester:- <input type="text" name="semester" > <br>
Event List:-<br>
<input type="checkbox" name="event[]" value="c" > C <br> 
<input type="checkbox" name="event[]" value="java" > JAVA <br> 

<input type="checkbox" name="event[]" value="python" > PYTHON <br> 

<input type="checkbox" name="event[]" value="html" > HTML <br> <br><br>
<input type="submit" name="submit" value="Register">
</form>
<?php
if(isset($_POST['submit']))
{
require "db.php";
$str = implode(",",$_POST['event']);
$result = mysql_query("insert into register values(0,'".$_POST['uname'] ."', '".$_POST['pwd'] ."', '".$_POST['semester'] ."', '".$str."')") or die(mysql_error());

if($result)
	header('Location:login.php');
else
	echo "please try again to register";
}


?>
