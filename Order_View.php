<?php
include "connection.php";
session_start();
$uid= $_SESSION['usr_id'];
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="cover">
            <header>
    
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

    
</header>
            <div class="vwprd"><br><br><br><br><br><br>
                <div class="prd" style="color:black;font-weight:600;font-size: 20px;">
                <h2>Orders :</h2></div><br><br>
                <table class='table table-bordered table-hover'>
                    
                    <tr style='background-color:#ADD8E6';>
                 <th>ORDER_NO.</th>
                 <th>CUSTOMER-NAME</th>
                 <th>CONTACT</th>
                 <th>ACCOUNT-NO</th>
                 <th>PRODUCT NAME</th>
                 <th>QUANTITY</th>
                 <th>TIME</th>
                 <th>MODE</th>
                 <th>ADDRESS</th>
                 <th>TOTAL</th>
                 <th>STATUS</th>
                
                    </tr>
                
                <?php
                     
                     $qr="SELECT * FROM orders O,products P,customer C,brand B, payment T WHERE O.product_id=P.product_id AND O.c_id=C.c_id AND O.order_id=T.order_id AND P.brand_id=B.brand_id ";
                    $records=mysqli_query($db,$qr);
    
                     
                     while($data=mysqli_fetch_array($records))
                     {  
                        
                 ?>
                       <tr>
                       <td><?php echo $data['order_id']?></td>
                       <td><?php echo $data['cname']?></td>
                       <td><?php echo $data['ccontact']?></td>
                       <td><?php echo $data['acct_no']?></td>
                       <td><?php echo $data['product_name']?></td> 
                       <td><?php echo $data['qty_ordered']?></td>
                       <td><?php echo $data['date']?></td>
                       <td><?php echo $data['mode_of_payment']?></td>
                       <td><?php echo $data['deladdress']?></td>
                       <td><?php echo $data['amount']?></td>   
                       <td><?php echo $data['status']?></td>
                        
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
                 <th>CUSTOMER</th>
                 <th>DATE</th>
                
                    </tr>
                
                <?php
                     
                     $qr="SELECT * FROM customer C, services S, service_booked B WHERE C.c_id=B.c_id AND S.service_id=B.service_id";
                    $records=mysqli_query($db,$qr);
    
                     
                     while($data=mysqli_fetch_array($records))
                     {  
                        
                 ?>
                       <tr>
                       <td><?php echo $data['type']?></td>
                       <td><?php echo $data['sname']?></td>
                       <td><?php echo $data['cname']?></td>
                       <td><?php echo $data['date']?></td>
                        
                    </tr>
                     
                     <?php
                     }
                     
                ?>
    </div>
</table>
</div>
</div>
</body>
</html>
