<?php
 
$con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$con) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($con, 'cookbgco_sting');
mysqli_set_charset($con,"utf8");

$user = $_POST['user'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$description = $_POST['description'];
$role = $_POST['check'];

$options = array("cost"=>4);
$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

               
$sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', description = '$description', role = '$role' WHERE id='$user'";
$res = mysqli_query($con, $sql); //or die(mysql_error());
 

            
$return['msg'] = _('');

        
			

echo json_encode($data); 


?>