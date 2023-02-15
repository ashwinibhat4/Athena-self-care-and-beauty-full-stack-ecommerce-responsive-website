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
                <h2>Products :</h2></div><br><br>
                <table class='table table-bordered table-hover'>
                    
                    <tr style='background-color:#ADD8E6';>
                        <th>PRODUCT_NAME</th>
                        <th>IMAGE</th>
                        <th>DESCRIPTION</th>
                        <th>CATEGORY</th>
                        <th>MRP</th>
                        <th>QUANTITY</th>
                        <th>DISCOUNT</th>
                        
                        <th>EDIT</th>
                    </tr>
                
                <?php
                      $sql3= "SELECT `brand_id` FROM `brand` WHERE `email`= '$uid'";
                    $res1= mysqli_query($db,$sql3);
                    $fetchq=mysqli_fetch_array($res1);
                    $atc = $fetchq['brand_id'];
                     $records=mysqli_query($db, "SELECT * FROM products WHERE brand_id='$atc';");
                     while($data=mysqli_fetch_array($records))
                     {  
                        $fbi=$data['image'];

                    
                 ?>
                      <tr>
                        <td><?php echo $data['product_name']?></td>
                        <td><?php echo "<img  height=200 width=200 src='$fbi' alt='img'>"?></td>
                        <td><?php echo $data['description']?></td>
                        <td><?php echo $data['category']?></td>
                        <td><?php echo $data['mrp']?></td>
                        <td><?php echo $data['qty']?></td>
                        <td><?php echo $data['discount']?></td>
                        
                        <td><br><div class="btn btn-primary" ><a style="color:white;" href="Update.php?id=<?php echo $data['product_id'];?>">Update</a></div><br><br>
                        <div class="btn btn-primary" ><a style="color:white;" href="delete.php?id=<?php echo $data['product_id'];?>">Remove</a></div></td>
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
