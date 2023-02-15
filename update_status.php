<?php
include "connection.php";
session_start();
$id=$_GET['id'];
$sp=$_GET['sp'];
$qr=mysqli_query($db,"UPDATE orders SET status='Delivered' WHERE order_id='$id' AND product_id='$sp'");
if($qr)
{
	mysqli_close($db);
	header("location:View_Orders.php");
	exit;
}
else
{
	echo "Error updating record";
}
?>