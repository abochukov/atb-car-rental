<?php

$con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$con) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($con, 'cookbgco_sting');
mysqli_set_charset($con,"utf8");

$user = $_REQUEST['users'];
$zone = $_REQUEST['zone']; //zona - raft, kasa, vitrina
$mode = $_REQUEST['mode']; //material
$brand = $_REQUEST['brand']; //brand
$type = $_REQUEST['type']; //тип
$city = $_REQUEST['country']; //град
$state = $_REQUEST['state']; //код верига
$pharm = $_REQUEST['city']; //код верига
$from_date = $_REQUEST['from_date']; //дата OT
$to_date = $_REQUEST['to_date']; //дата ДО
$segment = $_REQUEST['segment']; //segment


//echo "user" . $user . "<br/>"; 
//echo "tip" . $tip . "<br/>"; 
//echo "city" . $city . "<br/>"; 
/*
if ($user == 0 && $zone == 0 && $mode == 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld ORDER BY date_upld";
	$result_f=mysqli_query($con, $find); 
}

*/

/*Ако няма нищо избрано*/
if ($user == 0 && $zone == 0 && $mode == 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment==0) {
	$find="SELECT * FROM form_upld ";
	$result_f=mysqli_query($con, $find); 
}


/*Ако има задаен само юзър*/
if ($user != 0 && $zone == 0 && $mode == 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE user = '$user'";
	$result_f=mysqli_query($con, $find); 
}

/*Ако има задаен само Бранд*/
if ($zone == 0 && $user == 0 && $mode == 0 && $brand != 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE brand = '$brand'";
	$result_f=mysqli_query($con, $find); 
} 

/*Ако има задаен само материал*/
if ($user == 0 && $zone == 0 && $mode != 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE mode = '$mode'";
	$result_f=mysqli_query($con, $find); 
}

/*Ако има задаен само зона*/
if ($zone != 0 && $user == 0 && $mode == 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE zone = '$zone'";
	$result_f=mysqli_query($con, $find); 
}

/*Ако има задаен само позициониране*/
if ($type != 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE type = '$type'";
	$result_f=mysqli_query($con, $find); 
}

/*Ако има задаен само град*/
if ($city != 0 && $type == 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city = '$city'";
	$result_f=mysqli_query($con, $find); 
}

/* Ако има задаен само дата*/
if ($from_date != 0 && $to_date != 0 && $city == 0 && $type == 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand == 0 && $state == 0 && $pharm == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE date_upld BETWEEN '$from_date' AND '$to_date' ";
	$result_f=mysqli_query($con, $find); 
}

/*Ако има задаен само сегмент*/
if ($user == 0 && $zone == 0 && $mode == 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment!=0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment'";
	$result_f=mysqli_query($con, $find); 
}

/* позиция и зона */
if ($type != 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE type = '$type' AND zone = '$zone' ";
	$result_f=mysqli_query($con, $find); 
}

/* позиция и юзър */
if ($type != 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE type = '$type' AND user='$user' ";
	$result_f=mysqli_query($con, $find); 
}

/* позиция и материал */
if ($type != 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE type = '$type' AND mode='$mode' ";
	$result_f=mysqli_query($con, $find); 
}

/* позиция и бранд */
if ($type != 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand != 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE type = '$type' AND brand='$brand' ";
	$result_f=mysqli_query($con, $find); 
}

/*Ако има задаен юзър и бранд*/
if ($zone == 0 && $user != 0 && $mode == 0 && $brand != 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE user = '$user' AND brand = '$brand'";
	$result_f=mysqli_query($con, $find); 
} 

/*Ако има задаен зона и бранд*/
if ($zone != 0 && $user == 0 && $mode == 0 && $brand != 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE zone = '$zone' AND brand = '$brand'";
	$result_f=mysqli_query($con, $find); 
} 

/* 10-ти критерии */

if ($segment !=0 && $user != 0 && $zone == 0 && $mode == 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user'";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user == 0 && $zone != 0 && $mode == 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND zone = '$zone'";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user == 0 && $zone == 0 && $mode != 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND mode = '$mode'";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user == 0 && $zone == 0 && $mode == 0 && $brand != 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND brand = '$brand'";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user == 0 && $zone == 0 && $mode == 0 && $brand == 0 && $type != 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND type = '$type'";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user == 0 && $zone == 0 && $mode == 0 && $brand == 0 && $type == 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND city = '$city'";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user == 0 && $zone == 0 && $mode == 0 && $brand == 0 && $type == 0 && $city != 0 && $state != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND city = '$city' AND state = '$state' ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user == 0 && $zone == 0 && $mode == 0 && $brand == 0 && $type == 0 && $city != 0 && $state != 0 && $pharm != 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND city = '$city' AND state = '$state' AND pharm = '$pharm'";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user == 0 && $zone == 0 && $mode == 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date != 0 && $to_date != 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment'AND (date_upld BETWEEN '$from_date' AND '$to_date')";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone != 0 && $mode == 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND zone = '$zone' ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone != 0 && $mode != 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND zone = '$zone' AND mode = '$mode' ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone != 0 && $mode != 0 && $brand != 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND zone = '$zone' AND mode = '$mode' AND brand = '$brand' ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone != 0 && $mode != 0 && $brand != 0 && $type != 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND zone = '$zone' AND mode = '$mode' AND brand = '$brand' AND type = '$type' ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone != 0 && $mode != 0 && $brand != 0 && $type != 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND zone = '$zone' AND mode = '$mode' AND brand = '$brand' AND type = '$type' AND city = '$city' ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone != 0 && $mode != 0 && $brand != 0 && $type != 0 && $city != 0 && $state != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND zone = '$zone' AND mode = '$mode' AND brand = '$brand' AND type = '$type' AND city = '$city' AND state = '$state' ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user == 0 && $zone != 0 && $mode != 0 && $brand != 0 && $type != 0 && $city != 0 && $state != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND zone = '$zone' AND mode = '$mode' AND brand = '$brand' AND type = '$type' AND city = '$city' AND state = '$state' ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone == 0 && $mode != 0 && $brand != 0 && $type != 0 && $city != 0 && $state != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND mode = '$mode' AND brand = '$brand' AND type = '$type' AND city = '$city' AND state = '$state' ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone != 0 && $mode == 0 && $brand != 0 && $type != 0 && $city != 0 && $state != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND zone = '$zone' AND brand = '$brand' AND type = '$type' AND city = '$city' AND state = '$state' ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone != 0 && $mode != 0 && $brand == 0 && $type != 0 && $city != 0 && $state != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND zone = '$zone' AND mode = '$mode' AND type = '$type' AND city = '$city' AND state = '$state' ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone != 0 && $mode != 0 && $brand != 0 && $type == 0 && $city != 0 && $state != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND zone = '$zone' AND mode = '$mode' AND brand = '$brand' AND city = '$city' AND state = '$state' ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user == 0 && $zone == 0 && $mode != 0 && $brand != 0 && $type == 0 && $city != 0 && $state != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND mode = '$mode' AND brand = '$brand' AND city = '$city' AND state = '$state' ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user == 0 && $zone == 0 && $mode == 0 && $brand != 0 && $type == 0 && $city != 0 && $state != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND brand = '$brand' AND city = '$city' AND state = '$state' ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone != 0 && $mode != 0 && $brand != 0 && $type == 0 && $city != 0 && $state != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND zone = '$zone' AND mode = '$mode' AND brand = '$brand' AND city = '$city' AND state = '$state' ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone != 0 && $mode == 0 && $brand == 0 && $type != 0 && $city != 0 && $state != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND zone = '$zone' AND type = '$type' AND city = '$city' AND state = '$state' ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone == 0 && $mode == 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date != 0 && $to_date != 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone != 0 && $mode == 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date != 0 && $to_date != 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND zone = '$zone' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone != 0 && $mode != 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date != 0 && $to_date != 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND zone = '$zone' AND mode = '$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone != 0 && $mode != 0 && $brand !== 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date != 0 && $to_date != 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND zone = '$zone' AND mode = '$mode' AND brand = '$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone != 0 && $mode != 0 && $brand !== 0 && $type != 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date != 0 && $to_date != 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND zone = '$zone' AND mode = '$mode' AND brand = '$brand' AND type = '$type' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($segment !=0 && $user != 0 && $zone != 0 && $mode != 0 && $brand !== 0 && $type != 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date != 0 && $to_date != 0) {
	$find="SELECT * FROM form_upld WHERE segment = '$segment' AND user = '$user' AND zone = '$zone' AND mode = '$mode' AND brand = '$brand' AND type = '$type' AND city = '$city' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}


/* край ан 10-ти */

/*9-ти критерий*/

if ($from_date != 0 && $to_date != 0 && $city != 0 && $type == 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand == 0 && $state == 0 && $pharm == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND (date_upld BETWEEN '$from_date' AND '$to_date')";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $type != 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand == 0 && $state == 0 && $pharm == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE type='$type' AND date_upld BETWEEN '$from_date' AND '$to_date' ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $type == 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand == 0 && $state == 0 && $pharm == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE zone='$zone' AND date_upld BETWEEN '$from_date' AND '$to_date' ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $type == 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand == 0 && $state == 0 && $pharm == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE user='$user' AND date_upld BETWEEN '$from_date' AND '$to_date' ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $type == 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand == 0 && $state == 0 && $pharm == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE mode='$mode' AND date_upld BETWEEN '$from_date' AND '$to_date' ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $type == 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand != 0 && $state == 0 && $pharm == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE brand='$brand' AND date_upld BETWEEN '$from_date' AND '$to_date' ";
	$result_f=mysqli_query($con, $find); 
}


/*========*/


if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm == 0 && $type == 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}


if ($from_date != 0 && $to_date != 0 && $city != 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND type='$type' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state == 0 && $pharm == 0 && $type == 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND zone='$zone' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state == 0 && $pharm == 0 && $type == 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND user='$user' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state == 0 && $pharm == 0 && $type == 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state == 0 && $pharm == 0 && $type == 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand != 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

/**/

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE type='$type' AND zone='$zone' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE type='$type' AND user='$user' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE type='$type' AND mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand != 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE type='$type' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}


if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type == 0 && $zone != 0 && $user != 0 && $mode == 0 && $brand == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE zone='$zone' AND user='$user' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type == 0 && $zone != 0 && $user == 0 && $mode != 0 && $brand == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE zone='$zone' AND mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type == 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand != 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE zone='$zone' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type == 0 && $zone == 0 && $user != 0 && $mode != 0 && $brand == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE user='$user' AND mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type == 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand != 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE user='$user' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

/*  */

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND type='$type' AND zone='$zone' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand == 0 && $segment==0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND type='$type' AND user='$user' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND type='$type' AND mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND type='$type' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE type='$type' AND zone='$zone' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone != 0 && $user != 0 && $mode == 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE type='$type' AND zone='$zone' AND user='$user' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone != 0 && $user == 0 && $mode != 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE type='$type' AND zone='$zone' AND mode='$mode' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

/**/
if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone == 0 && $user != 0 && $mode != 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE type='$type' AND user='$user' AND mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE type='$type' AND user='$user' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE type='$type' AND mode='$mode' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

/*daad*/
if ($from_date != 0 && $to_date != 0 && $city != 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone != 0 && $user != 0 && $mode == 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND type='$type' AND zone='$zone' AND user='$user' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone != 0 && $user == 0 && $mode != 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND type='$type' AND zone='$zone' AND mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND type='$type' AND zone='$zone' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone != 0 && $user != 0 && $mode != 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE type='$type' AND zone='$zone' AND user='$user' AND mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone == 0 && $user != 0 && $mode != 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE type='$type' AND user='$user' AND mode='$mode' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type == 0 && $zone != 0 && $user != 0 && $mode != 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE zone='$zone' AND user='$user' AND mode='$mode' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone != 0 && $user != 0 && $mode != 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND type='$type' AND zone='$zone' AND user='$user' AND mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city == 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone != 0 && $user != 0 && $mode != 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE type='$type' AND zone='$zone' AND user='$user' AND mode='$mode' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state == 0 && $pharm == 0 && $type != 0 && $zone != 0 && $user != 0 && $mode != 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND type='$type' AND zone='$zone' AND user='$user' AND mode='$mode' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

/*  */

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm == 0 && $type != 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND type='$type' AND zone='$zone' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm == 0 && $type != 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND type='$type' AND user='$user' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm == 0 && $type != 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND type='$type' AND zone='$zone' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm == 0 && $type != 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND type='$type' AND mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm == 0 && $type != 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND type='$type' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type != 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND type='$type' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type == 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND zone='$zone' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type == 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND user='$user' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type == 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type == 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE date_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm == 0 && $type == 0 && $zone != 0 && $user != 0 && $mode == 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND zone='$zone' AND user='$user' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm == 0 && $type == 0 && $zone != 0 && $user == 0 && $mode != 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND zone='$zone' AND mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm == 0 && $type == 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND zone='$zone' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm == 0 && $type == 0 && $zone == 0 && $user != 0 && $mode != 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND user='$user' AND mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm == 0 && $type == 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND user='$user' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm == 0 && $type == 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND mode='$mode' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

/* do tuk */

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type != 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND type='$type' AND zone='$zone' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type != 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND type='$type' AND user='$user' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type != 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND type='$type' AND mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type != 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND type='$type' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type != 0 && $zone != 0 && $user != 0 && $mode == 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND type='$type' AND zone='$zone' AND user='$user' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type != 0 && $zone != 0 && $user == 0 && $mode != 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND type='$type' AND zone='$zone' AND $mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type != 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND type='$type' AND zone='$zone' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type == 0 && $zone != 0 && $user != 0 && $mode != 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND zone='$zone' AND user='$user' AND mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type == 0 && $zone != 0 && $user != 0 && $mode == 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND zone='$zone' AND user='$user' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type != 0 && $zone != 0 && $user != 0 && $mode != 0 && $brand == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND type='$type' AND zone='$zone' AND user='$user' AND mode='$mode' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type == 0 && $zone != 0 && $user != 0 && $mode != 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND zone='$zone' AND user='$user' AND mode='$mode' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type != 0 && $zone != 0 && $user == 0 && $mode != 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND type='$type' AND zone='$zone' AND mode='$mode' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

if ($from_date != 0 && $to_date != 0 && $city != 0 && $state != 0 && $pharm != 0 && $type != 0 && $zone != 0 && $user != 0 && $mode != 0 && $brand != 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND state='$state' AND pharm='$pharm' AND type='$type' AND zone='$zone' AND user='$user' AND mode='$mode' AND brand='$brand' AND (date_upld BETWEEN '$from_date' AND '$to_date') ";
	$result_f=mysqli_query($con, $find); 
}

/**/

/* край на 9-ти */

/* 8-ми критерий */

if ($state != 0 && $city != 0 && $pharm !=0 && $type != 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND type='$type'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type == 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND zone='$zone'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type == 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND user='$user'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type == 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND mode='$mode'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type == 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand != 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}


if ($state != 0 && $city != 0 && $pharm !=0 && $type != 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND type='$type' AND zone='$zone'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type != 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND type='$type' AND user=''$user";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type != 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND type='$type' AND mode='$mode'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type != 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand != 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND type='$type' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type == 0 && $zone != 0 && $user != 0 && $mode == 0 && $brand == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND zone='$zone' AND user='$user'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type == 0 && $zone != 0 && $user == 0 && $mode != 0 && $brand == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND zone='$zone' AND mode='$mode'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type == 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand != 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND zone='$zone' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type == 0 && $zone == 0 && $user != 0 && $mode != 0 && $brand == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND user='$user' AND mode='$mode'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type == 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand != 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND user='$user' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type == 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand != 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND mode='$mode' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type != 0 && $zone != 0 && $user != 0 && $mode == 0 && $brand == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND type='$type' AND zone='$zone' AND user='$user'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type != 0 && $zone != 0 && $user == 0 && $mode != 0 && $brand == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND type='$type' AND zone='$zone' AND mode='$mode'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type != 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand != 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND type='$type' AND zone='$zone' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type == 0 && $zone != 0 && $user != 0 && $mode != 0 && $brand == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND zone='$zone' AND user='$user' AND mode='$mode'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type == 0 && $zone != 0 && $user != 0 && $mode == 0 && $brand != 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND zone='$zone' AND user='$user' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type == 0 && $zone == 0 && $user != 0 && $mode != 0 && $brand != 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND user='$user' AND mode='$mode' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}


if ($state != 0 && $city != 0 && $pharm !=0 && $type != 0 && $zone != 0 && $user != 0 && $mode != 0 && $brand == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND type='$type' AND zone='$zone' AND user='$user' AND mode='$mode'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type == 0 && $zone != 0 && $user != 0 && $mode != 0 && $brand != 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND zone='$zone' AND user='$user' AND mode='$mode' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type != 0 && $zone != 0 && $user == 0 && $mode != 0 && $brand != 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND type='$type' AND zone='$zone' AND mode='$mode' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);   
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type != 0 && $zone != 0 && $user != 0 && $mode == 0 && $brand != 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND type='$type' AND zone='$zone' AND user='$user' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $pharm !=0 && $type != 0 && $zone != 0 && $user != 0 && $mode != 0 && $brand != 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND pharm = '$pharm' AND type='$type' AND zone='$zone' AND user='$user' AND mode='$mode' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

/* край на 8-ми */

/* 7-ми критерий */

if ($state != 0 && $city != 0 && $type == 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type != 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND type='$type'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type == 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND zone='$zone' ";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type == 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND user='$user'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type == 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND mode='$mode'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type == 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

/**/

if ($state != 0 && $city != 0 && $type != 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND type='$type' AND zone='$zone'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type != 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND type='$type' AND user = '$user'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type != 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND type='$type' AND mode='$mode'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type != 0 && $zone == 0 && $user == 0 && $mode == 0 && $brand != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND type='$type' AND brand = '$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type == 0 && $zone != 0 && $user != 0 && $mode == 0 && $brand == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND zone='$zone' AND user='$user'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type == 0 && $zone != 0 && $user == 0 && $mode != 0 && $brand == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND zone='$zone' AND mode='$mode'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type == 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND zone='$zone' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type == 0 && $zone == 0 && $user != 0 && $mode != 0 && $brand == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND user='$user' AND mode='$mode'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type == 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND user='$user' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type == 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND mode='$mode' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

/* ====== */

if ($state != 0 && $city != 0 && $type != 0 && $zone != 0 && $user != 0 && $mode == 0 && $brand == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND type='$type' AND zone='$zone' AND user='$user'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type != 0 && $zone == 0 && $user != 0 && $mode != 0 && $brand == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND type='$type' AND user='$user' AND mode='$mode'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type != 0 && $zone != 0 && $user == 0 && $mode == 0 && $brand != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND type='$type' AND zone='$zone' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type != 0 && $zone == 0 && $user != 0 && $mode == 0 && $brand != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND type='$type' AND user='$user' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type != 0 && $zone == 0 && $user == 0 && $mode != 0 && $brand != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND type='$type' AND mode='$mode' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type != 0 && $zone == 0 && $user != 0 && $mode != 0 && $brand == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND type='$type' AND user='$user' AND mode='$mode'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type == 0 && $zone != 0 && $user != 0 && $mode != 0 && $brand == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND zone='$zone' AND user='$user' AND mode='$mode'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type == 0 && $zone == 0 && $user != 0 && $mode != 0 && $brand != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND user='$user' AND mode='$mode' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type == 0 && $zone != 0 && $user != 0 && $mode == 0 && $brand != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND zone='$zone' AND user='$user' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type == 0 && $zone != 0 && $user == 0 && $mode != 0 && $brand != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND zone='$zone' AND mode='$mode' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

/*  */

if ($state != 0 && $city != 0 && $type != 0 && $zone != 0 && $user != 0 && $mode != 0 && $brand == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND type='$type' AND zone='$zone' AND user='$user' AND mode='$mode";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type != 0 && $zone == 0 && $user != 0 && $mode != 0 && $brand != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND type='$type' AND user='$user' AND mode='$mode' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}



if ($state != 0 && $city != 0 && $type != 0 && $zone != 0 && $user == 0 && $mode != 0 && $brand != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND zone='$zone' AND type='$type' AND zone='$zone' AND mode='$mode' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

if ($state != 0 && $city != 0 && $type != 0 && $zone != 0 && $user != 0 && $mode != 0 && $brand != 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE city='$city' AND code = '$state' AND type='$type' AND zone='$zone' AND user='$user'  AND mode='$mode' AND brand='$brand'";
	$result_f=mysqli_query($con, $find);  
}

/* край на 7-ми */


/* 6-ти критерий - град  */

if ($zone != 0 && $user == 0 && $mode == 0 && $brand == 0 && $type == 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE zone='$zone' AND city = '$city'";
	$result_f=mysqli_query($con, $find);  
} 

if ($zone == 0 && $user != 0 && $mode == 0 && $brand == 0 && $type == 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE user='$user' AND city = '$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone == 0 && $user == 0 && $mode != 0 && $brand == 0 && $type == 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE mode='$mode' AND city = '$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone == 0 && $user == 0 && $mode == 0 && $brand != 0 && $type == 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE brand='$brand' AND city = '$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone == 0 && $user == 0 && $mode == 0 && $brand == 0 && $type != 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE type='$type' AND city = '$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone != 0 && $user != 0 && $mode == 0 && $brand == 0 && $type == 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE zone='$zone' AND user = '$user' AND city = '$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone != 0 && $user == 0 && $mode != 0 && $brand == 0 && $type == 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE zone='$zone' AND mdoe = '$mode' AND city = '$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone != 0 && $user == 0 && $mode == 0 && $brand != 0 && $type == 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE zone='$zone' AND brand = '$brand' AND city = '$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone != 0 && $user == 0 && $mode == 0 && $brand == 0 && $type != 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE zone='$zone' AND type = '$type' AND city = '$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone == 0 && $user != 0 && $mode != 0 && $brand == 0 && $type == 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE user='$user' AND mode = '$mode' AND city = '$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone == 0 && $user != 0 && $mode == 0 && $brand != 0 && $type == 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE user='$user' AND brand = '$brand' AND city = '$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone == 0 && $user != 0 && $mode == 0 && $brand == 0 && $type != 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE user='$user' AND type = '$type' AND city = '$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone == 0 && $user == 0 && $mode != 0 && $brand != 0 && $type == 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE mode='$mode' AND brand = '$brand' AND city = '$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone == 0 && $user == 0 && $mode != 0 && $brand == 0 && $type != 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE mode='$mode' AND type = '$type' AND city = '$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone == 0 && $user == 0 && $mode == 0 && $brand != 0 && $type != 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE brand='$brand' AND type = '$type' AND city = '$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone != 0 && $user != 0 && $mode != 0 && $brand != 0 && $type == 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE zone='$zone' AND user = '$user' AND mode='$mode' AND brand = '$brand' AND city='$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone != 0 && $user != 0 && $mode == 0 && $brand != 0 && $type != 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE zone='$zone' AND user = '$user' AND brand = '$brand' AND type='$type' AND city='$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone != 0 && $user != 0 && $mode != 0 && $brand == 0 && $type != 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE zone='$zone' AND user = '$user' AND mode = '$mode' AND type='$type' AND city='$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone != 0 && $user == 0 && $mode != 0 && $brand != 0 && $type != 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE zone='$zone' AND mode = '$mode' AND brand = '$brand' AND type='$type' AND city='$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone != 0 && $user != 0 && $mode == 0 && $brand != 0 && $type == 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE  zone='$zone' AND user = '$user' AND brand = '$brand' AND type='$type' AND city='$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone != 0 && $user == 0 && $mode != 0 && $brand == 0 && $type != 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE  zone='$zone' AND mode = '$mode'  AND type='$type' AND city='$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone != 0 && $user != 0 && $mode != 0 && $brand == 0 && $type == 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE  zone='$zone' AND user = '$user' AND mode = '$mode' AND city='$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone == 0 && $user != 0 && $mode != 0 && $brand == 0 && $type != 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE  user = '$user' AND mode = '$mode' AND type='$type' AND city='$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone == 0 && $user != 0 && $mode != 0 && $brand != 0 && $type == 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE user = '$user' AND mode='$mode' AND brand = '$brand' AND city='$city'";
	$result_f=mysqli_query($con, $find);  
}

if ($zone != 0 && $user != 0 && $mode != 0 && $brand != 0 && $type != 0 && $city != 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE zone='$zone' AND user = '$user' AND mode='$mode' AND brand = '$brand' AND type='$type' AND city='$city'";
	$result_f=mysqli_query($con, $find);  
}


/* =============== край на 6-ти критерий ======================== */


/* 5-ти критерий - позициониране  */


if ($zone != 0 && $user != 0 && $mode == 0 && $brand == 0 && $type != 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE type='$type' AND zone = '$zone' AND user = '$user'";
	$result_f=mysqli_query($con, $find);  
} 


if ($zone == 0 && $user != 0 && $mode != 0 && $brand == 0 && $type != 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE user = '$user' AND mode = '$mode' AND type='$type' ";
	$result_f=mysqli_query($con, $find); 
} 


if ($zone == 0 && $user != 0 && $mode == 0 && $brand != 0 && $type != 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE user = '$user' AND brand = '$brand' AND type = '$type'";
	$result_f=mysqli_query($con, $find); 
} 


if ($zone != 0 && $user == 0 && $mode != 0 && $brand == 0 && $type != 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE zone = '$zone' AND mode = '$mode' AND type = '$type'";
	$result_f=mysqli_query($con, $find); 
} 


if ($zone != 0 && $user == 0 && $mode == 0 && $brand != 0 && $type != 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE zone = '$zone' AND brand = '$brand' AND type='$type'";
	$result_f=mysqli_query($con, $find); 
} 


if ($zone == 0 && $user == 0 && $mode != 0 && $brand != 0 && $type != 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE mode = '$mode' AND brand = '$brand' AND type='$type'";
	$result_f=mysqli_query($con, $find); 
} 

/* ======================================= */

if ($zone == 0 && $user != 0 && $mode != 0 && $brand != 0 && $type != 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE $user='$user' AND mode = '$mode' AND brand = '$brand' AND type='$type'";
	$result_f=mysqli_query($con, $find); 
} 

if ($zone != 0 && $user == 0 && $mode != 0 && $brand != 0 && $type != 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE zone='$zone' AND mode = '$mode' AND brand = '$brand' AND type='$type'";
	$result_f=mysqli_query($con, $find); 
} 

if ($zone != 0 && $user != 0 && $mode == 0 && $brand != 0 && $type != 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE zone = '$zone' AND user = '$user' AND brand = '$brand' AND type='$type'";
	$result_f=mysqli_query($con, $find); 
} 

if ($zone != 0 && $user != 0 && $mode != 0 && $brand != 0 && $type != 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE zone = '$zone' AND user = '$user' AND mode = '$mode' AND brand = '$brand' AND type='$type'";
	$result_f=mysqli_query($con, $find); 
} 

/* =============== край на 5-ти критерий ======================== */

/*  */

/*Ако има задаен материал и бранд*/
if ($zone == 0 && $user == 0 && $mode != 0 && $brand != 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE mode = '$mode' AND brand = '$brand'";
	$result_f=mysqli_query($con, $find); 
} 

/*Ако има задаен материал и бранд и зона*/
if ($zone != 0 && $user == 0 && $mode != 0 && $brand != 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE mode = '$mode' AND brand = '$brand' AND zone = '$zone'";
	$result_f=mysqli_query($con, $find); 
} 

/*Ако има задаен юзър и бранд и зона*/
if ($zone != 0 && $user != 0 && $mode == 0 && $brand != 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE user = '$user' AND brand = '$brand' AND zone = '$zone'";
	$result_f=mysqli_query($con, $find); 
} 

/*Ако има задаен материал и бранд и юзър*/
if ($zone == 0 && $user != 0 && $mode != 0 && $brand != 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE user = '$user' AND brand = '$brand' AND mode = '$mode'";
	$result_f=mysqli_query($con, $find); 
} 

/* Ако има юзър и зона */
if  ($user != 0 && $zone != 0 && $mode == 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0) {
	$find="SELECT * FROM form_upld WHERE (user = '$user' AND zone = '$zone')";
	$result_f=mysqli_query($con, $find); 
}

/* зададен зона и материал */
if  ($user == 0 && $zone != 0 && $mode != 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE (mode = '$mode' AND zone = '$zone')";
	$result_f=mysqli_query($con, $find); 
}

/* зададен юзър и материал */
if  ($user != 0 && $zone == 0 && $mode != 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE (user = '$user' AND mode = '$mode')";
	$result_f=mysqli_query($con, $find); 
}

/* зададен юзър и зона и материал  */
if  ($user != 0 && $zone != 0 && $mode != 0 && $brand == 0 && $type == 0 && $city == 0 && $state == 0 && $pharm == 0 && $from_date == 0 && $to_date == 0 && $segment == 0 ) {
	$find="SELECT * FROM form_upld WHERE (user = '$user' AND zone = '$zone' AND mode = '$mode')";
	$result_f=mysqli_query($con, $find); 
}


 

$x = 0; //
$i = 0; // Use it to get number of
$rows = array();

$numRows = mysqli_num_rows($result_f);
if($numRows > 1){

while ($row=mysqli_fetch_array($result_f)) 

	
	$rows[] = $row;	
	foreach ($rows as $row){
	    if($x % 4 == 0) 
		   	 echo '<div class="row asd">';
	?>  

				    <div class="col-lg-3 col-md-3 col-sm-3" style="">
				    
				    <ul class='gallery'>
				    	<li class="img thumbnail">
				        	<img src="<?php echo $row['img']; ?>" >
				        	
				        </li>
				        <li class="name">
				        	
				        	<span>
				        		<?php
				        		$brand = $row['brand'];
				        		$userid = $row['user'];
				        		
				        		$sql = "SELECT * FROM brands WHERE id = '$brand' ";
				        		$res = mysqli_query($con, $sql);

				        		$sql_us = "SELECT * FROM users WHERE id = '$userid' ";
				        		$res_us = mysqli_query($con, $sql_us);
				        		
				        		echo "<ul class='labels'>";
					        		
					        		echo "<li>";
					        			while ($row=mysqli_fetch_array($res_us)) {  $name = $row['first_name']; 
					        				$arr = explode(" ", $name, 2);
										$first = $arr[0]; echo $first; }
					        		echo "</li>";
					        		echo "<li>";
					        			while ($row=mysqli_fetch_array($res)) { echo "<span>". $row['brand']."</span>"; }
					        		echo "</li>";
				        		echo "</ul>";
				        		?>
					        	<h4><strong><?php //echo $row['brand']; ?></strong></h4>
					        	<h4><?php echo $row['last_name']; ?></h4>
					        </span>
					        
				        </li>

				    </ul>
				    
				    </div>

				<?php
				    $x++;
				    if($x % 4 == 0) echo '</div><br/>';
				}	
		} else {
			echo "Няма намерени резултати";
			echo "<br/><br/><br/>";
		}

?>

	<link rel="stylesheet" type="text/css" href="css/pop_gallery.css">
	<script src="js/gallery.js" type="text/javascript"></script>