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
  </header>
    <?php
    }
   ?>
   <div class="vwprd"><br><br><br><br><br><br>
                <div class="prd" style="color:black;font-weight:600;font-size: 20px;">
                <h2>Order History :</h2></div><br><br>
                <table class='table table-bordered table-hover'>
                    
                    <tr style='background-color:#ADD8E6';>
                       <th>ORDER_NO.</th>
                 <th>PRODUCT NAME</th>
                 <th>BRAND</th>
                 <th>QUANTITY</th>
                 <th>TIME</th>
                 <th>MODE</th>
                 <th>ADDRESS</th>
                 <th>TOTAL</th>
                 <th>STATUS</th>
                 <th>REVIEW</th>       
                    </tr>
                
                <?php
                $sql3= "SELECT `c_id` FROM `customer` WHERE `cemail`= '$uid'";
                $res1= mysqli_query($db,$sql3);
               $fetchq=mysqli_fetch_array($res1);
               $atc = $fetchq['c_id'];
                      $qr="SELECT * FROM orders O,products P,customer C,brand B, payment T WHERE O.product_id=P.product_id AND O.c_id=C.c_id AND O.order_id=T.order_id AND P.brand_id=B.brand_id AND O.c_id='$atc'";
                    $records=mysqli_query($db,$qr);
    
                     
                     while($data=mysqli_fetch_array($records))
                     {  
                        

                    
                 ?>
                      <tr>
                       <td><?php echo $data['order_id']?></td>
                       <td><?php echo $data['product_name']?></td> 
                       <td><?php echo $data['name']?></td> 
                       <td><?php echo $data['qty_ordered']?></td>
                       <td><?php echo $data['date']?></td>
                       <td><?php echo $data['mode_of_payment']?></td>
                       <td><?php echo $data['deladdress']?></td>
                       <td><?php echo $data['amount']?></td> 
                       <td><?php echo $data['status']?></td>   
                       <td>  
                        <div class="btn btn-primary" ><a style="color:white;" href="write_review.php?oid=<?php echo $data['order_id'];?>&sp=<?php echo $data['product_id'];?>&st=<?php echo $data['status'];?>">Write Review</a></div>
                       </td>
                        
                    </tr>
                     <?php
                     }
                ?>
    </div>
</table>
<br><br><br>

<h2>Booked Services :</h2></div><br><br>
                <table class='table table-bordered table-hover'>
                    
                    <tr style='background-color:#ADD8E6';>
                 <th>SERVICE</th>
                 <th>SERVICE PROVIDER</th>
                 <th>CONTACT</th>
                 <th>ADDRESS</th>
                 <th>EMAIL</th>
                 <th>PRICE</th>
                 <th>DATE</th>
                
                    </tr>
                
                <?php
                     
                     $qq="SELECT * FROM customer C, services S, service_booked B WHERE C.c_id=B.c_id AND S.service_id=B.service_id AND B.c_id='$atc'";
                    $rec=mysqli_query($db,$qq);
    
                     
                     while($dat=mysqli_fetch_array($rec))
                     {  
                      $price=$dat['price']-($dat['price']*$dat['sdiscount']/100);
                        
                 ?>
                       <tr>
                       <td><?php echo $dat['type']?></td>
                       <td><?php echo $dat['sname']?></td>
                       <td><?php echo $dat['contact']?></td>
                       <td><?php echo $dat['saddress']?></td>
                       <td><?php echo $dat['semail']?></td>
                       <td><?php echo $price;?></td>
                       <td><?php echo $dat['date']?></td>
                        
                    </tr>
                     
                     <?php
                     }
                     
                ?>
    </div>
</table>
</div>
</body>
</html>