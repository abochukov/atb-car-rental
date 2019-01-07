<?php
 
$con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$con) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($con, 'cookbgco_sting');
mysqli_set_charset($con,"utf8");

$pharm_name = $_POST['pharm_name'];
$segment = $_POST['segment'];
$pharmid = $_POST['pharmid'];
$ph_id = $_POST['ph_id'];
$adres = $_POST['adres'];
$check = $_POST['check'];
$clon = $_POST['clon'];


               
$sql = "UPDATE city SET city='$pharm_name', segment='$segment', active='$check' WHERE id='$ph_id'";
$res = mysqli_query($con, $sql); //or die(mysql_error());

$sql2 = "UPDATE pharmacy SET Address='$adres', Segment='$segment', Clon='$clon' WHERE ID='$pharmid'";
$res2 = mysqli_query($con, $sql2); //or die(mysql_error());
 

            
$return['msg'] = _('');

        
			

echo json_encode($ph_id); 


?>