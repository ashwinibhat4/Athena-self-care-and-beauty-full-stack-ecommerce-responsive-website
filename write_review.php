<?php
  include "connection.php";
  session_start();
  $uid= $_SESSION['id'];
  $oid=$_GET['oid'];
  $sp=$_GET['sp'];
  $st=$_GET['st'];

if($st=='Not Delivered'){
  ?>
  <script type="text/javascript">
     alert("You Can Not Provide Review For This Product!");
     window.location="order_history.php";
   </script>
   <?php
}

$review_check_query = "SELECT * FROM rating WHERE order_id='$oid' AND product_id='$sp' LIMIT 1";
  $result = mysqli_query($db, $review_check_query);
  $rc = mysqli_fetch_assoc($result);
  
  if ($rc) { // if wish exists
   ?>
  <script type="text/javascript">
     alert("You have already given feedback!");
     window.location="order_history.php";
   </script>
   <?php   
}
?>
<html>

<head>
    <link rel="stylesheet" href='reg.css'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <style>
      ::placeholder{color:#FFB6C1;}
    </style>
</head>

<body>
    <div class="main-div">
            
        <div class="box">
      <form name="addreviewdetails"  method="POST" enctype="multipart/form-data">
        <h1 style="font-family: sans-serif;">Your Review</h1>
              <div class="addproductdetails">
              <input type="text" name="review" placeholder="Review" required="" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; " autocomplete="off"><br><br>
              <input type="number" name="rating" value="1" min="1" max="5" style="font-size: 20px;width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none;" placeholder="Rating" required>
              <br><br>
               &nbsp &nbsp &nbsp<input type="submit" name="submit" value="Provide Review" style="width:80%;background: transparent;font-weight:700;font-size:15;border:none;outline: none;color:black;background: #FFB6C1;padding:8px 16px;border-radius: 5px;margin-left: 5px;">
            </div>
            </form>
        <?php

if(isset($_POST['submit']))
{ 
 $review = $_POST['review'];
 $rating = $_POST['rating'];
  

  $sql3= "SELECT `c_id` FROM `customer` WHERE `cemail`= '$uid'";
  $res1= mysqli_query($db,$sql3);
  $fetchq=mysqli_fetch_array($res1);
  $atc = $fetchq['c_id'];

$sql1=" INSERT INTO `rating`(`order_id`, `product_id`, `review`, `rating_out_of_5`) VALUES ('$oid','$sp','$review','$rating')";
 $res2=mysqli_query($db,$sql1);
  if($res2)
{
   ?>
  <script type="text/javascript">
     alert("Thanks For The Feedback!");
     window.location="order_history.php";
   </script>
   <?php
}
}

 ?>
    </div>
    
  </div>
  
</body>
</html>