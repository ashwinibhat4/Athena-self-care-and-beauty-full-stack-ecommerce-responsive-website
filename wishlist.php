<?php
include "connection.php";
session_start();
$uid= $_SESSION['id'];
if (!isset($_SESSION['id'])){
  header("location:login.php");
}
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
   <div class="vwprd"><br><br><br><br><br><br>
                <div class="prd" style="color:black;font-weight:600;font-size: 20px;">
                <h2>Your Wishlist :</h2></div><br><br>
                <table class='table table-bordered table-hover'>
                    
                    <tr style='background-color:#ADD8E6';>
                        <th>PRODUCT_NAME</th>
                        <th>IMAGE</th>
                        <th>BRAND</th>
                        <th>DESCRIPTION</th>
                        <th>CATEGORY</th>
                        <th>MRP</th>
                        <th>QUANTITY</th>
                        <th>DISCOUNT</th>
                        
                        <th></th>
                    </tr>
                
                <?php
                $sql3= "SELECT `c_id` FROM `customer` WHERE `cemail`= '$uid'";
                $res1= mysqli_query($db,$sql3);
               $fetchq=mysqli_fetch_array($res1);
               $atc = $fetchq['c_id'];
                      $qr="SELECT * FROM products P,brand B,wishlist w WHERE B.brand_id=P.Brand_id AND w.product_id=P.product_id AND w.c_id='$atc'";
                    $records=mysqli_query($db,$qr);
    
                     
                     while($data=mysqli_fetch_array($records))
                     {  
                        $fbi=$data['image'];

                    
                 ?>
                      <tr>
                        <td><?php echo $data['product_name']?></td>
                        <td><?php echo "<img  height=200 width=200 src='$fbi' alt='img'>"?></td>
                         <td><?php echo $data['name']?></td>
                        <td><?php echo $data['description']?></td>
                        <td><?php echo $data['category']?></td>
                        <td><?php echo $data['mrp']?></td>
                        <td><?php echo $data['qty']?></td>
                        <td><?php echo $data['discount']?></td>
                        
                        <td><br>
                        &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp<div class="btn btn-primary" ><a style="color:white;" href="addcart.php?id=<?php echo $data['product_id'];?>">Add To Cart</a></div>
                      <br><br> &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp <div class="btn btn-primary" ><a style="color:white;" href="deletewish.php?id=<?php echo $data['product_id'];?>">Remove</a></div></td>
                    </tr>
                     <?php
                     }
                ?>
    </div>
</table>
</div>
</body>
</html>