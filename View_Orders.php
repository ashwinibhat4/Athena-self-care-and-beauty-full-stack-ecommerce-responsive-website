<?php
include "connection.php";
session_start();
$uid= $_SESSION['user_id'];
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
        <a href="index.php">home</a>
        <a href="View_Products.php">Your Products</a>
        <a href="reviews.php">Reviews</a>
        <a href="Add_Products.php">Add</a>
        <a href="View_Orders.php">View Orders</a>
        <a href="Logout.php">Logout</a>
    </nav>

    
</header>
            <div class="vwprd"><br><br><br><br><br><br>
                <div class="prd" style="color:black;font-weight:600;font-size: 20px;">
                <h2>Not Delivered :</h2></div><br><br>
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
                     
                     $qr="SELECT * FROM orders O,products P,customer C,brand B, payment T WHERE O.product_id=P.product_id AND O.c_id=C.c_id AND O.order_id=T.order_id AND P.brand_id=B.brand_id AND B.email='$uid' AND O.status='Not Delivered'";
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
                       <td>  
                        <div class="btn btn-primary" ><a style="color:white;" href="update_status.php?id=<?php echo $data['order_id'];?>&sp=<?php echo $data['product_id'];?>">DONE</a></div>
                       </td>
                        
                    </tr>
                     
                     <?php
                     }
                     
                ?>
    </div>
</table>
<br><br><br>
          <h2>Delivered :</h2></div><br><br>
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
                
                    </tr>
                
                <?php
                     
                     $qr="SELECT * FROM orders O,products P,customer C,Brand B, payment T WHERE O.product_id=P.product_id AND O.c_id=C.c_id AND O.order_id=T.order_id AND P.brand_id=B.brand_id AND B.email='$uid' AND O.status='Delivered'";
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
