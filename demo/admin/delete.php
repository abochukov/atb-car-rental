<?php
 
$con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$con) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($con, 'cookbgco_sting');
mysqli_set_charset($con,"utf8");

$id = $_POST['id'];


$today=date("Y-m-d H:i:s");

$return['error'] = false;




		if (!$return['error']) {
			
				
			//$sql = "UPDATE my_town_pulse SET  `approve` = '2' WHERE ID= '$id' ";
			$sql = "DELETE FROM users WHERE id = '$id'";
			$res = mysqli_query($con, $sql); //or die(mysql_error());
			/*
				$qu = "SELECT * FROM disney_users WHERE ID = '$id' ";
				$result = mysql_query($qu);
				while ($row = mysql_fetch_array($result)) 
				{
					$cifra = $row['votes'];
					$cifra++;
				$sql_votes = "UPDATE disney_users SET  `votes` = '$cifra' WHERE ID= '$id' ";
				$res_votes = mysql_query($sql_votes); //or die(mysql_error());
		
				}

			$return['msg'] = _('Попълнихте формата успешно!');
			*/
		}

		

echo json_encode($return); 


?>