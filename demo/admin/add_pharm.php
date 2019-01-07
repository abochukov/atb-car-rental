<?php
 
$conn = mysqli_connect("localhost","bgprvhqk_vivach","Q#9L,!TK9x3O"); 

if (!$conn) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($conn, 'bgprvhqk_sting');
mysqli_set_charset($conn,"utf8");

$r1 = $_REQUEST['r1'];
$r2 = $_REQUEST['r2'];


$select1 = $_REQUEST['country'];
$select2 = $_REQUEST['state'];
$pharm_name = $_REQUEST['pharm_name'];
$pharm_id = $_REQUEST['pharm_id'];
$pharm_segment = $_REQUEST['pharm_segment'];
$pharm_adres = $_REQUEST['pharm_adres'];
$pharm_clon = $_REQUEST['pharm_clon'];

$custom_city = $_REQUEST['custom_city'];
$custom_code = $_REQUEST['custom_code'];

$selectss = $_REQUEST['selectss'];
//echo $selectss . "<br/>";

/* ========= проверки за града ========= */
if (empty($select1)) {
	$city = $custom_city;
	//echo $city;
	/* Ако няма избран град, юзър го е изписал и тогава се прави Insert в базата. */
	$inserts_city = "INSERT INTO `country` (`country`) VALUES ('$city')";
	$results_city = mysqli_query($conn, $inserts_city);

} else {

	/* Ако града е избран от списък, тогава не се добавя отново, а се използва вече съществуващ */
	$sql_city = "SELECT * FROM country WHERE id = '$select1'";
    $res_city = mysqli_query($conn, $sql_city);
    while($row_city = mysqli_fetch_assoc($res_city)) {
    	$city = $row_city['country'];
    	//echo "Града е" .$city;
    }
}




/* ========= проверки за кода ========= */

/* Ако кода не е задаен от падащото меню, т.е. ако юзъра е въвел негов код се прави Insert на нов код.
	при нов код се разглежда случай когато е въведен и нов град и когато се използва съществуващ град */
/* в този IF юзъра е въвел нов код, ТРЯБВА ДА СЕ ПРОВЕРИ КОДА НА ГРАДА */
if ($select2 == 'Избери верига' OR $select2 == 'код верига') {

	$code = $custom_code;
	//echo $code;

	/* Кода не е избран, тогава проверяваме дали не е цъкнал  */

	/* ако е въвел нов град*/
	if (empty($select1)) {

		if(empty($selectss)) {
			$check_city_2 = "SELECT * FROM country WHERE country = '$city' ORDER BY id DESC LIMIT 1";
			$res_check_2 = mysqli_query($conn, $check_city_2);

			while($row_check_city2 = mysqli_fetch_assoc($res_check_2)) {
		    	$city_check2 = $row_check_city2['id'];
		    	//echo $city_check2;
		    }

		    $insert_code2 = "INSERT INTO `state` (`countryid`, `statename`) VALUES ('$city_check2', '$code')";
			$result_code2 = mysqli_query($conn, $insert_code2);
		} else {

			$check_city_3 = "SELECT * FROM country WHERE country = '$city' ORDER BY id DESC LIMIT 1";
			$res_check_3 = mysqli_query($conn, $check_city_3);

			while($row_check_city3 = mysqli_fetch_assoc($res_check_3)) {
		    	$city_check3 = $row_check_city3['id'];
		    	//echo $city_check2;
		    }
			$insert_code3 = "INSERT INTO `state` (`countryid`, `statename`) VALUES ('$city_check3', '$selectss')";
			$result_code3 = mysqli_query($conn, $insert_code3);
		}
		
		

	} else {
		/* ако е избрал от падащото меню*/
		/* проверяваме ид на града, който е избран от падащото меню */
		
		$check_city = "SELECT * FROM country WHERE country = '$city'";
		$res_check = mysqli_query($conn, $check_city);
		while($row_check_city = mysqli_fetch_assoc($res_check)) {
	    	$city_check = $row_check_city['id'];
	    	//echo $city_check;
	    }

	    $insert_code = "INSERT INTO `state` (`countryid`, `statename`) VALUES ('$city_check', '$code')";
		$result_code = mysqli_query($conn, $insert_code);
	}


} else {
	/* в тоз случай е зададен код от падащаото меню
	 */
	
	$sql_code = "SELECT * FROM state WHERE id = '$select2'";
    $res_code = mysqli_query($conn, $sql_code);
   
    while($row_code = mysqli_fetch_assoc($res_code)) {
    	$id = $row_code['id'];
    	$countryid = $row_code['countryid'];
    	$code = $row_code['statename'];
    	//echo $id . "<br/>";
    	//echo $countryid . "<br/>";
    	//echo $code . "<br/>";
    }
}

if(empty($pharm_id) OR empty($pharm_segment) OR empty($pharm_name)) {
	echo "моля попълнете всички полета";
}  else {
	
	$select_all = "SELECT * FROM state ORDER BY id DESC limit 1";
	$res_select_all = mysqli_query($conn, $select_all);

	while($row_select_all = mysqli_fetch_assoc($res_select_all)) {
	    	$get_id = $row_select_all['id'];
	    	$get_countryid = $row_select_all['countryid'];
	    	$get_statename = $row_select_all['statename'];
	    	
	    	/*
	    	echo "ID" . $get_id . "<br/>";
	    	echo "Country ID" . $get_countryid . "<br/>";
	    	echo "State Name" . $get_statename . "<br/><br/>";
			*/
	
	    	$insert_new_pharm = "INSERT INTO `city` (`pharmid`, `segment`, `city` , `stateid`, `countryid`) 
	    						VALUES ('$pharm_id', '$pharm_segment', '$pharm_name', '$get_id', '$get_countryid')";
	   		 $result_new_pharm = mysqli_query($conn, $insert_new_pharm);

	   		 //Да инсертне в таблица pharmacy

	   		 $insert_tbl_pharm = "INSERT INTO `pharmacy` (`ID`, `Address`, `Clon`, `Segment`) 
	    						VALUES ('$pharm_id', '$pharm_adres', '$pharm_clon', '$pharm_segment')";
	   		 $result_tbl_pharm = mysqli_query($conn, $insert_tbl_pharm);

	   		 


	    }

	    

/*
	echo "Града е&nbsp;".$city . "<br/>";
	echo "Кода е&nbsp;".$code . "<br/>";	
	echo "име на аптеката&nbsp;" . $pharm_name . "<br/>"; 
	echo "id аптеката&nbsp;" . $pharm_id . "<br/>"; 
	echo "сегмент на аптеката&nbsp;" . $pharm_segment . "<br/>"; 
*/
	
	/*

	$select_last_city = "SELECT * FROM country WHERE country = '$select1' ORDER BY id DESC LIMIT 1";
	$result_last_city = mysqli_query($conn, $select_last_city);
	while ($row_ls = mysqli_query_assoc($select_last_city)) {
		$last_id = $row_ls['id'];

		$insert_code = "INSERT INTO state ('countryid', 'statename') VALUES ('$last_id', '$code)";
		$result_code = mysqli_query($conn, $insert_code);
	}
	*/
}	

?>
<img class="image-preview" src="<?php echo $targetPath; ?>" class="upload-preview" /><br/>
				<?php 
					/*
					echo "id град&nbsp;" . $select1 . "<br/>"; 
					echo "id код верига&nbsp;" . $select2 . "<br/>"; 
					echo "<hr/>";
					echo "custom city&nbsp;" . $custom_city . "<br/>"; 
					echo "custom code&nbsp;" . $custom_code . "<br/>"; 
					echo "<hr/>";
					echo "име на аптеката&nbsp;" . $pharm_name . "<br/>"; 
					echo "id аптеката&nbsp;" . $pharm_id . "<br/>"; 
					echo "сегмент на аптеката&nbsp;" . $pharm_segment . "<br/>"; 
					*/
 //}					
				?>
 
            


