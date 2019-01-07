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
/*
foreach (array_combine($namee, $codepharm) as $name => $code) {
	$sql="INSERT INTO city_old (`city`, `stateid`)  VALUES ('$name', '$code')";
    $result=mysqli_query($con, $sql);

    $return['msg'] = _('');
}
*/



foreach (array_keys($codecity) as $key) {
    $name = $namee[$key];
    $code = $codepharm[$key];
    $citys = $codecity[$key];

    $sql = "INSERT INTO city (`city`, `stateid`, `countryid`) VALUES ('$name', '$code',' $citys')";
    $result=mysqli_query($con, $sql);
}

	$data = $name;	
				

echo json_encode($data); 


?>