<?php 
session_start();
echo "Welcome ".$_SESSION['email'];
header("Location: check-alert.html");
 ?>
 <br>
 
 