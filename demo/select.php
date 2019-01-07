<?php
 
require_once("config.php");


$id = $_POST['id'];

$today=date("Y-m-d H:i:s");



$return['error'] = false;

while (true) {

	 break;			 
}

	if (!$return['error']) {
			
			$sql = "SELECT * FROM users WHERE id = '$id'";
			$res = mysqli_query( $conn, $sql );
			
			while ($row = mysqli_fetch_array($res)) {
				$id = $row['id'];
				$name = $row['first_name'];
			}
			
			$result1 = $id;
			$result2 = $name;
	
			$results = array();

			$sql2 = "SELECT * FROM targets WHERE userID = '$id'";
			$res2 = mysqli_query( $conn, $sql2 );
			
			while ($row2 = mysqli_fetch_array($res2)) {

				$hamsa[] = array(
					'trgtID' => $row2['trgtID'],
					'quantity' => $row2['quantity']
				);

			
		
				//$merged = array_merge($trgtID, $quantity);	

			}


	}
	
	//$successMessage = "Успешно въведохте своите продажби!";
	
	$data = array($result2, $hamsa);
	
				
	echo json_encode($data); 


?> 