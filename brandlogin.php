
<?php include('servershop.php') ?>
<html>

<head>
   
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <link rel="stylesheet" href='reg.css'>
</head>

<body>
           <div class="main-div">
           	<img src="images/most-beautiful-flowers-wallpapers-hd.jpg" name='back' alt="background" style="height:100%;width:100%" />
        <div class="box">
        
          <form action="brandlogin.php" method='post' >
           <?php include('errors.php'); ?>
            <h1>Enterprise login</h1>
            

            <div class="input-box">
                <input type="text" name="email" value="<?php echo $email; ?>" autocomplete="off" >
                <label for="Email">Email
                </label>
            </div>

            
			   <div class="input-box">
                <input type="password" name="password" autocomplete="off" >
                <label for="password">password
                </label>
            </div>
			<div class="input-box">
			<input type="submit" name='login' value='login' >
                   </div>
				   <p  class="log">
  		Not yet a member? <a href="brandregistration.php">Register</a>
  	</p>
  	<p  class="log">
  		Have special Athena pass? <a href="adminlogin.php">Admin Login</a>
  	</p>
	</div>

	</form>
</div>
	</div>
       
            
          
        
</body>

</html>