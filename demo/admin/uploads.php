<?php

$con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$con) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($con, 'cookbgco_sting');
mysqli_set_charset($con,"utf8");

		$select1 = $_REQUEST['country'];
		$select2 = $_REQUEST['state'];
		$select3 = $_REQUEST['city'];
		$brand = $_REQUEST['brand']; //brand
		$tip = $_REQUEST['tip']; //type
		$vid = $_REQUEST['vid']; //mode
		$position = $_REQUEST['position']; //zone
		$user_email = $_REQUEST['user_email'];

echo $select1;

	