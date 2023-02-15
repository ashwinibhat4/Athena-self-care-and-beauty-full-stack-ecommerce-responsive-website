<?php
  include "connection.php";
  session_start();
  $uid= $_SESSION['usr_id'];
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
            <img src="images/teahub.io-korean-desktop-wallpaper-1399812.png" name='back' alt="background" style="height:100%;width:100%" />
        <div class="box">
      <form name="addservicedetails"  method="POST" enctype="multipart/form-data">
        <h1 style="font-family: sans-serif;">Service Details</h1>
              <div class="addservicedetails">
              <input type="text" name="servicename" placeholder="Type Of Service" required="" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; " autocomplete="off"><br><br>
              
              <input type="text" name="provider" placeholder="Service Provider" required="" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; " autocomplete="off"><br><br>
              <input type="text" name="contact" placeholder="Contact" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; " autocomplete="off"><br><br>
              <input type="text" name="email" placeholder="Email" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; " autocomplete="off"><br><br>
              <input type="text" name="address" placeholder="Address" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; " autocomplete="off"><br><br>
              <input type="text" name="price" placeholder="Price" required="" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; " autocomplete="off"><br><br>
              <input type="text" name="discount" placeholder="Discount in (%)" required="" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; " autocomplete="off"><br><br>
              
          <br></div>
              <br><br>
               &nbsp &nbsp &nbsp<input type="submit" name="submit" value="ADD" style="width:80%;background: transparent;font-weight:700;font-size:15;border:none;outline: none;color:black;background: #FFB6C1;padding:8px 16px;border-radius: 5px;margin-left: 5px;">
            </div>
            </form>
      <?php

if(isset($_POST['submit']))
{ 
  
   $service_name=$_POST['servicename'];
  $provider=$_POST['provider'];
  $contact=$_POST['contact'];
  $email=$_POST['email'];
  $price=$_POST['price'];
  $discount=$_POST['discount'];
  $address=$_POST['address'];
  

  $sql1=" INSERT INTO `services` (`service_id`, `type`, `sname`, `contact`,`saddress`,`semail`,`price`,`sdiscount`) VALUES('','$service_name','$provider','$contact','$address','$email','$price','$discount')";
  $res2=mysqli_query($db,$sql1);
  
  if($res2){
    echo "done"; }
    ?>
    <script type="text/javascript">
     alert("Service added Successfully!");
     window.location="index.php";
   </script>
   <?php
 }

 ?>
    </div>
    
  </div>
  
</body>
</html>