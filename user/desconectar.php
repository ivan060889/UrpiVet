<?php 
session_start();
if($_SESSION['correo']){	
	session_destroy();
	header("location:../login");
}
else{
	header("location:../login");
}
?>