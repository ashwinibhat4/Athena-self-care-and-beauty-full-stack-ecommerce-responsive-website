<?php
  include "connection.php";
  session_start();
  $uid= $_SESSION['id'];
?>
<html>

<head>
    <link rel="stylesheet" href='reg.css'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <style>
      ::placeholder{color:#FFB6C1;}
    </style>
</head>

<body>
    <div class="main-div">
            
        <div class="box">
      <form name="addorderdetails"  method="POST" enctype="multipart/form-data">
        <h1 style="font-family: sans-serif;">Order Details</h1>
              <div class="addproductdetails">
              <input type="text" name="address" placeholder="Delivery Address" required="" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; " autocomplete="off"><br><br>
              
              <input type="text" name="actno" placeholder="Account No" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; " autocomplete="off"><br><br>
              
              <label for="Mode Of Payment" style="font-size: 14px;color:#FFB6C1">Mode Of Payment
                </label><br><br>
                <select id="mop" name="mop" size="1" style="width: 100%;padding: 5px;color: #FFB6C1;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: transparent;outline: none; ">
                  <option value="COD" style="width: 100%;padding: 5px;color: black;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: #FFB6C1;outline: none;">COD</option>
                  <option value="Credit Card" style="width: 100%;padding: 5px;color: black;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: #FFB6C1;outline: none;">Credit Card</option>
                  <option value="Net Banking" style="width: 100%;padding: 5px;color: black;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: #FFB6C1;outline: none;" >Net Banking</option>
                  <option value="Gpay" style="width: 100%;padding: 5px;color: black;letter-spacing: 1px;margin-bottom: 10px;border: none;border-bottom:1px solid #FFB6C1 ;background: #FFB6C1;outline: none;">Gpay</option>
                 </select>
              
          <br></div>
              <br><br>
               &nbsp &nbsp &nbsp<input type="submit" name="submit" value="Place Order" style="width:80%;background: transparent;font-weight:700;font-size:15;border:none;outline: none;color:black;background: #FFB6C1;padding:8px 16px;border-radius: 5px;margin-left: 5px;">
            </div>
            </form>
        <?php

if(isset($_POST['submit']))
{ 
 $deladdress = $_POST['address'];
 $actno = $_POST['actno'];
 $mop = $_POST['mop'];
  

  $sql3= "SELECT `c_id` FROM `customer` WHERE `cemail`= '$uid'";
  $res1= mysqli_query($db,$sql3);
  $fetchq=mysqli_fetch_array($res1);
  $atc = $fetchq['c_id'];

$q1 = "SELECT order_id FROM orders";
$reslt=mysqli_query($db,$q1);
$rw=mysqli_num_rows($reslt); 
$x=$rw+1;

$qr="SELECT * from cart c,products p where c.product_id=p.product_id and c.c_id='$atc'";
$products=mysqli_query($db,$qr); 
foreach ($products as $product):
 $prodid = $product['product_id'];
 $qty = $product['qty_in_cart'];
 $price=$product['mrp']-($product['mrp']*$product['discount']/100);
 $subtotal = (float)$price * (int)$product['qty_in_cart'];
  $sql1=" INSERT INTO `orders` (`order_id`, `product_id`, `c_id`, `qty_ordered`, `amount`, `status`) VALUES('$x','$prodid','$atc','$qty','$subtotal','Not Delivered')";
  $res2=mysqli_query($db,$sql1);
  endforeach;
  $sql5=" INSERT INTO `payment`(`order_id`, `date`, `mode_of_payment`, `acct_no`, `deladdress`) VALUES ('$x',current_timestamp(),'$mop','$actno','$deladdress')";
  $res5=mysqli_query($db,$sql5);
  if($res2 && $res5){
  $sql6="DELETE FROM cart WHERE c_id='$atc'";
  $res6=mysqli_query($db,$sql6);
       }
  if($res2 && $res5 && $res6){
    echo "done"; }
    ?>
    <script type="text/javascript">
     alert("Your Order has been placed!");
     window.location="invoice.php?id=<?php echo $x;?>";
   </script>
   <?php
 }

 ?>
    </div>
    
  </div>
  
</body>
</html>