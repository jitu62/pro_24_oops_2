<?php
session_start();
if(isset($_SESSION['username'])){
        unset($_SESSION['username']);
		unset($_SESSION['fullname']);
		unset($_SESSION['email']);
		unset($_SESSION['mobile']);
		unset($_SESSION['address']);
		header("location: login.php");
}else{
header("location: login.php");
}


?>