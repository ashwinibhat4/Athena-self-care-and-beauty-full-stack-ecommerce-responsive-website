<?php
include "connection.php";
session_start();
$uid= $_SESSION['id'];
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
   <h4 class="title"> Our Services </h4>
</div>
 </div><br>
                <table class='table table-bordered table-hover'>
                    
                    <tr style='background-color:#ADD8E6';>
                 <th>SERVICE</th>
                 <th>SERVICE PROVIDER</th>
                 <th>CONTACT</th>
                 <th>ADDRESS</th>
                 <th>EMAIL</th>
                 <th>PRICE</th>
                 <th>DISCOUNT</th>
                 <th>APPLY</th>
                    </tr>
                
                <?php
                    $qr="SELECT * FROM `services`";
                    $records=mysqli_query($db,$qr);
    
                     
                     while($data=mysqli_fetch_array($records)){
                        
                 ?>
                       <tr>
                       <td><?php echo $data['type']?></td>
                       <td><?php echo $data['sname']?></td>
                       <td><?php echo $data['contact']?></td>
                       <td><?php echo $data['saddress']?></td>
                       <td><?php echo $data['semail']?></td>
                       <td><?php echo $data['price']?></td>
                       <td><?php echo $data['sdiscount']?></td>
                       <td><div class="btn btn-primary" ><a style="color:white;" href="apply_service.php?sid=<?php echo $data['service_id'];?>">APPLY</a></div></td> 
                    </tr>
                     
                     <?php
                     }
                     
                ?>
    </div>
</table>
</div>
</body>
</html>