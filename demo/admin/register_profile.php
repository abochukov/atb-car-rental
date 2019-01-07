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
$role = $_POST['check'];

$today=date("Y-m-d");


$options = array("cost"=>4);
$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        

$return['error'] = false;

while (true) {
		
	if (empty($_POST['first_name'])) {
        $return['error'] = true;
        $return['msg'] = 'Моля, попълнете име';
        break;
    }

    if (($role != 1) AND ($role != 2)) {
        $return['error'] = true;
        $return['msg'] = 'Моля, изберете типа на профила';
        break;
    }


	
	 break;		 
}

if (!$return['error']) {


	$sql_check = "SELECT * FROM users WHERE email = '$email'";
	$res_check = mysqli_query($con, $sql_check);
	$numRows = mysqli_num_rows($res_check);

	if($numRows  == 1){
		$return['msg'] = _('Този email вече е регистриран!');
	} else {


		$sql = "insert into users (date, first_name, last_name,email, password, role) value('".$today."','".$first_name."', '".$last_name."', '".$email."','".$hashPassword."','".$role."')";

		$result = mysqli_query($con, $sql);


		$select_id = "SELECT * FROM users ORDER BY id ASC";
		$result_id = mysqli_query($con, $select_id);

		while ($row=mysqli_fetch_assoc($result_id)) {
			$id=$row['id'];
		}

		/* SET TARGET 0 FOR ZONE 1 FOR THE NEWEST USER */

		$sql_zone1 = "INSERT INTO `targets_zone1` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '1', '1', '0') ";
		$res_zone1 = mysqli_query($con, $sql_zone1); //or die(mysql_error());

		$sql_zone2 = "INSERT INTO `targets_zone1` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '1', '2', '0') ";
		$res_zone2 = mysqli_query($con, $sql_zone2); //or die(mysql_error());

		$sql_zone3 = "INSERT INTO `targets_zone1` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '1', '3', '0') ";
		$res_zone3 = mysqli_query($con, $sql_zone3); //or die(mysql_error());

		$sql_zone4 = "INSERT INTO `targets_zone1` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '1', '4', '0') ";
		$res_zone4 = mysqli_query($con, $sql_zone4); //or die(mysql_error());

		$sql_zone5 = "INSERT INTO `targets_zone1` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '1', '5', '0') ";
		$res_zone5 = mysqli_query($con, $sql_zone5); //or die(mysql_error());

		$sql_zone6 = "INSERT INTO `targets_zone1` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '1', '6', '0') ";
		$res_zone6 = mysqli_query($con, $sql_zone6); //or die(mysql_error());

		$sql_zone7 = "INSERT INTO `targets_zone1` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '1', '7', '0') ";
		$res_zone7 = mysqli_query($con, $sql_zone7); //or die(mysql_error());

		$sql_zone8 = "INSERT INTO `targets_zone1` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '1', '8', '0') ";
		$res_zone8 = mysqli_query($con, $sql_zone8); //or die(mysql_error());

		$sql_zone9 = "INSERT INTO `targets_zone1` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '1', '28', '0') ";
		$res_zone9 = mysqli_query($con, $sql_zone9); //or die(mysql_error());

		$sql_zone10 = "INSERT INTO `targets_zone1` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '1', '29', '0') ";
		$res_zone10 = mysqli_query($con, $sql_zone10); //or die(mysql_error());

		$sql_zone11 = "INSERT INTO `targets_zone1` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '1', '30', '0') ";
		$res_zone11 = mysqli_query($con, $sql_zone11); //or die(mysql_error());

		$sql_zone12 = "INSERT INTO `targets_zone1` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '1', '31', '0') ";
		$res_zone12 = mysqli_query($con, $sql_zone12); //or die(mysql_error());

		$sql_zone13 = "INSERT INTO `targets_zone1` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '1', '32', '0') ";
		$res_zone13 = mysqli_query($con, $sql_zone13); //or die(mysql_error());

		/* създава празен запис за сумата от всички таргети */
		$sql_zone60 = "INSERT INTO `targets_zone1` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '1', '0', '0') ";
		$res_zone60 = mysqli_query($con, $sql_zone60); //or die(mysql_error());

		/* SET TARGET 0 FOR ZONE 2 FOR THE NEWEST USER */

		$sql_zone14 = "INSERT INTO `targets_zone2` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '2', '20', '0') ";
		$res_zone14 = mysqli_query($con, $sql_zone14); //or die(mysql_error());

		$sql_zone15 = "INSERT INTO `targets_zone2` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '2', '21', '0') ";
		$res_zone15 = mysqli_query($con, $sql_zone15); //or die(mysql_error());

		$sql_zone16 = "INSERT INTO `targets_zone2` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '2', '22', '0') ";
		$res_zone16 = mysqli_query($con, $sql_zone16); //or die(mysql_error());

		$sql_zone17 = "INSERT INTO `targets_zone2` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '2', '33', '0') ";
		$res_zone17 = mysqli_query($con, $sql_zone17); //or die(mysql_error());

		$sql_zone18 = "INSERT INTO `targets_zone2` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '2', '34', '0') ";
		$res_zone18 = mysqli_query($con, $sql_zone18); //or die(mysql_error());

		$sql_zone19 = "INSERT INTO `targets_zone2` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '2', '35', '0') ";
		$res_zone19 = mysqli_query($con, $sql_zone19); //or die(mysql_error());

		$sql_zone20 = "INSERT INTO `targets_zone2` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '2', '36', '0') ";
		$res_zone20 = mysqli_query($con, $sql_zone20); //or die(mysql_error());

		$sql_zone21 = "INSERT INTO `targets_zone2` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '2', '37', '0') ";
		$res_zone21 = mysqli_query($con, $sql_zone21); //or die(mysql_error());

		/* създава празен запис за сумата от всички таргети */
		$sql_zone70 = "INSERT INTO `targets_zone2` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '2', '0', '0') ";
		$res_zone70 = mysqli_query($con, $sql_zone70); //or die(mysql_error());

		/* SET TARGET 0 FOR ZONE 3 FOR THE NEWEST USER */

		$sql_zone22 = "INSERT INTO `targets_zone3` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '3', '13', '0') ";
		$res_zone22 = mysqli_query($con, $sql_zone22); //or die(mysql_error());

		$sql_zone23 = "INSERT INTO `targets_zone3` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '3', '14', '0') ";
		$res_zone23 = mysqli_query($con, $sql_zone23); //or die(mysql_error());

		$sql_zone24 = "INSERT INTO `targets_zone3` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '3', '15', '0') ";
		$res_zone24 = mysqli_query($con, $sql_zone24); //or die(mysql_error());

		$sql_zone25 = "INSERT INTO `targets_zone3` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '3', '16', '0') ";
		$res_zone25 = mysqli_query($con, $sql_zone25); //or die(mysql_error());

		$sql_zone26 = "INSERT INTO `targets_zone3` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '3', '17', '0') ";
		$res_zone26 = mysqli_query($con, $sql_zone26); //or die(mysql_error());

		$sql_zone27 = "INSERT INTO `targets_zone3` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '3', '18', '0') ";
		$res_zone27 = mysqli_query($con, $sql_zone27); //or die(mysql_error());

		$sql_zone28 = "INSERT INTO `targets_zone3` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '3', '19', '0') ";
		$res_zone28 = mysqli_query($con, $sql_zone28); //or die(mysql_error());

		$sql_zone29 = "INSERT INTO `targets_zone3` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '3', '39', '0') ";
		$res_zone29 = mysqli_query($con, $sql_zone29); //or die(mysql_error());

		$sql_zone30 = "INSERT INTO `targets_zone3` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '3', '40', '0') ";
		$res_zone30 = mysqli_query($con, $sql_zone30); //or die(mysql_error());

		$sql_zone31 = "INSERT INTO `targets_zone3` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '3', '41', '0') ";
		$res_zone31 = mysqli_query($con, $sql_zone31); //or die(mysql_error());

		$sql_zone32 = "INSERT INTO `targets_zone3` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '3', '42', '0') ";
		$res_zone32 = mysqli_query($con, $sql_zone32); //or die(mysql_error());

		$sql_zone33 = "INSERT INTO `targets_zone3` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '3', '43', '0') ";
		$res_zone33 = mysqli_query($con, $sql_zone33); //or die(mysql_error());

		/* създава празен запис за сумата от всички таргети */
		$sql_zone80 = "INSERT INTO `targets_zone3` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '3', '0', '0') ";
		$res_zone80 = mysqli_query($con, $sql_zone80); //or die(mysql_error());

		/* SET TARGET 0 FOR ZONE 4 FOR THE NEWEST USER */

		$sql_zone34 = "INSERT INTO `targets_zone4` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '4', '9', '0') ";
		$res_zone34 = mysqli_query($con, $sql_zone34); //or die(mysql_error());

		$sql_zone35 = "INSERT INTO `targets_zone4` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '4', '10', '0') ";
		$res_zone35 = mysqli_query($con, $sql_zone35); //or die(mysql_error());

		$sql_zone36 = "INSERT INTO `targets_zone4` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '4', '11', '0') ";
		$res_zone36 = mysqli_query($con, $sql_zone36); //or die(mysql_error());

		$sql_zone37 = "INSERT INTO `targets_zone4` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '4', '12', '0') ";
		$res_zone37 = mysqli_query($con, $sql_zone37); //or die(mysql_error());

		$sql_zone38 = "INSERT INTO `targets_zone4` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '4', '44', '0') ";
		$res_zone38 = mysqli_query($con, $sql_zone38); //or die(mysql_error());

		$sql_zone39 = "INSERT INTO `targets_zone4` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '4', '45', '0') ";
		$res_zone39 = mysqli_query($con, $sql_zone39); //or die(mysql_error());

		$sql_zone40 = "INSERT INTO `targets_zone4` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '4', '46', '0') ";
		$res_zone40 = mysqli_query($con, $sql_zone40); //or die(mysql_error());

		$sql_zone41 = "INSERT INTO `targets_zone4` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '4', '47', '0') ";
		$res_zone41 = mysqli_query($con, $sql_zone41); //or die(mysql_error());

		$sql_zone42 = "INSERT INTO `targets_zone4` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '4', '48', '0') ";
		$res_zone42 = mysqli_query($con, $sql_zone42); //or die(mysql_error());

		/* създава празен запис за сумата от всички таргети */
		$sql_zone90 = "INSERT INTO `targets_zone4` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '4', '0', '0') ";
		$res_zone90 = mysqli_query($con, $sql_zone90); //or die(mysql_error());

		/* SET TARGET 0 FOR ZONE 5 FOR THE NEWEST USER */

		$sql_zone43 = "INSERT INTO `targets_zone5` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '5', '23', '0') ";
		$res_zone43 = mysqli_query($con, $sql_zone43); //or die(mysql_error());

		$sql_zone44 = "INSERT INTO `targets_zone5` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '5', '24', '0') ";
		$res_zone44 = mysqli_query($con, $sql_zone44); //or die(mysql_error());

		$sql_zone45 = "INSERT INTO `targets_zone5` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '5', '25', '0') ";
		$res_zone45 = mysqli_query($con, $sql_zone45); //or die(mysql_error());

		$sql_zone46 = "INSERT INTO `targets_zone5` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '5', '26', '0') ";
		$res_zone46 = mysqli_query($con, $sql_zone46); //or die(mysql_error());

		$sql_zone47 = "INSERT INTO `targets_zone5` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '5', '27', '0') ";
		$res_zone47 = mysqli_query($con, $sql_zone47); //or die(mysql_error());

		$sql_zone48 = "INSERT INTO `targets_zone5` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '5', '49', '0') ";
		$res_zone48 = mysqli_query($con, $sql_zone48); //or die(mysql_error());

		$sql_zone49 = "INSERT INTO `targets_zone5` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '5', '50', '0') ";
		$res_zone49 = mysqli_query($con, $sql_zone49); //or die(mysql_error());

		$sql_zone50 = "INSERT INTO `targets_zone5` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '5', '51', '0') ";
		$res_zone50 = mysqli_query($con, $sql_zone50); //or die(mysql_error());

		$sql_zone51 = "INSERT INTO `targets_zone5` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '5', '52', '0') ";
		$res_zone51 = mysqli_query($con, $sql_zone51); //or die(mysql_error());

		$sql_zone52 = "INSERT INTO `targets_zone5` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '5', '53', '0') ";
		$res_zone52 = mysqli_query($con, $sql_zone52); //or die(mysql_error());

		/* създава празен запис за сумата от всички таргети */
		$sql_zone100 = "INSERT INTO `targets_zone5` (`date`, `user`, `zoneid`, `modeid`, `a1`) VALUES ('$today', '$id', '5', '0', '0') ";
		$res_zone100 = mysqli_query($con, $sql_zone100); //or die(mysql_error());

		/* SET 0 raiting_zone_1  */
		$sql_raiting_1 = "INSERT INTO `raiting_zone_1` ( `userid`, `percent`) VALUES ('$id', '0') ";
		$res_raiting_1 = mysqli_query($con, $sql_raiting_1); //or die(mysql_error());

		/* SET 0 raiting_zone_2  */
		$sql_raiting_2 = "INSERT INTO `raiting_zone_2` ( `userid`, `percent`) VALUES ('$id', '0') ";
		$res_raiting_2 = mysqli_query($con, $sql_raiting_2); //or die(mysql_error());

		/* SET 0 raiting_zone_3  */
		$sql_raiting_3 = "INSERT INTO `raiting_zone_3` ( `userid`, `percent`) VALUES ('$id', '0') ";
		$res_raiting_3 = mysqli_query($con, $sql_raiting_3); //or die(mysql_error());

		/* SET 0 raiting_zone_4  */
		$sql_raiting_4 = "INSERT INTO `raiting_zone_4` ( `userid`, `percent`) VALUES ('$id', '0') ";
		$res_raiting_4 = mysqli_query($con, $sql_raiting_4); //or die(mysql_error());

		/* SET 0 raiting_zone_5  */
		$sql_raiting_5 = "INSERT INTO `raiting_zone_5` ( `userid`, `percent`) VALUES ('$id', '0') ";
		$res_raiting_5 = mysqli_query($con, $sql_raiting_5); //or die(mysql_error());

		/* SET 0 raiting_zone_all  */
		$sql_raiting_all = "INSERT INTO `raiting_zone_all` ( `userid`, `percent`) VALUES ('$id', '0') ";
		$res_raiting_all = mysqli_query($con, $sql_raiting_all); //or die(mysql_error());


		$return['msg'] = _(' Успешно създадохте нов профил. Натиснете F5, за да актуализирате списъка. ');
	}
}
   
echo json_encode($return); 


?>