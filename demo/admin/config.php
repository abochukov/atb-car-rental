<?php 

$conn = mysqli_connect("localhost","cookbgco_nakata","nakata149754na","cookbgco_sting");


if(!$conn){

	die("Connection error: " . mysqli_connect_error());	

}


mysqli_set_charset($conn,"utf8");
?>