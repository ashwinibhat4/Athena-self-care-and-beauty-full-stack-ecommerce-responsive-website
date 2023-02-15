<?php
session_start();
if(isset($_SESSION['id']))
{
	unset($_SESSION['id']);
}
else if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);
}
else{
	unset($_SESSION['usr_id']);
}
header("location:index.php");
?>