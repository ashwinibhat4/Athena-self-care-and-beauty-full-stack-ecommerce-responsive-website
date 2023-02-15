<?php
include "connection.php";
session_start();
$id=$_GET['id'];
$del= mysqli_query($db,"DELETE FROM products WHERE product_id='$id'");
if($del)
{
	mysqli_close($db);
	header("location:View_Products.php");
	exit;
}
else
{
	echo "Error deleting record";
}
?>
