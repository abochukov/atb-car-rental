<!DOCTYPE html>
<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="ajaxSaveState.js"></script>
	<title>segment</title>
	<style>
		tr:nth-child(even) {background: #CCC}
		input {
			width: 150px;
		}
	</style>
</head>
<body>

<?php

$con = mysqli_connect("localhost","bgprvhqk_vivach","Q#9L,!TK9x3O");

if (!$con) {
    die('Could not connect: ' . mysql_error());
}


mysqli_select_db($con, 'bgprvhqk_sting');
mysqli_set_charset($con,"utf8");

//$query="SELECT * FROM pharmacy WHERE City='Правец' ORDER BY Code ASC";
$query="SELECT ID, Name, Segment FROM pharmacy ";
$result=mysqli_query($con, $query);

echo "Записване в таблица state, т.е. втората<br/>";
echo "<table border='1'>
	<tr>
		
		<th>Id</th>
		<th>Name</th>
		<th>Segment</th>
	</tr>";

while ($row = mysqli_fetch_assoc($result)) {
	
	$id = $row['ID'];
	$name = $row['Name'];
	$segment = $row['Segment'];	

	echo "<tr>
		
		<td>".$id."</td>
		
		<td>$name</td>
		<td>".$segment."</td>
		
	</tr>";

}
echo "<input type='submit' id='add'>";
echo "</table>";
echo "<div id='message'></div>";




?>

</body>
</html>