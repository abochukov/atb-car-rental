<?php
 
$con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$con) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($con, 'cookbgco_sting');
mysqli_set_charset($con,"utf8");

$userid = $_POST['userid'];
$today = date('Y-m-d');


$check1 = $_POST['check1'];
if ($check1 == '1') {$ch1 = '1';} else {$ch1 = '0';}
$check2 = $_POST['check2'];
if ($check2 == '2') {$ch2 = '1';} else {$ch2 = '0';}
$check3 = $_POST['check3'];
if ($check3 == '3') {$ch3 = '1';} else {$ch3 = '0';}
$check4 = $_POST['check4'];
if ($check4 == '4') {$ch4 = '1';} else {$ch4 = '0';}
$check5 = $_POST['check5'];
if ($check5 == '5') {$ch5 = '1';} else {$ch5 = '0';}


/* zones*/
$a1 = $_POST['a1'];
$a2 = $_POST['a2'];
$a3 = $_POST['a3'];
$a4 = $_POST['a4'];
$a5 = $_POST['a5'];


            


$sql_check1 = "UPDATE `zone` SET `active` = '$ch1' WHERE `id` = '1'";
$res_check1 = mysqli_query($con, $sql_check1); //or die(mysql_error());   

$sql_check2 = "UPDATE `zone` SET `active` = '$ch2' WHERE `id` = '2'";
$res_check2 = mysqli_query($con, $sql_check2); //or die(mysql_error());   

$sql_check3 = "UPDATE `zone` SET `active` = '$ch3' WHERE `id` = '3'";
$res_check3 = mysqli_query($con, $sql_check3); //or die(mysql_error());   

$sql_check4 = "UPDATE `zone` SET `active` = '$ch4' WHERE `id` = '4'";
$res_check4 = mysqli_query($con, $sql_check4); //or die(mysql_error());   

$sql_check5 = "UPDATE `zone` SET `active` = '$ch5' WHERE `id` = '5'";
$res_check5 = mysqli_query($con, $sql_check5); //or die(mysql_error());   





$sql_zone1 = "UPDATE `zone` SET `zone` = '$a1' WHERE `id` = '1'";
$res_zone1 = mysqli_query($con, $sql_zone1); //or die(mysql_error());   

$sql_zone2 = "UPDATE `zone` SET `zone` = '$a2' WHERE `id` = '2' ";
$res_zone2 = mysqli_query($con, $sql_zone2); //or die(mysql_error());   

$sql_zone3 = "UPDATE `zone` SET `zone` = '$a3' WHERE `id` = '3' ";
$res_zone3 = mysqli_query($con, $sql_zone3); //or die(mysql_error());

$sql_zone4 = "UPDATE `zone` SET `zone` = '$a4' WHERE `id` = '4' ";
$res_zone4 = mysqli_query($con, $sql_zone4); //or die(mysql_error());

$sql_zone5 = "UPDATE `zone` SET `zone` = '$a5' WHERE `id` = '5' ";
$res_zone5 = mysqli_query($con, $sql_zone5); //or die(mysql_error());




//$sql_zone13 = "UPDATE `targets_zone1` SET mode= '$sum_special_visibility' WHERE user = 'userid'";
//$res_zone13 = mysqli_query($con, $sql_zone13); //or die(mysql_error());

$return['msg'] = _('Успешно зададенa зона!');		

echo json_encode($return); 


?>