<?php
include "connection.php";
session_start();
$qr='SELECT * from products where qty>1';
$products=mysqli_query($db,$qr); 
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
    <?php
    }
    else {
        ?>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="#" class="logo">Athena<span>.</span></a>

    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="index.php#about">About</a>
        <a href="category.php">Categories</a>
        <a href="index.php#review">Reviews</a>
        <a href="product.php">Products</a>
        <a href="services.php">Services</a>
        <a href="index.php#contact">Contact</a>
        <a href="brandlogin.php">Enterprise Login</a>
    </nav>

    <div class="icons">
        <a href="wishlist.php" class="fas fa-heart"></a>
        <a href="cart.php" class="fas fa-shopping-cart"></a>
        <a href="login.php" class="fas fa-user"></a>
    </div>
   <?php
        }
        ?>
      </header>
      <br><br><br><br>
   <div class="container">
   <h4 class="title"> Our vegan, cruelty-free, plastic-free, organic products </h4>
</div>
 
  <div class="products content-wrapper col-md-10 offset-1">
    <div class="prodcts">
            
    <?php foreach ($products as $product): ?>
        <a href="prod.php?id=<?php echo $product['product_id'];?>" class="product">
            <div class="crd">
                
             <img src='<?=$product['image']?>'alt='<?=$product['product_name']?>' style="width:100%; "/>
            <div class="name" style="width:100%; ">
                <?=$product['product_name']?>
            </div>
             <span class="price">
            <span style='font-size:16px;' class="badge badge-success"><?=$product['discount']?>% off</span>
                    <span class="symbol">INR </span>
                     <strike style="color:red"> <span class="whole"><?=$product['mrp']?></span></strike><br>
                    <strong><span class="symbol">INR </span>
                    <span class="whole"><?=$product['mrp']-($product['mrp']*$product['discount']/100)?></span></strong>
            </span>
            
            </div>
        </a>        
            
        <?php endforeach; ?>

</div>
    
</div>
</div>

  
</body>
</html>

 
  

   
