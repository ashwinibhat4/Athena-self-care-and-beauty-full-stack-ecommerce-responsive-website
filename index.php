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
    <title>Athena responsive website </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- header section starts  -->

<header>
    <?php
    if(isset($_SESSION['user_id'])){
        ?>
        <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="#" class="logo">Athena<span>.</span></a>

    <nav class="navbar">
        <a href="index.php">home</a>
        <a href="View_Products.php">Your Products</a>
        <a href="reviews.php">Reviews</a>
        <a href="Add_Products.php">Add</a>
        <a href="View_Orders.php">View Orders</a>
        <a href="Logout.php">Logout</a>
    </nav>
<?php
    }
    else if(isset($_SESSION['id'])) {
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
    else if(isset($_SESSION['usr_id'])){
        ?>
         <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="#" class="logo">Athena<span>.</span></a>

    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="Product_View.php">Products</a>
        <a href="View_Service.php">Services</a>
        <a href="Add_Service.php">Add Services</a>
        <a href="View_Review.php">Review</a>
        <a href="brand.php">Brands</a>
        <a href="customer.php">Customers</a>
        <a href="Order_View.php">Orders</a>
        <a href="Logout.php">Logout</a>
    </nav>
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

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>Self care & Beauty</h3>
        <span> natural.serene.healthy  </span>
        <p>“If you celebrate your differentness, the world will, too. It believes exactly what you tell it—through the words you use to describe yourself, the actions you take to care for yourself, and the choices you make to express yourself. Tell the world you are one-of-a-kind creation who came here to experience wonder and spread joy."</p>
        <?php
        if(!isset($_SESSION['usr_id']) && !isset($_SESSION['user_id']))
        {
            ?>
        <a href="product.php" class="btn">shop now</a>
        <?php
    }
    ?>
    </div>
    
</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span> about </span> us </h1>

    <div class="row">

        <div class="video-container">
            <video src="images/about-vid.mp4" loop autoplay muted></video>
            <h3>self care is rejuvenation</h3>
        </div>

        <div class="content">
            <h3>why choose us?</h3>
            <p>Because we believe, “Caring for the people around me and myself is not self-indulgence, it is self-preservation, and that is an act of political warfare.”</p>
            <p>To act on an intuitive impulse is to celebrate one of the most joyful aspects of life on this planet. Celebrate your uniqueness and rejuvenate yourself with our well engineered products from trusted brands.</p>
            <a href="#" class="btn">learn more</a>
        </div>

    </div>

</section>

<!-- about section ends -->

<!-- icons section starts  -->

<section class="icons-container">

    <div class="icons">
        <img src="images/icon-1.png" alt="">
        <div class="info">
            <h3>free delivery</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/icon-2.png" alt="">
        <div class="info">
            <h3>10 days returns</h3>
            <span>moneyback guarantee</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/icon-3.png" alt="">
        <div class="info">
            <h3>offer & gifts</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/icon-4.png" alt="">
        <div class="info">
            <h3>secure paymens</h3>
            <span>protected by paypal</span>
        </div>
    </div>
   
</section>

<!-- icons section ends -->

<!-- prodcuts section starts  -->
<?php 
$qr='SELECT * from products where qty>1 LIMIT 8';
$products=mysqli_query($db,$qr); 

 if(!isset($_SESSION['usr_id']) && !isset($_SESSION['user_id']))
        {
            ?>
<section class="products" id="products">

    <h1 class="heading"> latest <span>products</span> </h1>

    <div class="box-container">
           <?php foreach ($products as $product): 
            $fbi = $product['image']; ?>
        <div class="box">
            <span class="discount"><?=$product['discount']?></span>
            <div class="image">
                <img src=<?=$product['image']?>>
                <div class="icons">
                    <a href="addwish.php?pid=<?=$product['product_id']?>" class="fas fa-heart"></a>
                    <a href="addcart.php?id=<?php echo $product['product_id'];?>" class="cart-btn">add to cart</a>
                    <a href="prod.php?id=<?php echo $product['product_id'];?>" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3><?=$product['product_name']?></h3>
                <div class="price"> <?=$product['mrp']-($product['mrp']*$product['discount']/100)?> <span><?=$product['mrp']?></span> </div>
            </div>
        </div>
           <?php endforeach; 
       }
       ?>

    </div>

</section>

<!-- prodcuts section ends -->

<!-- review section starts  -->

<section class="review" id="review">

<h1 class="heading"> customer's <span>review</span> </h1>

<div class="box-container">

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>“Today and onwards, I stand proud, for the bridges I've climbed, for the battles I've won, and for the examples I've set, but most importantly, for the person I have become. I like who I am now, finally, at peace with me. Athena reflects my persona and compliments it. Athena is like a caring mother with awesome range of nourishing, vegan, cruelty-free products. Most importantly - Plastic free!”</p>
        <div class="user">
            <img src="images/pic-1.png" alt="">
            <div class="user-info">
                <h3>Jungkook, BTS</h3>
                <span>happy customer</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>I believe in "Be you, love you. All ways, always.” It is exactly what Athena resonates to me. It's wide range of health care products have enriched my life. Way to go!</p>
        <div class="user">
            <img src="images/pic-2.png" alt="">
            <div class="user-info">
                <h3>Kim Jisoo</h3>
                <span>happy customer</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>“Affirmations are our mental vitamins, providing the supplementary positive thoughts we need to balance the barrage of negative events and thoughts we experience daily. The day I found Athena was the day I felt like healing. It's products are the most authentic and effective.”</p>
        <div class="user">
            <img src="images/pic-3.png" alt="">
            <div class="user-info">
                <h3>Kim Min Jae</h3>
                <span>happy customer</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

</div>
    
</section>

<!-- review section ends -->

<!-- contact section starts  -->
<?php 
if(!isset($_SESSION['user_id']) && !isset($_SESSION['usr_id']))
{ ?>
<section class="contact" id="contact">

    <h1 class="heading"> <span> contact </span> us </h1>

    <div class="row">

        <form action="">
            <input type="text" placeholder="name" class="box">
            <input type="email" placeholder="email" class="box">
            <input type="number" placeholder="number" class="box">
            <textarea name="" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>

        <div class="image">
            <img src="images/contact-img.svg" alt="">
        </div>

    </div>

</section>
<?php } ?>
<!-- contact section ends -->

<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">about</a>
            <a href="#">Brands</a>
            <a href="#">products</a>
            <a href="#">services</a>
            <a href="#">review</a>
            <a href="#">contact</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#">my account</a>
            <a href="#">my order</a>
            <a href="#">my favorite</a>
        </div>

        <div class="box">
            <h3>locations</h3>
            <a href="#">India</a>
            <a href="#">USA</a>
            <a href="#">Japan</a>
            <a href="#">South Korea</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#">+123-456-7890</a>
            <a href="#">athena@gmail.com</a>
            <a href="#">Ujire, india - 400104</a>
            <img src="images/payment.png" alt="">
        </div>

    </div>

    <div class="credit"> created by <span> Miss Athena </span> | all rights reserved </div>

</section>

<!-- footer section ends -->


















    
</body>
</html>