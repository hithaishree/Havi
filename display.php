<?php
session_start();
if(isset($_SESSION['username']))
{
echo "Welcome :-".$_SESSION['username']. "<br><br>";
require "db.php";
$result = mysql_query("select * from register where uname='".$_SESSION['username'] ."'") or die(mysql_error());

$row = mysql_fetch_array($result);

?>
<table border="1">
<tr> <td> <?php echo $row[1];   ?> </td> 
<td> <?php echo $row[2];   ?> </td>
<td> <?php echo $row[3];   ?> </td>
<td> <?php echo $row[4];   ?> </td>
<td> <a href="update.php"> update </td>

</tr>



</table>

<br>
<a href="logout.php"> logout </a>
<?php
}else
{
	header('Location:login.php');

}

?>