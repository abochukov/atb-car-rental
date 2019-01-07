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
$check6 = $_POST['check6'];
if ($check6 == '6') {$ch6 = '1';} else {$ch6 = '0';}
$check7 = $_POST['check7'];
if ($check7 == '7') {$ch7 = '1';} else {$ch7 = '0';}
$check8 = $_POST['check8'];
if ($check8 == '8') {$ch8 = '1';} else {$ch8 = '0';}
$check9 = $_POST['check9'];
if ($check9 == '28') {$ch28 = '1';} else {$ch28 = '0';}
$check10 = $_POST['check10'];
if ($check10 == '29') {$ch29 = '1';} else {$ch29 = '0';}
$check11 = $_POST['check11'];
if ($check11 == '30') {$ch30 = '1';} else {$ch30 = '0';}
$check12 = $_POST['check12'];
if ($check12 == '31') {$ch31 = '1';} else {$ch31 = '0';}
$check13 = $_POST['check13'];
if ($check13 == '32') {$ch32 = '1';} else {$ch32 = '0';}

$check14 = $_POST['check14'];
if ($check14 == '20') {$ch20 = '1';} else {$ch20 = '0';}
$check15 = $_POST['check15'];
if ($check15 == '21') {$ch21 = '1';} else {$ch21 = '0';}
$check16 = $_POST['check16'];
if ($check16 == '22') {$ch22 = '1';} else {$ch22 = '0';}
$check17 = $_POST['check17'];
if ($check17 == '33') {$ch33 = '1';} else {$ch33 = '0';}
$check18 = $_POST['check18'];
if ($check18 == '34') {$ch34 = '1';} else {$ch34 = '0';}
$check19 = $_POST['check19'];
if ($check19 == '35') {$ch35 = '1';} else {$ch35 = '0';}
$check20 = $_POST['check20'];
if ($check20 == '36') {$ch36 = '1';} else {$ch36 = '0';}
$check21 = $_POST['check21'];
if ($check21 == '37') {$ch37 = '1';} else {$ch37 = '0';}

$check22 = $_POST['check22'];
if ($check22 == '13') {$ch13 = '1';} else {$ch13 = '0';}
$check23 = $_POST['check23'];
if ($check23 == '14') {$ch14 = '1';} else {$ch14 = '0';}
$check24 = $_POST['check24'];
if ($check24 == '15') {$ch15 = '1';} else {$ch15 = '0';}
$check25 = $_POST['check25'];
if ($check25 == '16') {$ch16 = '1';} else {$ch16 = '0';}
$check26 = $_POST['check26'];
if ($check26 == '17') {$ch17 = '1';} else {$ch17 = '0';}
$check27 = $_POST['check27'];
if ($check27 == '18') {$ch18 = '1';} else {$ch18 = '0';}
$check28 = $_POST['check28'];
if ($check28 == '19') {$ch19 = '1';} else {$ch19 = '0';}
$check29 = $_POST['check29'];
if ($check29 == '39') {$ch39 = '1';} else {$ch39 = '0';}
$check30 = $_POST['check30'];
if ($check30 == '40') {$ch40 = '1';} else {$ch40 = '0';}
$check31 = $_POST['check31'];
if ($check31 == '41') {$ch41 = '1';} else {$ch41 = '0';}
$check32 = $_POST['check32'];
if ($check32 == '42') {$ch42 = '1';} else {$ch42 = '0';}
$check33 = $_POST['check33'];
if ($check33 == '43') {$ch43 = '1';} else {$ch43 = '0';}

$check34 = $_POST['check34'];
if ($check34 == '9') {$ch9 = '1';} else {$ch9 = '0';}
$check35 = $_POST['check35'];
if ($check35 == '10') {$ch10 = '1';} else {$ch10 = '0';}
$check36 = $_POST['check36'];
if ($check36 == '11') {$ch11 = '1';} else {$ch11 = '0';}
$check37 = $_POST['check37'];
if ($check37 == '12') {$ch12 = '1';} else {$ch12 = '0';}
$check38 = $_POST['check38'];
if ($check38 == '44') {$ch44 = '1';} else {$ch44 = '0';}
$check39 = $_POST['check39'];
if ($check39 == '45') {$ch45 = '1';} else {$ch45 = '0';}
$check40 = $_POST['check40'];
if ($check40 == '46') {$ch46 = '1';} else {$ch46 = '0';}
$check41 = $_POST['check41'];
if ($check41 == '47') {$ch47 = '1';} else {$ch47 = '0';}
$check42 = $_POST['check42'];
if ($check42 == '48') {$ch48 = '1';} else {$ch48 = '0';}

$check43 = $_POST['check43'];
if ($check43 == '23') {$ch23 = '1';} else {$ch23 = '0';}
$check44 = $_POST['check44'];
if ($check44 == '24') {$ch24 = '1';} else {$ch24 = '0';}
$check45 = $_POST['check45'];
if ($check45 == '25') {$ch25 = '1';} else {$ch25 = '0';}
$check46 = $_POST['check46'];
if ($check46 == '26') {$ch26 = '1';} else {$ch26 = '0';}
$check47 = $_POST['check47'];
if ($check47 == '27') {$ch27 = '1';} else {$ch27 = '0';}
$check48 = $_POST['check48'];
if ($check48 == '49') {$ch49 = '1';} else {$ch49 = '0';}
$check49 = $_POST['check49'];
if ($check49 == '50') {$ch50 = '1';} else {$ch450 = '0';}
$check50 = $_POST['check50'];
if ($check50 == '51') {$ch51 = '1';} else {$ch51 = '0';}
$check51 = $_POST['check51'];
if ($check51 == '52') {$ch52 = '1';} else {$ch52 = '0';}
$check52 = $_POST['check52'];
if ($check52 == '53') {$ch53 = '1';} else {$ch53 = '0';}


/* SPECIAL VISIBILITY */
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


/* РАФТ */
$b1 = $_POST['b1'];
$b2 = $_POST['b2'];
$b3 = $_POST['b3'];
$b4 = $_POST['b4'];
$b5 = $_POST['b5'];
$b6 = $_POST['b6'];
$b7 = $_POST['b7'];
$b8 = $_POST['b8'];


/* КАСА */
$c1 = $_POST['c1'];
$c2 = $_POST['c2'];
$c3 = $_POST['c3'];
$c4 = $_POST['c4'];
$c5 = $_POST['c5'];
$c6 = $_POST['c6'];
$c7 = $_POST['c7'];
$c8 = $_POST['c8'];
$c9 = $_POST['c9'];
$c10 = $_POST['c10'];
$c11 = $_POST['c11'];
$c12 = $_POST['c12'];


/* ВИТРИНА */
$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$d3 = $_POST['d3'];
$d4 = $_POST['d4'];
$d5 = $_POST['d5'];
$d6 = $_POST['d6'];
$d7 = $_POST['d7'];
$d8 = $_POST['d8'];
$d9 = $_POST['d9'];


/* СВОБОДЕН ДОСТЪП */
$e1 = $_POST['e1'];
$e2 = $_POST['e2'];
$e3 = $_POST['e3'];
$e4 = $_POST['e4'];
$e5 = $_POST['e5'];
$e6 = $_POST['e6'];
$e7 = $_POST['e7'];
$e8 = $_POST['e8'];
$e9 = $_POST['e9'];
$e10 = $_POST['e10'];



            
/* UPDATE active mode 1 */

$sql_check1 = "UPDATE `mode_new` SET `active` = '$ch1' WHERE `id` = '1'";
$res_check1 = mysqli_query($con, $sql_check1); //or die(mysql_error());   

$sql_check2 = "UPDATE `mode_new` SET `active` = '$ch2' WHERE `id` = '2'";
$res_check2 = mysqli_query($con, $sql_check2); //or die(mysql_error());   

$sql_check3 = "UPDATE `mode_new` SET `active` = '$ch3' WHERE `id` = '3'";
$res_check3 = mysqli_query($con, $sql_check3); //or die(mysql_error());   

$sql_check4 = "UPDATE `mode_new` SET `active` = '$ch4' WHERE `id` = '4'";
$res_check4 = mysqli_query($con, $sql_check4); //or die(mysql_error());   

$sql_check5 = "UPDATE `mode_new` SET `active` = '$ch5' WHERE `id` = '5'";
$res_check5 = mysqli_query($con, $sql_check5); //or die(mysql_error());   

$sql_check6 = "UPDATE `mode_new` SET `active` = '$ch6' WHERE `id` = '6'";
$res_check6 = mysqli_query($con, $sql_check6); //or die(mysql_error());   

$sql_check7 = "UPDATE `mode_new` SET `active` = '$ch7' WHERE `id` = '7'";
$res_check7 = mysqli_query($con, $sql_check7); //or die(mysql_error());   

$sql_check8 = "UPDATE `mode_new` SET `active` = '$ch8' WHERE `id` = '8'";
$res_check8 = mysqli_query($con, $sql_check8); //or die(mysql_error());   

$sql_check9 = "UPDATE `mode_new` SET `active` = '$ch28' WHERE `id` = '28'";
$res_check9 = mysqli_query($con, $sql_check9); //or die(mysql_error());   

$sql_check10 = "UPDATE `mode_new` SET `active` = '$ch29' WHERE `id` = '29'";
$res_check10 = mysqli_query($con, $sql_check10); //or die(mysql_error());   

$sql_check11 = "UPDATE `mode_new` SET `active` = '$ch30' WHERE `id` = '30'";
$res_check11 = mysqli_query($con, $sql_check11); //or die(mysql_error());   

$sql_check12 = "UPDATE `mode_new` SET `active` = '$ch31' WHERE `id` = '31'";
$res_check12 = mysqli_query($con, $sql_check12); //or die(mysql_error());   

$sql_check13 = "UPDATE `mode_new` SET `active` = '$ch32' WHERE `id` = '32'";
$res_check13 = mysqli_query($con, $sql_check13); //or die(mysql_error());   

/* active zone 2*/
$sql_check14 = "UPDATE `mode_new` SET `active` = '$ch20' WHERE `id` = '20'";
$res_check14 = mysqli_query($con, $sql_check14); //or die(mysql_error());   

$sql_check15 = "UPDATE `mode_new` SET `active` = '$ch21' WHERE `id` = '21'";
$res_check15 = mysqli_query($con, $sql_check15); //or die(mysql_error());   

$sql_check16 = "UPDATE `mode_new` SET `active` = '$ch22' WHERE `id` = '22'";
$res_check16 = mysqli_query($con, $sql_check16); //or die(mysql_error());   

$sql_check17 = "UPDATE `mode_new` SET `active` = '$ch33' WHERE `id` = '33'";
$res_check17 = mysqli_query($con, $sql_check17); //or die(mysql_error());   

$sql_check18 = "UPDATE `mode_new` SET `active` = '$ch34' WHERE `id` = '34'";
$res_check18 = mysqli_query($con, $sql_check18); //or die(mysql_error());   

$sql_check19 = "UPDATE `mode_new` SET `active` = '$ch35' WHERE `id` = '35'";
$res_check19 = mysqli_query($con, $sql_check19); //or die(mysql_error());   

$sql_check20 = "UPDATE `mode_new` SET `active` = '$ch36' WHERE `id` = '36'";
$res_check20 = mysqli_query($con, $sql_check20); //or die(mysql_error());   

$sql_check21 = "UPDATE `mode_new` SET `active` = '$ch37' WHERE `id` = '37'";
$res_check21 = mysqli_query($con, $sql_check21); //or die(mysql_error());   

/* active zone 3*/
$sql_check22 = "UPDATE `mode_new` SET `active` = '$ch13' WHERE `id` = '13'";
$res_check22 = mysqli_query($con, $sql_check22); //or die(mysql_error());   

$sql_check23 = "UPDATE `mode_new` SET `active` = '$ch14' WHERE `id` = '14'";
$res_check23 = mysqli_query($con, $sql_check23); //or die(mysql_error());   

$sql_check24 = "UPDATE `mode_new` SET `active` = '$ch15' WHERE `id` = '15'";
$res_check24 = mysqli_query($con, $sql_check24); //or die(mysql_error());   

$sql_check25 = "UPDATE `mode_new` SET `active` = '$ch16' WHERE `id` = '16'";
$res_check25 = mysqli_query($con, $sql_check25); //or die(mysql_error());   

$sql_check26 = "UPDATE `mode_new` SET `active` = '$ch17' WHERE `id` = '17'";
$res_check26 = mysqli_query($con, $sql_check26); //or die(mysql_error());   

$sql_check27 = "UPDATE `mode_new` SET `active` = '$ch18' WHERE `id` = '18'";
$res_check27 = mysqli_query($con, $sql_check27); //or die(mysql_error());   

$sql_check28 = "UPDATE `mode_new` SET `active` = '$ch19' WHERE `id` = '19'";
$res_check28 = mysqli_query($con, $sql_check28); //or die(mysql_error());   

$sql_check29 = "UPDATE `mode_new` SET `active` = '$ch39' WHERE `id` = '39'";
$res_check29 = mysqli_query($con, $sql_check29); //or die(mysql_error());   

$sql_check30 = "UPDATE `mode_new` SET `active` = '$ch40' WHERE `id` = '40'";
$res_check30 = mysqli_query($con, $sql_check30); //or die(mysql_error());   

$sql_check31 = "UPDATE `mode_new` SET `active` = '$ch41' WHERE `id` = '41'";
$res_check31 = mysqli_query($con, $sql_check31); //or die(mysql_error());   

$sql_check32 = "UPDATE `mode_new` SET `active` = '$ch42' WHERE `id` = '42'";
$res_check32 = mysqli_query($con, $sql_check32); //or die(mysql_error());  

$sql_check33 = "UPDATE `mode_new` SET `active` = '$ch43' WHERE `id` = '43'";
$res_check33 = mysqli_query($con, $sql_check33); //or die(mysql_error());   

/* active zone 4*/
$sql_check34 = "UPDATE `mode_new` SET `active` = '$ch9' WHERE `id` = '9'";
$res_check34 = mysqli_query($con, $sql_check34); //or die(mysql_error());   

$sql_check35 = "UPDATE `mode_new` SET `active` = '$ch10' WHERE `id` = '10'";
$res_check35 = mysqli_query($con, $sql_check35); //or die(mysql_error());   

$sql_check36 = "UPDATE `mode_new` SET `active` = '$ch11' WHERE `id` = '11'";
$res_check36 = mysqli_query($con, $sql_check36); //or die(mysql_error());   

$sql_check37 = "UPDATE `mode_new` SET `active` = '$ch12' WHERE `id` = '12'";
$res_check37 = mysqli_query($con, $sql_check37); //or die(mysql_error());   

$sql_check38 = "UPDATE `mode_new` SET `active` = '$ch44' WHERE `id` = '44'";
$res_check38 = mysqli_query($con, $sql_check38); //or die(mysql_error());   

$sql_check39 = "UPDATE `mode_new` SET `active` = '$ch45' WHERE `id` = '45'";
$res_check39 = mysqli_query($con, $sql_check39); //or die(mysql_error());   

$sql_check40 = "UPDATE `mode_new` SET `active` = '$ch46' WHERE `id` = '46'";
$res_check40 = mysqli_query($con, $sql_check40); //or die(mysql_error());   

$sql_check41 = "UPDATE `mode_new` SET `active` = '$ch47' WHERE `id` = '47'";
$res_check41 = mysqli_query($con, $sql_check41); //or die(mysql_error());   

$sql_check42 = "UPDATE `mode_new` SET `active` = '$ch48' WHERE `id` = '48'";
$res_check42 = mysqli_query($con, $sql_check42); //or die(mysql_error());   


/* active zone 5*/
$sql_check43 = "UPDATE `mode_new` SET `active` = '$ch23' WHERE `id` = '23'";
$res_check43 = mysqli_query($con, $sql_check43); //or die(mysql_error());   

$sql_check44 = "UPDATE `mode_new` SET `active` = '$ch24' WHERE `id` = '24'";
$res_check44 = mysqli_query($con, $sql_check44); //or die(mysql_error());   

$sql_check45 = "UPDATE `mode_new` SET `active` = '$ch25' WHERE `id` = '25'";
$res_check45 = mysqli_query($con, $sql_check45); //or die(mysql_error());   

$sql_check46 = "UPDATE `mode_new` SET `active` = '$ch26' WHERE `id` = '26'";
$res_check46 = mysqli_query($con, $sql_check46); //or die(mysql_error());   

$sql_check47 = "UPDATE `mode_new` SET `active` = '$ch27' WHERE `id` = '27'";
$res_check47 = mysqli_query($con, $sql_check47); //or die(mysql_error());   

$sql_check48 = "UPDATE `mode_new` SET `active` = '$ch49' WHERE `id` = '49'";
$res_check48 = mysqli_query($con, $sql_check48); //or die(mysql_error());   

$sql_check49 = "UPDATE `mode_new` SET `active` = '$ch50' WHERE `id` = '50'";
$res_check49 = mysqli_query($con, $sql_check49); //or die(mysql_error());   

$sql_check50 = "UPDATE `mode_new` SET `active` = '$ch51' WHERE `id` = '51'";
$res_check50 = mysqli_query($con, $sql_check50); //or die(mysql_error());   

$sql_check51 = "UPDATE `mode_new` SET `active` = '$ch52' WHERE `id` = '52'";
$res_check51 = mysqli_query($con, $sql_check51); //or die(mysql_error());   

$sql_check52 = "UPDATE `mode_new` SET `active` = '$ch53' WHERE `id` = '53'";
$res_check52 = mysqli_query($con, $sql_check52); //or die(mysql_error());   



/* UPDATE TARGETS ZONE 1 */
$sql_zone1 = "UPDATE `mode_new` SET `mode` = '$a1' WHERE `id` = '1'";
$res_zone1 = mysqli_query($con, $sql_zone1); //or die(mysql_error());   

$sql_zone2 = "UPDATE `mode_new` SET `mode` = '$a2' WHERE `id` = '2' ";
$res_zone2 = mysqli_query($con, $sql_zone2); //or die(mysql_error());   

$sql_zone3 = "UPDATE `mode_new` SET `mode` = '$a3' WHERE `id` = '3' ";
$res_zone3 = mysqli_query($con, $sql_zone3); //or die(mysql_error());

$sql_zone4 = "UPDATE `mode_new` SET `mode` = '$a4' WHERE `id` = '4' ";
$res_zone4 = mysqli_query($con, $sql_zone4); //or die(mysql_error());

$sql_zone5 = "UPDATE `mode_new` SET `mode` = '$a5' WHERE `id` = '5' ";
$res_zone5 = mysqli_query($con, $sql_zone5); //or die(mysql_error());

$sql_zone6 = "UPDATE `mode_new` SET `mode` = '$a6' WHERE `id` = '6' ";
$res_zone6 = mysqli_query($con, $sql_zone6); //or die(mysql_error());

$sql_zone7 = "UPDATE `mode_new` SET `mode` = '$a7' WHERE `id` = '7' ";
$res_zone7 = mysqli_query($con, $sql_zone7); //or die(mysql_error());

$sql_zone8 = "UPDATE `mode_new` SET `mode` = '$a8' WHERE `id` = '8' ";
$res_zone8 = mysqli_query($con, $sql_zone8); //or die(mysql_error());

$sql_zone9 = "UPDATE `mode_new` SET `mode` = '$a9' WHERE `id` = '28' ";
$res_zone9 = mysqli_query($con, $sql_zone9); //or die(mysql_error());

$sql_zone10 = "UPDATE `mode_new` SET `mode` = '$a10' WHERE `id` = '29' ";
$res_zone10 = mysqli_query($con, $sql_zone10); //or die(mysql_error());

$sql_zone11 = "UPDATE `mode_new` SET `mode` = '$a11' WHERE `id` = '30' ";
$res_zone11 = mysqli_query($con, $sql_zone11); //or die(mysql_error());

$sql_zone12 = "UPDATE `mode_new` SET `mode` = '$a12' WHERE `id` = '31' ";
$res_zone12 = mysqli_query($con, $sql_zone12); //or die(mysql_error());

$sql_zone13 = "UPDATE `mode_new` SET `mode` = '$a13' WHERE `id` = '32' ";
$res_zone13 = mysqli_query($con, $sql_zone13); //or die(mysql_error());






$sql_zone14 = "UPDATE `mode_new` SET `mode` = '$b1' WHERE `id` = '20' ";
$res_zone14 = mysqli_query($con, $sql_zone14); //or die(mysql_error());   

$sql_zone15 = "UPDATE `mode_new` SET `mode` = '$b2' WHERE `id` = '21' ";
$res_zone15 = mysqli_query($con, $sql_zone15); //or die(mysql_error());   

$sql_zone16 = "UPDATE `mode_new` SET `mode` = '$b3' WHERE `id` = '22' ";
$res_zone16 = mysqli_query($con, $sql_zone16); //or die(mysql_error());

$sql_zone17 = "UPDATE `mode_new` SET `mode` = '$b4' WHERE `id` = '33' ";
$res_zone17 = mysqli_query($con, $sql_zone17); //or die(mysql_error());

$sql_zone18 = "UPDATE `mode_new` SET `mode` = '$b5' WHERE `id` = '34' ";
$res_zone18 = mysqli_query($con, $sql_zone18); //or die(mysql_error());

$sql_zone19 = "UPDATE `mode_new` SET `mode` = '$b6' WHERE `id` = '35' ";
$res_zone19 = mysqli_query($con, $sql_zone19); //or die(mysql_error());

$sql_zone20 = "UPDATE `mode_new` SET `mode` = '$b7' WHERE `id` = '36' ";
$res_zone20 = mysqli_query($con, $sql_zone20); //or die(mysql_error());

$sql_zone21 = "UPDATE `mode_new` SET `mode` = '$b8' WHERE `id` = '37' ";
$res_zone21 = mysqli_query($con, $sql_zone21); //or die(mysql_error());





$sql_zone22 = "UPDATE `mode_new` SET `mode` = '$c1' WHERE `id` = '13' ";
$res_zone22 = mysqli_query($con, $sql_zone22); //or die(mysql_error());   

$sql_zone23 = "UPDATE `mode_new` SET `mode` = '$c2' WHERE `id` = '14' ";
$res_zone23 = mysqli_query($con, $sql_zone23); //or die(mysql_error());   

$sql_zone24 = "UPDATE `mode_new` SET `mode` = '$c3' WHERE `id` = '15' ";
$res_zone24 = mysqli_query($con, $sql_zone24); //or die(mysql_error());

$sql_zone25 = "UPDATE `mode_new` SET `mode` = '$c4' WHERE `id` = '16' ";
$res_zone25 = mysqli_query($con, $sql_zone25); //or die(mysql_error());

$sql_zone26 = "UPDATE `mode_new` SET `mode` = '$c5' WHERE `id` = '17' ";
$res_zone26 = mysqli_query($con, $sql_zone26); //or die(mysql_error());

$sql_zone27 = "UPDATE `mode_new` SET `mode` = '$c6' WHERE `id` = '18' ";
$res_zone27 = mysqli_query($con, $sql_zone27); //or die(mysql_error());

$sql_zone28 = "UPDATE `mode_new` SET `mode` = '$c7' WHERE `id` = '19' ";
$res_zone28 = mysqli_query($con, $sql_zone28); //or die(mysql_error());

$sql_zone29 = "UPDATE `mode_new` SET `mode` = '$c8' WHERE `id` = '39' ";
$res_zone29 = mysqli_query($con, $sql_zone29); //or die(mysql_error());

$sql_zone30 = "UPDATE `mode_new` SET `mode` = '$c9' WHERE `id` = '40' ";
$res_zone30 = mysqli_query($con, $sql_zone30); //or die(mysql_error());

$sql_zone31 = "UPDATE `mode_new` SET `mode` = '$c10' WHERE `id` = '41' ";
$res_zone31 = mysqli_query($con, $sql_zone31); //or die(mysql_error());

$sql_zone32 = "UPDATE `mode_new` SET `mode` = '$c11' WHERE `id` = '42' ";
$res_zone32 = mysqli_query($con, $sql_zone32); //or die(mysql_error());

$sql_zone33 = "UPDATE `mode_new` SET `mode` = '$c12' WHERE `id` = '43' ";
$res_zone33 = mysqli_query($con, $sql_zone33); //or die(mysql_error());




$sql_zone34 = "UPDATE `mode_new` SET `mode` = '$d1' WHERE `id` = '9' ";
$res_zone34 = mysqli_query($con, $sql_zone34); //or die(mysql_error());   

$sql_zone35 = "UPDATE `mode_new` SET `mode` = '$d2' WHERE `id` = '10' ";
$res_zone35 = mysqli_query($con, $sql_zone35); //or die(mysql_error());   

$sql_zone36 = "UPDATE `mode_new` SET `mode` = '$d3' WHERE `id` = '11' ";
$res_zone36 = mysqli_query($con, $sql_zone36); //or die(mysql_error());

$sql_zone37 = "UPDATE `mode_new` SET `mode` = '$d4' WHERE `id` = '12' ";
$res_zone37 = mysqli_query($con, $sql_zone37); //or die(mysql_error());

$sql_zone38 = "UPDATE `mode_new` SET `mode` = '$d5' WHERE `id` = '44' ";
$res_zone38 = mysqli_query($con, $sql_zone38); //or die(mysql_error());

$sql_zone39 = "UPDATE `mode_new` SET `mode` = '$d6' WHERE `id` = '45' ";
$res_zone39 = mysqli_query($con, $sql_zone39); //or die(mysql_error());

$sql_zone40 = "UPDATE `mode_new` SET `mode` = '$d7' WHERE `id` = '46' ";
$res_zone40 = mysqli_query($con, $sql_zone40); //or die(mysql_error());

$sql_zone41 = "UPDATE `mode_new` SET `mode` = '$d8' WHERE `id` = '47' ";
$res_zone41 = mysqli_query($con, $sql_zone41); //or die(mysql_error());

$sql_zone42 = "UPDATE `mode_new` SET `mode` = '$d9' WHERE `id` = '48' ";
$res_zone42 = mysqli_query($con, $sql_zone42); //or die(mysql_error());




$sql_zone43 = "UPDATE `mode_new` SET `mode` = '$e1' WHERE `id` = '23' ";
$res_zone43 = mysqli_query($con, $sql_zone43); //or die(mysql_error());   

$sql_zone44 = "UPDATE `mode_new` SET `mode` = '$e2' WHERE `id` = '24' ";
$res_zone44 = mysqli_query($con, $sql_zone44); //or die(mysql_error());   

$sql_zone45 = "UPDATE `mode_new` SET `mode` = '$e3' WHERE `id` = '25' ";
$res_zone45 = mysqli_query($con, $sql_zone45); //or die(mysql_error());

$sql_zone46 = "UPDATE `mode_new` SET `mode` = '$e4' WHERE `id` = '26' ";
$res_zone46 = mysqli_query($con, $sql_zone46); //or die(mysql_error());

$sql_zone47 = "UPDATE `mode_new` SET `mode` = '$e5' WHERE `id` = '27' ";
$res_zone47 = mysqli_query($con, $sql_zone47); //or die(mysql_error());

$sql_zone48 = "UPDATE `mode_new` SET `mode` = '$e6' WHERE `id` = '49' ";
$res_zone48 = mysqli_query($con, $sql_zone48); //or die(mysql_error());

$sql_zone49 = "UPDATE `mode_new` SET `mode` = '$e7' WHERE `id` = '50' ";
$res_zone49 = mysqli_query($con, $sql_zone49); //or die(mysql_error());

$sql_zone50 = "UPDATE `mode_new` SET `mode` = '$e8' WHERE `id` = '51' ";
$res_zone50 = mysqli_query($con, $sql_zone50); //or die(mysql_error());

$sql_zone51 = "UPDATE `mode_new` SET `mode` = '$e9' WHERE `id` = '52' ";
$res_zone51 = mysqli_query($con, $sql_zone51); //or die(mysql_error());

$sql_zone52 = "UPDATE `mode_new` SET `mode` = '$e10' WHERE `id` = '53' ";
$res_zone52 = mysqli_query($con, $sql_zone52); //or die(mysql_error());




//$sql_zone13 = "UPDATE `targets_zone1` SET mode= '$sum_special_visibility' WHERE user = 'userid'";
//$res_zone13 = mysqli_query($con, $sql_zone13); //or die(mysql_error());

$return['msg'] = _('Успешно зададен таргет!');		

echo json_encode($return); 


?>