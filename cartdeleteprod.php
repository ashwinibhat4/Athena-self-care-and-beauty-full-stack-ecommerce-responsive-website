<?php
include "connection.php";
session_start();
$id=$_GET['id'];
$uid= $_SESSION['id'];

 $sql3= "SELECT `c_id` FROM `customer` WHERE `cemail`= '$uid'";
 $res1= mysqli_query($db,$sql3);
 $fetchq=mysqli_fetch_array($res1);
 $atc = $fetchq['c_id'];
$del= mysqli_query($db,"DELETE FROM cart WHERE product_id='$id' AND c_id='$atc'");
if($del)
{
	mysqli_close($db);
	header("location:cart.php");
	exit;
}
else
{
	echo "Error deleting record";
}
?>
