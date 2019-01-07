<?php
 
$con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$con) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($con, 'cookbgco_sting');
mysqli_set_charset($con,"utf8");

$check = $_POST['check'];

$sql_select = "SELECT * FROM form_upld WHERE id = '$check'";
$select_res = mysqli_query($con, $sql_select);

while ($row_select = mysqli_fetch_assoc($select_res)) {
	$brand = $row_select['brand'];
	$user = $row_select['user'];
	$pharmacy = $row_select['pharmacy'];
	$img = $row_select['img'];
}

               
$sql = "UPDATE top_image SET brand='$brand', pharmacy_code='$pharmacy', user='$user', img='$img'";
$res = mysqli_query($con, $sql); //or die(mysql_error());
 

            
$return['msg'] = _('');

        
			

echo json_encode($ph_id); 


?>