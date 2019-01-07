<?php
 
$con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$con) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($con, 'cookbgco_sting');
mysqli_set_charset($con,"utf8");

$userid = $_POST['userid'];
$today = date('Y-m-d');


$a1 = $_POST['a1'];
$a2 = $_POST['a2'];
$a3 = $_POST['a3'];
$a4 = $_POST['a4'];
$a5 = $_POST['a5'];
$a6 = $_POST['a6'];
$a7 = $_POST['a7'];
$a8 = $_POST['a8'];
$a9 = $_POST['a9'];
$a10 = $_POST['a10'];
$a11 = $_POST['a11'];
$a12 = $_POST['a12'];
$a13 = $_POST['a13'];
$a14 = $_POST['a14'];
$a15 = $_POST['a15'];
$a16 = $_POST['a16'];
$a17 = $_POST['a17'];
$a18 = $_POST['a18'];

$check1 = $_POST['check1'];
if ($check1 == '1') {$ch1 = '2';} else {$ch1 = '1';}
$check2 = $_POST['check2'];
if ($check2 == '2') {$ch2 = '2';} else {$ch2 = '1';}
$check3 = $_POST['check3'];
if ($check3 == '3') {$ch3 = '2';} else {$ch3 = '1';}
$check4 = $_POST['check4'];
if ($check4 == '4') {$ch4 = '2';} else {$ch4 = '1';}
$check5 = $_POST['check5'];
if ($check5 == '5') {$ch5 = '2';} else {$ch5 = '1';}

$check6 = $_POST['check6'];
if ($check6 == '6') {$ch6 = '2';} else {$ch6 = '1';}

$check7 = $_POST['check7'];
if ($check7 == '7') {$ch7 = '2';} else {$ch7 = '1';}

$check8 = $_POST['check8'];
if ($check8 == '8') {$ch8 = '2';} else {$ch8 = '1';}

$check9 = $_POST['check9'];
if ($check9 == '9') {$ch9 = '2';} else {$ch9 = '1';}

$check10 = $_POST['check10'];
if ($check10 == '10') {$ch10 = '2';} else {$ch10 = '1';}

$check11 = $_POST['check11'];
if ($check11 == '11') {$ch11 = '2';} else {$ch11 = '1';}

$check12 = $_POST['check12'];
if ($check12 == '12') {$ch12 = '2';} else {$ch12 = '1';}

$check13 = $_POST['check13'];
if ($check13 == '13') {$ch13 = '2';} else {$ch13 = '1';}

$check14 = $_POST['check14'];
if ($check14 == '14') {$ch14 = '2';} else {$ch14 = '1';}

$check15 = $_POST['check15'];
if ($check15 == '15') {$ch15 = '2';} else {$ch15 = '1';}

$check16 = $_POST['check16'];
if ($check16 == '16') {$ch16 = '2';} else {$ch16 = '1';}

$check17 = $_POST['check17'];
if ($check17 == '17') {$ch17 = '2';} else {$ch17 = '1';}

$check18 = $_POST['check18'];
if ($check18 == '18') {$ch18 = '2';} else {$ch18 = '1';}



$active1 = $_POST['active1'];
if ($active1 == '21') {$act1 = '1';} else {$act1 = '0';}
$active2 = $_POST['active2'];
if ($active2 == '22') {$act2 = '1';} else {$act2 = '0';}
$active3 = $_POST['active3'];
if ($active3 == '23') {$act3 = '1';} else {$act3 = '0';}
$active4 = $_POST['active4'];
if ($active4 == '24') {$act4 = '1';} else {$act4 = '0';}
$active5 = $_POST['active5'];
if ($active5 == '25') {$act5 = '1';} else {$act5 = '0';}
$active6 = $_POST['active6'];
if ($active6 == '26') {$act6 = '1';} else {$act6 = '0';}
$active7 = $_POST['active7'];
if ($active7 == '27') {$act7 = '1';} else {$act7 = '0';}
$active8 = $_POST['active8'];
if ($active8 == '28') {$act8 = '1';} else {$act8 = '0';}
$active9 = $_POST['active9'];
if ($active9 == '29') {$act9 = '1';} else {$act9 = '0';}
$active10 = $_POST['active10'];
if ($active10 == '30') {$act10 = '1';} else {$act10 = '0';}
$active11 = $_POST['active11'];
if ($active11 == '31') {$act11 = '1';} else {$act11 = '0';}
$active12 = $_POST['active12'];
if ($active12 == '32') {$act12 = '1';} else {$act12 = '0';}
$active13 = $_POST['active13'];
if ($active13 == '33') {$act13 = '1';} else {$act13 = '0';}
$active14 = $_POST['active14'];
if ($active14 == '34') {$act14 = '1';} else {$act14 = '0';}
$active15 = $_POST['active15'];
if ($active15 == '35') {$act15 = '1';} else {$act15 = '0';}
$active16 = $_POST['active16'];
if ($active16 == '36') {$act16 = '1';} else {$act16 = '0';}
$active17 = $_POST['active17'];
if ($active17 == '37') {$act17 = '1';} else {$act17 = '0';}
$active18 = $_POST['active18'];
if ($active18 == '38') {$act18 = '1';} else {$act18 = '0';}


$sql_active1 = "UPDATE `brands` SET `active` = '$act1' WHERE `ids` = '21'";
$res_active1 = mysqli_query($con, $sql_active1); //or die(mysql_error());  

$sql_active2 = "UPDATE `brands` SET `active` = '$act2' WHERE `ids` = '22'";
$res_active2 = mysqli_query($con, $sql_active2); //or die(mysql_error());  

$sql_active3 = "UPDATE `brands` SET `active` = '$act3' WHERE `ids` = '23'";
$res_active3 = mysqli_query($con, $sql_active3); //or die(mysql_error());  

$sql_active4 = "UPDATE `brands` SET `active` = '$act4' WHERE `ids` = '24'";
$res_active4 = mysqli_query($con, $sql_active4); //or die(mysql_error());  

$sql_active5 = "UPDATE `brands` SET `active` = '$act5' WHERE `ids` = '25'";
$res_active5 = mysqli_query($con, $sql_active5); //or die(mysql_error());  

$sql_active6 = "UPDATE `brands` SET `active` = '$act6' WHERE `ids` = '26'";
$res_active6 = mysqli_query($con, $sql_active6); //or die(mysql_error());  

$sql_active7 = "UPDATE `brands` SET `active` = '$act7' WHERE `ids` = '27'";
$res_active7 = mysqli_query($con, $sql_active7); //or die(mysql_error());  

$sql_active8 = "UPDATE `brands` SET `active` = '$act8' WHERE `ids` = '28'";
$res_active8 = mysqli_query($con, $sql_active8); //or die(mysql_error());  

$sql_active9 = "UPDATE `brands` SET `active` = '$act9' WHERE `ids` = '29'";
$res_active9 = mysqli_query($con, $sql_active9); //or die(mysql_error());  

$sql_active10 = "UPDATE `brands` SET `active` = '$act10' WHERE `ids` = '30'";
$res_active10 = mysqli_query($con, $sql_active10); //or die(mysql_error());  

$sql_active11 = "UPDATE `brands` SET `active` = '$act11' WHERE `ids` = '31'";
$res_active11 = mysqli_query($con, $sql_active11); //or die(mysql_error());  

$sql_active12 = "UPDATE `brands` SET `active` = '$act12' WHERE `ids` = '32'";
$res_active12 = mysqli_query($con, $sql_active12); //or die(mysql_error());  

$sql_active13 = "UPDATE `brands` SET `active` = '$act13' WHERE `ids` = '33'";
$res_active13 = mysqli_query($con, $sql_active13); //or die(mysql_error());  

$sql_active14 = "UPDATE `brands` SET `active` = '$act14' WHERE `ids` = '34'";
$res_active14 = mysqli_query($con, $sql_active14); //or die(mysql_error());  

$sql_active15 = "UPDATE `brands` SET `active` = '$act15' WHERE `ids` = '35'";
$res_active15 = mysqli_query($con, $sql_active15); //or die(mysql_error());  

$sql_active16 = "UPDATE `brands` SET `active` = '$act16' WHERE `ids` = '36'";
$res_active16 = mysqli_query($con, $sql_active16); //or die(mysql_error());  

$sql_active17 = "UPDATE `brands` SET `active` = '$act17' WHERE `ids` = '37'";
$res_active17 = mysqli_query($con, $sql_active17); //or die(mysql_error());  

$sql_active18 = "UPDATE `brands` SET `active` = '$act18' WHERE `ids` = '38'";
$res_active18 = mysqli_query($con, $sql_active18); //or die(mysql_error());  

/* ============================================================= */ 

$sql_check1 = "UPDATE `brands` SET `priority` = '$ch1' WHERE `id` = '1'";
$res_check1 = mysqli_query($con, $sql_check1); //or die(mysql_error());   

$sql_check2 = "UPDATE `brands` SET `priority` = '$ch2' WHERE `id` = '2'";
$res_check2 = mysqli_query($con, $sql_check2); //or die(mysql_error());   

$sql_check3 = "UPDATE `brands` SET `priority` = '$ch3' WHERE `id` = '3'";
$res_check3 = mysqli_query($con, $sql_check3); //or die(mysql_error());   

$sql_check4 = "UPDATE `brands` SET `priority` = '$ch4' WHERE `id` = '4'";
$res_check4 = mysqli_query($con, $sql_check4); //or die(mysql_error());   

$sql_check5 = "UPDATE `brands` SET `priority` = '$ch5' WHERE `id` = '5'";
$res_check5 = mysqli_query($con, $sql_check5); //or die(mysql_error());   


$sql_check6 = "UPDATE `brands` SET `priority` = '$ch6' WHERE `id` = '6'";
$res_check6 = mysqli_query($con, $sql_check6); //or die(mysql_error());   

$sql_check7 = "UPDATE `brands` SET `priority` = '$ch7' WHERE `id` = '7'";
$res_check7 = mysqli_query($con, $sql_check7); //or die(mysql_error());   

$sql_check8 = "UPDATE `brands` SET `priority` = '$ch8' WHERE `id` = '8'";
$res_check8 = mysqli_query($con, $sql_check8); //or die(mysql_error());   

$sql_check9 = "UPDATE `brands` SET `priority` = '$ch9' WHERE `id` = '9'";
$res_check9 = mysqli_query($con, $sql_check9); //or die(mysql_error());   

$sql_check10 = "UPDATE `brands` SET `priority` = '$ch10' WHERE `id` = '10'";
$res_check10 = mysqli_query($con, $sql_check10); //or die(mysql_error());   

$sql_check11 = "UPDATE `brands` SET `priority` = '$ch11' WHERE `id` = '11'";
$res_check11 = mysqli_query($con, $sql_check11); //or die(mysql_error());   

$sql_check12 = "UPDATE `brands` SET `priority` = '$ch12' WHERE `id` = '12'";
$res_check12 = mysqli_query($con, $sql_check12); //or die(mysql_error());   

$sql_check13 = "UPDATE `brands` SET `priority` = '$ch13' WHERE `id` = '13'";
$res_check13 = mysqli_query($con, $sql_check13); //or die(mysql_error());   

$sql_check14 = "UPDATE `brands` SET `priority` = '$ch14' WHERE `id` = '14'";
$res_check14 = mysqli_query($con, $sql_check14); //or die(mysql_error());   

$sql_check15 = "UPDATE `brands` SET `priority` = '$ch15' WHERE `id` = '15'";
$res_check15 = mysqli_query($con, $sql_check15); //or die(mysql_error());   

$sql_check16 = "UPDATE `brands` SET `priority` = '$ch16' WHERE `id` = '16'";
$res_check16 = mysqli_query($con, $sql_check16); //or die(mysql_error());   

$sql_check17 = "UPDATE `brands` SET `priority` = '$ch17' WHERE `id` = '17'";
$res_check17 = mysqli_query($con, $sql_check17); //or die(mysql_error());   

$sql_check18 = "UPDATE `brands` SET `priority` = '$ch18' WHERE `id` = '18'";
$res_check18 = mysqli_query($con, $sql_check18); //or die(mysql_error());   



            

$sql_zone1 = "UPDATE `brands` SET `brand` = '$a1' WHERE `id` = '1'";
$res_zone1 = mysqli_query($con, $sql_zone1); //or die(mysql_error());   

$sql_zone2 = "UPDATE `brands` SET `brand` = '$a2' WHERE `id` = '2' ";
$res_zone2 = mysqli_query($con, $sql_zone2); //or die(mysql_error());   

$sql_zone3 = "UPDATE `brands` SET `brand` = '$a3' WHERE `id` = '3' ";
$res_zone3 = mysqli_query($con, $sql_zone3); //or die(mysql_error());

$sql_zone4 = "UPDATE `brands` SET `brand` = '$a4' WHERE `id` = '4' ";
$res_zone4 = mysqli_query($con, $sql_zone4); //or die(mysql_error());

$sql_zone5 = "UPDATE `brands` SET `brand` = '$a5' WHERE `id` = '5' ";
$res_zone5 = mysqli_query($con, $sql_zone5); //or die(mysql_error());

$sql_zone6 = "UPDATE `brands` SET `brand` = '$a6' WHERE `id` = '6' ";
$res_zone6 = mysqli_query($con, $sql_zone6); //or die(mysql_error());

$sql_zone7 = "UPDATE `brands` SET `brand` = '$a7' WHERE `id` = '7' ";
$res_zone7 = mysqli_query($con, $sql_zone7); //or die(mysql_error());

$sql_zone8 = "UPDATE `brands` SET `brand` = '$a8' WHERE `id` = '8' ";
$res_zone8 = mysqli_query($con, $sql_zone8); //or die(mysql_error());

$sql_zone9 = "UPDATE `brands` SET `brand` = '$a9' WHERE `id` = '9' ";
$res_zone9 = mysqli_query($con, $sql_zone9); //or die(mysql_error());

$sql_zone10 = "UPDATE `brands` SET `brand` = '$a10' WHERE `id` = '10' ";
$res_zone10 = mysqli_query($con, $sql_zone10); //or die(mysql_error());

$sql_zone11 = "UPDATE `brands` SET `brand` = '$a11' WHERE `id` = '11' ";
$res_zone11 = mysqli_query($con, $sql_zone11); //or die(mysql_error());

$sql_zone12 = "UPDATE `brands` SET `brand` = '$a12' WHERE `id` = '12' ";
$res_zone12 = mysqli_query($con, $sql_zone12); //or die(mysql_error());

$sql_zone13 = "UPDATE `brands` SET `brand` = '$a13' WHERE `id` = '13' ";
$res_zone13 = mysqli_query($con, $sql_zone13); //or die(mysql_error());

$sql_zone14 = "UPDATE `brands` SET `brand` = '$a14' WHERE `id` = '14' ";
$res_zone14 = mysqli_query($con, $sql_zone14); //or die(mysql_error());

$sql_zone15 = "UPDATE `brands` SET `brand` = '$a15' WHERE `id` = '15' ";
$res_zone15 = mysqli_query($con, $sql_zone15); //or die(mysql_error());

$sql_zone16 = "UPDATE `brands` SET `brand` = '$a16' WHERE `id` = '16' ";
$res_zone16 = mysqli_query($con, $sql_zone16); //or die(mysql_error());

$sql_zone17 = "UPDATE `brands` SET `brand` = '$a17' WHERE `id` = '17' ";
$res_zone17 = mysqli_query($con, $sql_zone17); //or die(mysql_error());

$sql_zone18 = "UPDATE `brands` SET `brand` = '$a18' WHERE `id` = '18' ";
$res_zone18 = mysqli_query($con, $sql_zone18); //or die(mysql_error());









//$sql_zone13 = "UPDATE `targets_zone1` SET mode= '$sum_special_visibility' WHERE user = 'userid'";
//$res_zone13 = mysqli_query($con, $sql_zone13); //or die(mysql_error());

$return['msg'] = _('Успешно зададен таргет!');		

echo json_encode($return); 


?>