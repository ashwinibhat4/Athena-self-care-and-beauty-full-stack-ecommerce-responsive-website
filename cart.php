<?php
include "connection.php";
session_start();
$subtotal = 0.00;
$uid= $_SESSION['id'];
if (!isset($_SESSION['id'])){
  header("location:login.php");
}
$sql3= "SELECT `c_id` FROM `customer` WHERE `cemail`= '$uid'";
 $res1= mysqli_query($db,$sql3);
 $fetchq=mysqli_fetch_array($res1);
 $atc = $fetchq['c_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="product card popup/css/stylep.css">
   <link rel="stylesheet" href="product card popup/index.css">
   <link href='product card popup/styles.css' rel='stylesheet' type='text/css'>
    <link href='product card popup/stylee.css' rel='stylesheet' type='text/css'>
   <!-- custom js file link  -->
   <script src="product card popup/js/script.js" defer></script>

</head>
<body>
  <header>
  <?php
    if(isset($_SESSION['id'])) {
?>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="#" class="logo">Athena<span>.</span></a>

    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="category.php">Categories</a>
        <a href="product.php">Products</a>
        <a href="index.php#contact">Contact</a>
        <a href="services.php">Services</a>
        <a href="index.php#review">Review</a>
        <a href="order_history.php">Order History</a>
        <a href="Logout.php">Logout</a>
    </nav>

    <div class="icons">
        <a href="wishlist.php" class="fas fa-heart"></a>
        <a href="cart.php" class="fas fa-shopping-cart"></a>
    </div>
  </header>
    <?php
    }
   ?>
   <br><br><br><br><br>
   <div>
    <h1>Your  Cart</h1>
    <form action="" method="post">
        <table>
            
                <?php 
                $qr="SELECT * from cart c,products p where c.product_id=p.product_id and c.c_id='$atc'";
                $products=mysqli_query($db,$qr); 

                if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                    <tr>
                    <th style="padding-left: 100px;">Product</th>
                    <th style="padding-left: 100px;">Price</th>
                    <th style="padding-left: 100px;">Quantity</th>
                    <th style="padding-left: 100px;">Remove</th>
                </tr>
                <?php foreach ($products as $product): 
                   $price=$product['mrp']-($product['mrp']*$product['discount']/100);
                   $subtotal += (float)$price * (int)$product['qty_in_cart'];
    
                   $fbi=$product['image'];
                    ?>
                    <tr>
                 <td style="padding-left: 100px;"><?php echo "<img width=200px height=200px src='$fbi' alt='img'>"?><br><b><?php echo $product['product_name'];?></b></td>
                 <td style="padding-left: 100px;"><?php echo $price;?></td>
                 <td style="padding-left: 100px;"><?php echo $product['qty_in_cart']?></td>
                 <td style="padding-left: 100px;"><a href="cartdeleteprod.php?id=<?=$product['product_id']?>">Remove</a></td>
                   </tr>
                <?php endforeach; ?>
                <?php endif; ?>
        </table>
        <div class="subtotal" style="padding-left: 710px;">
            <span class="text"><b>Total</b></span>
            <span class="price">Rs. <?=$subtotal?></span>
        </div>
        <br>
               
        <div class="buttons" style="padding-left: 950px;">
            <input type="submit" value="Place Order" name="submit" style="width:150px;background: transparent;font-weight:700;font-size:15px;border:none;outline: none;color:black;background: #FFB6C1;padding:8px 16px;border-radius: 5px;margin-left: 5px;">
        </div>
    </form>

         <?php
if(isset($_POST['submit']))
{ 
 ?>
    <script type="text/javascript">
     alert("Proceeding to payment!");
     window.location="placeorder.php";
   </script>
   <?php
}
 ?>
</div>