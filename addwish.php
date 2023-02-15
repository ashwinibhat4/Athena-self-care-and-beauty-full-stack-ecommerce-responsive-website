<?php
include "connection.php";
session_start();
$pid=$_GET['pid'];
$uid= $_SESSION['id'];
 if(isset($_SESSION['id'])) {
 	$sql3= "SELECT `c_id` FROM `customer` WHERE `cemail`= '$uid'";
  $res1= mysqli_query($db,$sql3);
  $fetchq=mysqli_fetch_array($res1);
  $atc = $fetchq['c_id'];

$wish_check_query = "SELECT * FROM wishlist WHERE c_id='$atc' AND product_id='$pid' LIMIT 1";
  $result = mysqli_query($db, $wish_check_query);
  $wish = mysqli_fetch_assoc($result);
  
  if ($wish) { // if wish exists
    if ($wish['product_id'] === $pid) {
      echo "product already exists";
      header("location:product.php");
    }
}
else{
$sql1=" INSERT INTO `wishlist`(`c_id`, `product_id`) VALUES ('$atc','$pid')";
 $res2=mysqli_query($db,$sql1);
}
  if($res2)
{
	mysqli_close($db);
	header("location:product.php");
	exit;
}
else
{
	echo "Error adding wish";
}
}
else{
	header("location:login.php");
}
?>
