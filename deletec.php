<?php
include "connection.php";
session_start();
$id=$_GET['id'];
$del= mysqli_query($db,"DELETE FROM customer WHERE c_id='$id'");
if($del)
{
	mysqli_close($db);
	header("location:customer.php");
	exit;
}
else
{
	echo "Error deleting record";
}
?>
