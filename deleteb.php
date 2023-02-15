<?php
include "connection.php";
session_start();
$id=$_GET['id'];
$del= mysqli_query($db,"DELETE FROM brand WHERE brand_id='$id'");
if($del)
{
	mysqli_close($db);
	header("location:brand.php");
	exit;
}
else
{
	echo "Error deleting record";
}
?>
