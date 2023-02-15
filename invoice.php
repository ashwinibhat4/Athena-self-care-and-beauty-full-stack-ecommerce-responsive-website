<?php
include "connection.php";
session_start();
$uid= $_SESSION['id'];
$oid=$_GET['id'];
$total=0.0;
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
   <br><br><br><br><br><br>
    <div class="placeorder content-wrapper">
<?php 
$pq="SELECT * FROM customer WHERE cemail = '$uid' ";
$qs=mysqli_query($db,$pq);
$cust=mysqli_fetch_array($qs);

$qp="SELECT * FROM payment WHERE order_id = '$oid' ";
$sq=mysqli_query($db,$qp);
$ord=mysqli_fetch_array($sq);

?>    <h1>Your Order Has Been Placed</h1>
    <div class='container'>
     <div class='col-md-12'>
        <div class='invoice'>
          <!-- begin invoice-company -->
          <div class='invoice-company text-inverse f-w-600'>
            <span class='pull-right hidden-print'>

              <a href='javascript:;' onclick='window.print()' class='btn btn-sm btn-white m-b-10 p-l-5'><i class='fa fa-print t-plus-1 fa-fw fa-lg' style="font-size:30px"></i> Print</a>
            </span>
            Athena, Inc
          </div>
          <!-- end invoice-company -->
          <!-- begin invoice-header -->
          <div class='invoice-header'>
            <div class='invoice-from'>
              <small>From</small>
              <address class='m-t-5 m-b-5'>
                <strong class='text-inverse'> Athena </strong><br>
                <wbr> </address>Miss Athena<br>
                  Andheri ,Mumbai<br>
                  Phone: (0831) 4540-12<br>
                  Fax: (123) 456-7890
                </address>
              </div>
              <div class='invoice-to'>
                <small>Shipping Address</small>
                <address class='m-t-5 m-b-5'>
                  <strong class='text-inverse'><?php echo $cust['cname'] ;?></strong><br>
                  <strong class='text-inverse'><?php echo $ord['deladdress'] ;?></strong><br>
                </address>
              </div>
              <div class='invoice-date'>

                <div class='date text-inverse m-t-5'> 
                 <?=$ord['date'] ?></div>
                 <div class='invoice-detail'>
                  <strong>#10025400<?= $oid ?> <br> 
                  </strong>         
                </div>
              </div>
            </div>
            <!-- end invoice-header -->
            <!-- begin invoice-content -->
            <div class='invoice-content'>
              <!-- begin table-responsive -->
              <div class='table-responsive'>
                <table class='table table-invoice'>
                  <thead>
                    <tr>
                      <th>PRODUCT</th>

                      <th class='text-center' width='10%'>UNIT PRICE</th>
                      <th class='text-center' width='10%'>MRP</th>
                      <th class='text-center' width='10%'>DISCOUNT</th>
                      <th class='text-center' width='10%'>QUANTITY</th>
                      <th class='text-right' width='20%'>SUBTOTAL </th>
                    </tr>
                  </thead>




                  <tbody>

                    <?php

                     $yt="SELECT * FROM orders o,products p,brand b WHERE b.brand_id=p.brand_id AND o.product_id=p.product_id AND o.order_id='$oid'";
                    $records=mysqli_query($db,$yt);
    
                     
                     while($data=mysqli_fetch_array($records)) {
                      $total = $total + $data['amount'] ;
                     ?>
                     <tr>
                      <td>
                        <span class='text-inverse'><?php echo $data['product_name']?></span><br>
                        <small > By:  <?= $data['name']?></small>
                      </td>
                      <td class='text-center'> <?=$data['mrp']-($data['mrp']*$data['discount']/100)?></td>
                      <td class='text-center'> <?=$data['mrp']?></td>
                      <td class='text-center'> <?=$data['discount']?>%</td>
                      <td class='text-center'><?=$data['qty_ordered']?></td>
                      <td class='text-right'><?=$data['amount']?></td>
                    </tr>
                  <?php } ?>
                </tbody>

              </table>
            </div>
            <!-- end table-responsive -->
            <!-- begin invoice-price -->
            <div class='invoice-price'>
              <div class='invoice-price-left'>
                <div class='invoice-price-row'>

                </div>
              </div>
              <div class='invoice-price-right'>
                <small>TOTAL</small>
                <span class='f-w-600'style="font-size:36px;font-weight: 200;"> <?=$total?></span>
              </div>
            </div>
            <!-- end invoice-price -->
          </div>
          <!-- end invoice-content -->
          <!-- begin invoice-note -->

          <!-- end invoice-note -->
          <!-- begin invoice-footer -->
          <div class='invoice-footer'>
            <p class='text-center m-b-5 f-w-600'>

              Thank you for ordering with us
            </p>
            <p class='text-center'>
              <span class='m-r-10'><i class='fa fa-fw fa-lg fa-globe'></i> athena.com</span>
              <span class='m-r-10'><i class='fa fa-fw fa-lg fa-phone-volume'></i> 5452302</span>
              <span class='m-r-10'><i class='fa fa-fw fa-lg fa-envelope'></i> athena@athena.com</span>
            </p>
          </div>
          <!-- end invoice-footer -->
        </div>
      </div>
    </div>


  </div> 