<?php
  include "connection.php";
  session_start();
  $uid= $_SESSION['user_id'];
  $id=$_GET['id'];
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
            <img src="images/purple-flowers-wallpaper-hd-2.jpg" name='back' alt="background" style="height:100%;width:100%" />
        <div class="box">
      <form name="addproductdetails"  method="POST" enctype="multipart/form-data">
        <h1 style="font-family: sans-serif;">Product Details</h1>
              <div class="addproductdetails">
              <input type="text" name="prodname" placeholder="Product Name" required="" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; " autocomplete="off"><br><br>
              
              <input type="text" name="mrp" placeholder="MRP" required="" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; " autocomplete="off"><br><br>
              <input type="text" name="description" placeholder="Description" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; " autocomplete="off"><br><br>
              <input type="text" name="qty" placeholder="Quantity Available" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; " autocomplete="off"><br><br>
              <input type="text" name="discount" placeholder="Discount in (%)" required="" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; " autocomplete="off"><br><br>
              <label for="category" style="font-size: 14px;color:#FFB6C1">Category
                </label><br><br>
                <select id="category" name="category" size="1" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; ">
                  <option value="skin care" style="width: 100%;padding: 5px;color: black;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: #FFB6C1;outline: none;">Skin Care</option>
                  <option value="hair care" style="width: 100%;padding: 5px;color: black;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: #FFB6C1;outline: none;">Hair Care</option>
                  <option value="eye care" style="width: 100%;padding: 5px;color: black;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: #FFB6C1;outline: none;" >Eye Care</option>
                  <option value="immunity" style="width: 100%;padding: 5px;color: black;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: #FFB6C1;outline: none;">Immunity</option>
                  <option value="health food" style="width: 100%;padding: 5px;color: black;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: #FFB6C1;outline: none;">Health Food</option>
                 </select>
                 <br><br>
              <input type="file" accept="image/*" name="file" required="">
              
          <br></div>
              <br><br>
               &nbsp &nbsp &nbsp<input type="submit" name="submit" value="UPDATE" style="width:80%;background: transparent;font-weight:700;font-size:15;border:none;outline: none;color:black;background: #FFB6C1;padding:8px 16px;border-radius: 5px;margin-left: 5px;">
            </div>
            </form>
      <?php

if(isset($_POST['submit']))
{ 
 $folder="images/";
  move_uploaded_file($_FILES['file']['tmp_name'],"$folder".$_FILES['file']['name']);
  $P_Img="images/".$_FILES['file']['name'];
  
   $product_name=$_POST['prodname'];
  $mrp=$_POST['mrp'];
  $discount=$_POST['discount'];
  $qty=$_POST['qty'];
  $category=$_POST['category'];
  $description=$_POST['description'];
  
  

  $sql3= "SELECT `brand_id` FROM `brand` WHERE `email`= '$uid'";
  $res1= mysqli_query($db,$sql3);
  $fetchq=mysqli_fetch_array($res1);
  $atc = $fetchq['brand_id'];

  $sql1=" UPDATE `products` SET `product_name`='$product_name',`mrp`='$mrp',`discount`='$discount',`qty`='$qty',`description`='$description',`category`='$category',`image`='$P_Img' WHERE `product_id`='$id' AND `brand_id`='$atc'";
  $res2=mysqli_query($db,$sql1);
  
  if($res2){
    echo "done"; }
    ?>
    <script type="text/javascript">
     alert("Product Updated Successfully!");
     window.location="View_Products.php";
   </script>
   <?php
 }

 ?>
    </div>
    
  </div>
  
</body>
</html>