<?php

session_start();
if(isset($_SESSION['admin']))
{
require "db.php";
$result = mysql_query("select * from register") or die(mysql_error());
echo "<table border=1>";
while($row = mysql_fetch_array($result))
{
?>

<tr> <td> <?php echo $row[1];   ?> </td> 
<td> <?php echo $row[2];   ?> </td>
<td> <?php echo $row[3];   ?> </td>
<td> <?php echo $row[4];   ?> </td>
<td> <a href="updateall.php?uname=<?php echo $row[1];  ?>"> update </td>
<td> <a href="removeall.php?uname=<?php echo $row[1];  ?>"> remove </td>

</tr>
<?php } ?>


</table>

<br>
<a href="logout.php"> logout </a>

<?php
}else
{
	header('Location:login.php');

}

?>