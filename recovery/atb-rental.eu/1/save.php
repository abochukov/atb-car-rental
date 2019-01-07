<?php
 session_start();
	// Db connection configuration
	include '../connection.php';


$start   = $_POST['start'];
$end = $_POST['end'];


$today=date("Y-m-d");


$return['error'] = false;



		if (!$return['error']) {
		
		
			$sql = "SELECT * FROM Astra WHERE ID='1' ";
			$res = mysql_query($sql); //or die(mysql_error());
			
			while ($row=mysql_fetch_array($res)) {
					$vzemane = $row['Start'];
					$vrashtane = $row['End'];
					
					if (($start >= $vzemane && $start <= $vrashtane) || ($end <= $vrashtane && $end >= $vzemane)) {
						
						$return['msg'] = 'busy';
						
					} else {
					
						$return['msg'] = 'free';
						
					}
					
					//$return['msg'] = $end;
					
			}

			

		}


echo json_encode($return); 


?>