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
                <h2>Services :</h2></div><br><br>
                <table class='table table-bordered table-hover'>
                    
                    <tr style='background-color:#ADD8E6';>
                        <th>SERVICE TYPE</th>
                        <th>PROVIDER</th>
                        <th>CONTACT</th>
                        <th>EMAIL</th>
                        <th>ADDRESS</th>
                        <th>PRICE</th>
                        <th>DISCOUNT</th>
                        
                        <th>EDIT</th>
                    </tr>
                
                <?php
                      $qr="SELECT * FROM services";
                    $records=mysqli_query($db,$qr);
    
                     
                     while($data=mysqli_fetch_array($records))
                     {  
                       
                    
                 ?>
                      <tr>
                        <td><?php echo $data['type']?></td>
                         <td><?php echo $data['sname']?></td>
                        <td><?php echo $data['contact']?></td>
                        <td><?php echo $data['semail']?></td>
                        <td><?php echo $data['saddress']?></td>
                        <td><?php echo $data['price']?></td>
                        <td><?php echo $data['sdiscount']?></td>
                        
                        <td>
                         &nbsp&nbsp &nbsp<div class="btn btn-primary" ><a style="color:white;" href="updates.php?id=<?php echo $data['service_id'];?>">Update</a></div>
                        <br><br> &nbsp&nbsp &nbsp<div class="btn btn-primary" ><a style="color:white;" href="deleteservice.php?id=<?php echo $data['service_id'];?>">Remove</a></div></td>


                    </td>
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