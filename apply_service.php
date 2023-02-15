<?php
include "connection.php";
session_start();
$sid=$_GET['sid'];
$uid= $_SESSION['id'];
 if(isset($_SESSION['id'])) {
 	$sql3= "SELECT `c_id` FROM `customer` WHERE `cemail`= '$uid'";
  $res1= mysqli_query($db,$sql3);
  $fetchq=mysqli_fetch_array($res1);
  $atc = $fetchq['c_id'];


$sql1=" INSERT INTO `service_booked`(`service_id`, `c_id`, `date`) VALUES ('$sid','$atc',current_timestamp())";
 $res2=mysqli_query($db,$sql1);
  if($res2)
{
	mysqli_close($db);
	header("location:order_history.php");
	exit;
}
else
{
	echo "Error adding service";
}
}
else{
  header("location:login.php");
}
?>