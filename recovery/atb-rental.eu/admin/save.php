<?php
 
include '../connection.php';


$date   = $_POST['date'];
$text = $_POST['text'];

$today=date("Y-m-d");


$return['error'] = false;

while (true) {
		
	if (empty($_POST['date'])) {
        $return['error'] = true;
        $return['msg'] = 'Моля попълнете дата';
        break;
    }
	
	if (empty($_POST['text'])) {
    	$return['error'] = true;
    	$return['msg'] = _('Моля попълнете събитие');
    	break;
    }


	
	 break;		
	 
}


		if (!$return['error']) {
			
				
			$sql = "INSERT INTO `news`( `Date`, `Text`) VALUES ('$date','$text')";
			$res = mysql_query($sql); //or die(mysql_error());

			$return['msg'] = _('Попълнихте формата успешно!');

		}


echo json_encode($return); 


?>