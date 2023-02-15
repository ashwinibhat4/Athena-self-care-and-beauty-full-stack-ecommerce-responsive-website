<?php
include "connection.php";
session_start();
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
      <br><br><br><br><br><br>
   <div class="container">
   <h4 class="title"> Our Categories </h4>
</div>
 <?php echo "<img  height=250px width=1510px src='images/uio.jpg' alt='img'>"?><br><br><br><br>
  <div class="products content-wrapper col-md-10 offset-1">
    <?php
        $cat1='hair care';
        $cat2='skin care';
        $cat3='eye care';
        $cat4='health food';
        $cat5='immunity';
    ?>
    <div class="prodcts">
        <a href="catprod.php?id=<?php echo $cat1;?>" class="product">
            <div class="crd">
                
             <img src='images/SocialMedia_APAC_HaircareChina_Blog_1000x305.jpg'alt='hair care' style="width:100%; "/>
            <div class="name" style="width:100%; ">
                Hair Care
            </div>
            
            </div>
        </a>        


        <a href="catprod.php?id=<?php echo $cat2;?>" class="product">
            <div class="crd">
                
             <img src='images/reporter-wild-beauty-river.jpg'alt='skin care' style="width:100%; "/>
            <div class="name" style="width:100%; ">
                Skin Care
            </div>
            
            </div>
        </a>   

        <a href="catprod.php?id=<?php echo $cat3;?>" class="product">
            <div class="crd">
                
             <img src='images/best-korean-eye-creams-294801-1629388682311-main.700x0c.jpg'alt='eye care' style="width:100%; "/>
            <div class="name" style="width:100%; ">
                Eye Care
            </div>
            
            </div>
        </a>   

        <a href="catprod.php?id=<?php echo $cat4;?>" class="product">
            <div class="crd">
                
             <img src='images/siggis-icelandic-skyr.jpg'alt='health food' style="width:100%; "/>
            <div class="name" style="width:100%; ">
                Health Food
            </div>
            
            </div>
        </a>   

        <a href="catprod.php?id=<?php echo $cat5;?>" class="product">
            <div class="crd">
                
             <img src='images/Purearth-water-kefir-range-800x800-1.jpg'alt='immunity' style="width:100%; "/>
            <div class="name" style="width:100%; ">
                Immunity
            </div>
            
            </div>
        </a>   
</div>
</div>

  
</body>
</html>

 
  

   
