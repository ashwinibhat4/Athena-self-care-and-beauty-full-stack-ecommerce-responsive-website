
<?php include('servershop.php') ?>
<html>

<head>
    <link rel="stylesheet" href='reg.css'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

</head>

<body>
    <div class="main-div">
            <img src="images/beautiful-park-with-colorful-tulips-garden-free-download-images.jpg" name='back' alt="background" style="height:100%;width:100%" />
        <div class="box">
      <form action="brandregistration.php" method='post' >
	  	<?php include('errors.php'); ?>
            <h1>Enterprise Registration</h1>
            <div class="input-box">
                <input type="text" name="Brandname" value="<?php echo $name; ?>" autocomplete="off" >
                <label for="name">Brand
                </label>
            </div>
            <div class="input-box">
                <input type="text" name="Username" value="<?php echo $username; ?>" autocomplete="off" >
                <label for="username">Owner
                </label>
            </div>
            <div class="input-box">
                <input type="text" name="MobileNumber" value="<?php echo $mobile; ?>" autocomplete="off" >
                <label for="MobileNumber">Mobile Number
                </label>
            </div>
            
            <div class="input-box">
                <input type="text" name="email" value="<?php echo $email; ?>" autocomplete="off" >
                <label for="email">Email Address
				</label>
            </div>
            <div class="input-box">
                <input type="text" name="Address" value="<?php echo $address; ?>" autocomplete="off" >
                <label for="address">Address
                </label>
            </div>
             <div class="input-box">
                <input type="text" name="AccountNumber" value="<?php echo $accountno; ?>" autocomplete="off" >
                <label for="accountno">Account Number
                </label>
            </div>
			   <div class="input-box">
                <input type="password" name="password_1" autocomplete="off" >
                <label for="password1">password
                </label>
            </div>
			<div class="input-box">
                <input type="password" name="password_2" autocomplete="off" >
                <label for="password2">confirm password
                </label>
            </div>
			<div class="input-box">
                        <input type="submit" name='register' value='register' >
                   </div>
				   <p  class="log">
  		Already a member? <a href="brandlogin.php">log in</a>
  	</p>
	</form>
	</div>
       
            
          </div>
   
        
</body>

</html>