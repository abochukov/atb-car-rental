<?php
 
$host="localhost"; // Host name 
$username="bgprvhqk_vivach"; // Mysql username 
$password="Q#9L,!TK9x3O"; // Mysql password 
$db_name="bgprvhqk_vivach"; // Database name 
$tbl_name="members"; // Table name // 

//Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); mysql_select_db("$db_name")or die("cannot select DB");

	mysql_query("SET NAMES CP1251"); 
	mysql_query("SET NAMES utf8");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<?php
	

			$id  = $_GET['id'];
			
			$sql = "DELETE FROM events WHERE id = '$id' ";
			$res = mysql_query($sql); //or die(mysql_error());

			echo "Събитието беше изтрито успешно";
			//$return['msg'] = _('Попълнихте формата успешно!');

//echo json_encode($return); 

?>
</body>
</html>