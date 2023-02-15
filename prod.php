<?php
include "connection.php";
session_start();
$id=$_GET['id'];
$uid= $_SESSION['id'];
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
    <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="product card popup/css/style.css">
   <link rel="stylesheet" href="product card popup/index.css">
   <link href='product card popup/styles.css' rel='stylesheet' type='text/css'>
    <link href='product card popup/style.css' rel='stylesheet' type='text/css'>
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
        <a href="product.php">Products</a>
        <a href="services.php">Services</a>
        <a href="index.php#review">Review</a>
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
  <br><br><br><br><br><br><br><br><br>
 <div class="product content-wrapper">
  <table>
     <?php 
$qr="SELECT * from products where product_id='$id'";
$products=mysqli_query($db,$qr);
$product=mysqli_fetch_array($products); 
$fbi=$product['image'];
?>
<div style="padding-left: 100px;">
    <td><?php echo "<img width=500px height=500px src='$fbi' alt='img'>"?></td></div>
    <td><div style="padding-left: 50px;">
        <h1 class="name" style="font-size: 30px;"><?=$product['product_name']?></h1><br>
        <span class="price" style="font-size: 30px;"> Rs.
           <?=$product['mrp']-($product['mrp']*$product['discount']/100)?>
        </span><br><br>
        <div class="category" style="font-size: 15px;">Category:
            <?=$product['category']?></div><br><br>
        <div class="description" style="font-size: 20px;">
            <?=$product['description']?></div><br><br>
            <?php 
           $rt="SELECT AVG(`rating_out_of_5`) AS avgrate FROM rating WHERE product_id='$id'";
           $wc=mysqli_query($db,$rt);
           $yt=mysqli_fetch_array($wc);
           if($yt['avgrate']>0)
           {
             ?>
              <div class="rating" style="font-size: 20px;">Rating :
            <?=round($yt['avgrate'],2);?></div><br><br><?php
           }

            ?>
        <form action="" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['qty']?>" style="font-size: 20px;" placeholder="Quantity" required> <br><br><br>
            <input type="submit" name="submit" value="Add To Cart" style="width:300px;background: transparent;font-weight:700;font-size:20px;border:none;outline: none;color:black;background: #FFB6C1;padding:8px 16px;border-radius: 5px;margin-left: 5px;">
            <div class="btn btn-primary" style="width:300px;background: transparent;font-weight:700;font-size:20px;border:none;outline: none;color:black;background: #FFB6C1;padding:8px 16px;border-radius: 5px;margin-left: 5px;"><a href="addwish.php?pid=<?=$product['product_id']?>" style="color:black;">&nbsp &nbsp &nbsp Add To Wishlist </a></div>
        </form>
        
        
         <?php
if(isset($_POST['submit']))
{ 
  if(isset($_SESSION['id'])){
 $qty=$_POST['quantity'];
  
  $sql1=" INSERT INTO `cart` (`c_id`, `product_id`, `qty_in_cart`) VALUES('$atc','$id','$qty')";
  $res2=mysqli_query($db,$sql1);
  
  if($res2){
    echo "done"; }
    ?>
    <script type="text/javascript">
     alert("Product added Successfully!");
     window.location="product.php";
   </script>
   <?php
 }
}
 ?>
<br><br><br><br><br><br><?php
  $uv="SELECT * FROM rating r,customer c,orders o WHERE o.c_id=c.c_id AND o.product_id=r.product_id AND r.order_id=o.order_id AND r.product_id='$id'";
                    $rv=mysqli_query($db,$uv);
                    $rw=mysqli_num_rows($rv);
                    if($rw>0){
                     ?>
                     <h2>Reviews:</h2><br>
                     <?php
                    }
                     while($data=mysqli_fetch_array($rv))
                     {  
                      ?>
                      <div class="review" style="font-size: 15px;">
            "<?=$data['review']?>"</div>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  - &nbsp<?php echo $data['cname'];
          }

 ?>
    </div></td>
  </table>
</div>

</body>
</html>
