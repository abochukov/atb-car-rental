<?php
 
$con = mysqli_connect("localhost","bgprvhqk_vivach","Q#9L,!TK9x3O"); 

if (!$con) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($con, 'bgprvhqk_sting');
mysqli_set_charset($con,"utf8");

$namee   = $_POST['namee'];
$codepharm   = $_POST['codepharm'];
$codecity = $_POST['codecity'];

//$nm = implode("\n", $namee);
//$data = $nm;
       

$expance_array = implode("\n", $namee);
$codepharm_array = implode("\n", $codepharm);
/*
foreach ($namee as $nm) {
 	
 	$sql="INSERT INTO city2 (`city`)  VALUES ('$nm')";
    $result=mysqli_query($con, $sql);

    $return['msg'] = _('');
    
}
*/

foreach (array_combine($namee, $codepharm) as $name => $code) {
	$sql="INSERT INTO state (`countryid`, `statename`)  VALUES ('$code', '$name')";
    $result=mysqli_query($con, $sql);

    $return['msg'] = _('');
}

	$data = $codepharm;	
				

echo json_encode($data); 


?>