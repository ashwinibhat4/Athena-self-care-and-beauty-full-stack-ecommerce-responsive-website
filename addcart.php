<?php
include "connection.php";
session_start();
$pid=$_GET['id'];
$uid= $_SESSION['id'];
 if(isset($_SESSION['id'])) {
 	$sql3= "SELECT `c_id` FROM `customer` WHERE `cemail`= '$uid'";
  $res1= mysqli_query($db,$sql3);
  $fetchq=mysqli_fetch_array($res1);
  $atc = $fetchq['c_id'];

$wish_check_query = "SELECT * FROM cart WHERE c_id='$atc' AND product_id='$pid' LIMIT 1";
  $result = mysqli_query($db, $wish_check_query);
  $wish = mysqli_fetch_assoc($result);
  
  if ($wish) { // if wish exists
      $sql3=" UPDATE `cart` SET `qty_in_cart`= '2' WHERE `product_id`='$pid' AND `c_id`='$uid'";
 $res3=mysqli_query($db,$sql3);
 header("location:product.php");
  exit;
}
else{
$sql1=" INSERT INTO `cart`(`c_id`, `product_id`,`qty_in_cart`) VALUES ('$atc','$pid',1)";
 $res2=mysqli_query($db,$sql1);
  if($res2)
{
	mysqli_close($db);
	header("location:product.php");
	exit;
}
else
{
	echo "Error adding product";
}
}
}
else{
  header("location:login.php");
}
?>