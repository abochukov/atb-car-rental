<?php
 
$con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$con) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($con, 'cookbgco_sting');
mysqli_set_charset($con,"utf8");

$userid = $_POST['userid'];
$today = date('Y-m-d');

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

//$sum_special_visibility = 0;
$sum_special_visibility = $a1 + $a2 + $a3 + $a4 + $a5 + $a6 + $a7 + $a8 + $a9 + $a10 + $a11 + $a12 + $a13;


/* РАФТ */
$b1 = $_POST['b1'];
$b2 = $_POST['b2'];
$b3 = $_POST['b3'];
$b4 = $_POST['b4'];
$b5 = $_POST['b5'];
$b6 = $_POST['b6'];
$b7 = $_POST['b7'];
$b8 = $_POST['b8'];

$sum_raft = $b1 + $b2 + $b3 + $b4 + $b5 + $b6 + $b7 + $b8;

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

$sum_kasa = $c1 + $c2 + $c3 + $c4 + $c5 + $c6 + $c7 + $c8 + $c9 + $c10 + $c11 + $c12;

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

$sum_vitrina = $d1 + $d2 + $d3 + $d4 + $d5 + $d6 + $d7 + $d8 + $d9;

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

$sum_svoboden_dostap = $e1 + $e2 + $e3 + $e4 + $e5 + $e6 + $e7 + $e8 + $e9 + $e10;


            
/* UPDATE TARGETS ZONE 1 */

$sql_zone1 = "UPDATE `targets_zone1` SET `a1` = '$a1' WHERE `user` = '$userid' AND `modeid` = '1' ";
$res_zone1 = mysqli_query($con, $sql_zone1); //or die(mysql_error());   

$sql_zone2 = "UPDATE `targets_zone1` SET `a1` = '$a2' WHERE `user` = '$userid' AND `modeid` = '2' ";
$res_zone2 = mysqli_query($con, $sql_zone2); //or die(mysql_error());   

$sql_zone3 = "UPDATE `targets_zone1` SET `a1` = '$a3' WHERE `user` = '$userid' AND `modeid` = '3' ";
$res_zone3 = mysqli_query($con, $sql_zone3); //or die(mysql_error());

$sql_zone4 = "UPDATE `targets_zone1` SET `a1` = '$a4' WHERE `user` = '$userid' AND `modeid` = '4' ";
$res_zone4 = mysqli_query($con, $sql_zone4); //or die(mysql_error());

$sql_zone5 = "UPDATE `targets_zone1` SET `a1` = '$a5' WHERE `user` = '$userid' AND `modeid` = '5' ";
$res_zone5 = mysqli_query($con, $sql_zone5); //or die(mysql_error());

$sql_zone6 = "UPDATE `targets_zone1` SET `a1` = '$a6' WHERE `user` = '$userid' AND `modeid` = '6' ";
$res_zone6 = mysqli_query($con, $sql_zone6); //or die(mysql_error());

$sql_zone7 = "UPDATE `targets_zone1` SET `a1` = '$a7' WHERE `user` = '$userid' AND `modeid` = '7' ";
$res_zone7 = mysqli_query($con, $sql_zone7); //or die(mysql_error());

$sql_zone8 = "UPDATE `targets_zone1` SET `a1` = '$a8' WHERE `user` = '$userid' AND `modeid` = '8' ";
$res_zone8 = mysqli_query($con, $sql_zone8); //or die(mysql_error());

$sql_zone9 = "UPDATE `targets_zone1` SET `a1` = '$a9' WHERE `user` = '$userid' AND `modeid` = '28' ";
$res_zone9 = mysqli_query($con, $sql_zone9); //or die(mysql_error());

$sql_zone10 = "UPDATE `targets_zone1` SET `a1` = '$a10' WHERE `user` = '$userid' AND `modeid` = '29' ";
$res_zone10 = mysqli_query($con, $sql_zone10); //or die(mysql_error());

$sql_zone11 = "UPDATE `targets_zone1` SET `a1` = '$a11' WHERE `user` = '$userid' AND `modeid` = '30' ";
$res_zone11 = mysqli_query($con, $sql_zone11); //or die(mysql_error());

$sql_zone12 = "UPDATE `targets_zone1` SET `a1` = '$a12' WHERE `user` = '$userid' AND `modeid` = '31' ";
$res_zone12 = mysqli_query($con, $sql_zone12); //or die(mysql_error());

$sql_zone13 = "UPDATE `targets_zone1` SET `a1` = '$a13' WHERE `user` = '$userid' AND `modeid` = '32' ";
$res_zone13 = mysqli_query($con, $sql_zone13); //or die(mysql_error());

$sql_zone60 = "UPDATE `targets_zone1` SET `a1` = '$sum_special_visibility' WHERE `user` = '$userid' AND `modeid` = '0' ";
$res_zone60 = mysqli_query($con, $sql_zone60); //or die(mysql_error());


/* UPDATE TARGETS ZONE 2 */

$sql_zone14 = "UPDATE `targets_zone2` SET `a1` = '$b1' WHERE `user` = '$userid' AND `modeid` = '20' ";
$res_zone14 = mysqli_query($con, $sql_zone14); //or die(mysql_error());   

$sql_zone15 = "UPDATE `targets_zone2` SET `a1` = '$b2' WHERE `user` = '$userid' AND `modeid` = '21' ";
$res_zone15 = mysqli_query($con, $sql_zone15); //or die(mysql_error());   

$sql_zone16 = "UPDATE `targets_zone2` SET `a1` = '$b3' WHERE `user` = '$userid' AND `modeid` = '22' ";
$res_zone16 = mysqli_query($con, $sql_zone16); //or die(mysql_error());

$sql_zone17 = "UPDATE `targets_zone2` SET `a1` = '$b4' WHERE `user` = '$userid' AND `modeid` = '33' ";
$res_zone17 = mysqli_query($con, $sql_zone17); //or die(mysql_error());

$sql_zone18 = "UPDATE `targets_zone2` SET `a1` = '$b5' WHERE `user` = '$userid' AND `modeid` = '34' ";
$res_zone18 = mysqli_query($con, $sql_zone18); //or die(mysql_error());

$sql_zone19 = "UPDATE `targets_zone2` SET `a1` = '$b6' WHERE `user` = '$userid' AND `modeid` = '35' ";
$res_zone19 = mysqli_query($con, $sql_zone19); //or die(mysql_error());

$sql_zone20 = "UPDATE `targets_zone2` SET `a1` = '$b7' WHERE `user` = '$userid' AND `modeid` = '36' ";
$res_zone20 = mysqli_query($con, $sql_zone20); //or die(mysql_error());

$sql_zone21 = "UPDATE `targets_zone2` SET `a1` = '$b8' WHERE `user` = '$userid' AND `modeid` = '37' ";
$res_zone21 = mysqli_query($con, $sql_zone21); //or die(mysql_error());

$sql_zone70 = "UPDATE `targets_zone2` SET `a1` = '$sum_raft' WHERE `user` = '$userid' AND `modeid` = '0' ";
$res_zone70 = mysqli_query($con, $sql_zone70); //or die(mysql_error());

/* UPDATE TARGETS ZONE 3 */

$sql_zone22 = "UPDATE `targets_zone3` SET `a1` = '$c1' WHERE `user` = '$userid' AND `modeid` = '13' ";
$res_zone22 = mysqli_query($con, $sql_zone22); //or die(mysql_error());   

$sql_zone23 = "UPDATE `targets_zone3` SET `a1` = '$c2' WHERE `user` = '$userid' AND `modeid` = '14' ";
$res_zone23 = mysqli_query($con, $sql_zone23); //or die(mysql_error());   

$sql_zone24 = "UPDATE `targets_zone3` SET `a1` = '$c3' WHERE `user` = '$userid' AND `modeid` = '15' ";
$res_zone24 = mysqli_query($con, $sql_zone24); //or die(mysql_error());

$sql_zone25 = "UPDATE `targets_zone3` SET `a1` = '$c4' WHERE `user` = '$userid' AND `modeid` = '16' ";
$res_zone25 = mysqli_query($con, $sql_zone25); //or die(mysql_error());

$sql_zone26 = "UPDATE `targets_zone3` SET `a1` = '$c5' WHERE `user` = '$userid' AND `modeid` = '17' ";
$res_zone26 = mysqli_query($con, $sql_zone26); //or die(mysql_error());

$sql_zone27 = "UPDATE `targets_zone3` SET `a1` = '$c6' WHERE `user` = '$userid' AND `modeid` = '18' ";
$res_zone27 = mysqli_query($con, $sql_zone27); //or die(mysql_error());

$sql_zone28 = "UPDATE `targets_zone3` SET `a1` = '$c7' WHERE `user` = '$userid' AND `modeid` = '19' ";
$res_zone28 = mysqli_query($con, $sql_zone28); //or die(mysql_error());

$sql_zone29 = "UPDATE `targets_zone3` SET `a1` = '$c8' WHERE `user` = '$userid' AND `modeid` = '39' ";
$res_zone29 = mysqli_query($con, $sql_zone29); //or die(mysql_error());

$sql_zone30 = "UPDATE `targets_zone3` SET `a1` = '$c9' WHERE `user` = '$userid' AND `modeid` = '40' ";
$res_zone30 = mysqli_query($con, $sql_zone30); //or die(mysql_error());

$sql_zone31 = "UPDATE `targets_zone3` SET `a1` = '$c10' WHERE `user` = '$userid' AND `modeid` = '41' ";
$res_zone31 = mysqli_query($con, $sql_zone31); //or die(mysql_error());

$sql_zone32 = "UPDATE `targets_zone3` SET `a1` = '$c11' WHERE `user` = '$userid' AND `modeid` = '42' ";
$res_zone32 = mysqli_query($con, $sql_zone32); //or die(mysql_error());

$sql_zone33 = "UPDATE `targets_zone3` SET `a1` = '$c12' WHERE `user` = '$userid' AND `modeid` = '43' ";
$res_zone33 = mysqli_query($con, $sql_zone33); //or die(mysql_error());

$sql_zone80 = "UPDATE `targets_zone3` SET `a1` = '$sum_kasa' WHERE `user` = '$userid' AND `modeid` = '0' ";
$res_zone80 = mysqli_query($con, $sql_zone80); //or die(mysql_error());

/* UPDATE TARGETS ZONE 4 */

$sql_zone34 = "UPDATE `targets_zone4` SET `a1` = '$d1' WHERE `user` = '$userid' AND `modeid` = '9' ";
$res_zone34 = mysqli_query($con, $sql_zone34); //or die(mysql_error());   

$sql_zone35 = "UPDATE `targets_zone4` SET `a1` = '$d2' WHERE `user` = '$userid' AND `modeid` = '10' ";
$res_zone35 = mysqli_query($con, $sql_zone35); //or die(mysql_error());   

$sql_zone36 = "UPDATE `targets_zone4` SET `a1` = '$d3' WHERE `user` = '$userid' AND `modeid` = '11' ";
$res_zone36 = mysqli_query($con, $sql_zone36); //or die(mysql_error());

$sql_zone37 = "UPDATE `targets_zone4` SET `a1` = '$d4' WHERE `user` = '$userid' AND `modeid` = '12' ";
$res_zone37 = mysqli_query($con, $sql_zone37); //or die(mysql_error());

$sql_zone38 = "UPDATE `targets_zone4` SET `a1` = '$d5' WHERE `user` = '$userid' AND `modeid` = '44' ";
$res_zone38 = mysqli_query($con, $sql_zone38); //or die(mysql_error());

$sql_zone39 = "UPDATE `targets_zone4` SET `a1` = '$d6' WHERE `user` = '$userid' AND `modeid` = '45' ";
$res_zone39 = mysqli_query($con, $sql_zone39); //or die(mysql_error());

$sql_zone40 = "UPDATE `targets_zone4` SET `a1` = '$d7' WHERE `user` = '$userid' AND `modeid` = '46' ";
$res_zone40 = mysqli_query($con, $sql_zone40); //or die(mysql_error());

$sql_zone41 = "UPDATE `targets_zone4` SET `a1` = '$d8' WHERE `user` = '$userid' AND `modeid` = '47' ";
$res_zone41 = mysqli_query($con, $sql_zone41); //or die(mysql_error());

$sql_zone42 = "UPDATE `targets_zone4` SET `a1` = '$d9' WHERE `user` = '$userid' AND `modeid` = '48' ";
$res_zone42 = mysqli_query($con, $sql_zone42); //or die(mysql_error());

$sql_zone90 = "UPDATE `targets_zone4` SET `a1` = '$sum_vitrina' WHERE `user` = '$userid' AND `modeid` = '0' ";
$res_zone90 = mysqli_query($con, $sql_zone90); //or die(mysql_error());

/* UPDATE TARGETS ZONE 5 */

$sql_zone43 = "UPDATE `targets_zone5` SET `a1` = '$e1' WHERE `user` = '$userid' AND `modeid` = '23' ";
$res_zone43 = mysqli_query($con, $sql_zone43); //or die(mysql_error());   

$sql_zone44 = "UPDATE `targets_zone5` SET `a1` = '$e2' WHERE `user` = '$userid' AND `modeid` = '24' ";
$res_zone44 = mysqli_query($con, $sql_zone44); //or die(mysql_error());   

$sql_zone45 = "UPDATE `targets_zone5` SET `a1` = '$e3' WHERE `user` = '$userid' AND `modeid` = '25' ";
$res_zone45 = mysqli_query($con, $sql_zone45); //or die(mysql_error());

$sql_zone46 = "UPDATE `targets_zone5` SET `a1` = '$e4' WHERE `user` = '$userid' AND `modeid` = '26' ";
$res_zone46 = mysqli_query($con, $sql_zone46); //or die(mysql_error());

$sql_zone47 = "UPDATE `targets_zone5` SET `a1` = '$e5' WHERE `user` = '$userid' AND `modeid` = '27' ";
$res_zone47 = mysqli_query($con, $sql_zone47); //or die(mysql_error());

$sql_zone48 = "UPDATE `targets_zone5` SET `a1` = '$e6' WHERE `user` = '$userid' AND `modeid` = '49' ";
$res_zone48 = mysqli_query($con, $sql_zone48); //or die(mysql_error());

$sql_zone49 = "UPDATE `targets_zone5` SET `a1` = '$e7' WHERE `user` = '$userid' AND `modeid` = '50' ";
$res_zone49 = mysqli_query($con, $sql_zone49); //or die(mysql_error());

$sql_zone50 = "UPDATE `targets_zone5` SET `a1` = '$e8' WHERE `user` = '$userid' AND `modeid` = '51' ";
$res_zone50 = mysqli_query($con, $sql_zone50); //or die(mysql_error());

$sql_zone51 = "UPDATE `targets_zone5` SET `a1` = '$e9' WHERE `user` = '$userid' AND `modeid` = '52' ";
$res_zone51 = mysqli_query($con, $sql_zone51); //or die(mysql_error());

$sql_zone52 = "UPDATE `targets_zone5` SET `a1` = '$e10' WHERE `user` = '$userid' AND `modeid` = '53' ";
$res_zone52 = mysqli_query($con, $sql_zone52); //or die(mysql_error());

$sql_zone100 = "UPDATE `targets_zone5` SET `a1` = '$sum_svoboden_dostap' WHERE `user` = '$userid' AND `modeid` = '0' ";
$res_zone100 = mysqli_query($con, $sql_zone100); //or die(mysql_error());



//$sql_zone13 = "UPDATE `targets_zone1` SET a1= '$sum_special_visibility' WHERE user = 'userid'";
//$res_zone13 = mysqli_query($con, $sql_zone13); //or die(mysql_error());

$return['msg'] = _('Успешно зададен таргет!');		

echo json_encode($return); 


?>