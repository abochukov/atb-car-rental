<!DOCTYPE html>
<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="ajaxSave.js"></script>
	<title>City</title>
	<style>
		tr:nth-child(even) {background: #CCC}
		input {
			width: 50px;
			background: transparent;
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

$query="SELECT * FROM pharmacy WHERE City='БОЛЯРЦИ' ORDER BY Code ASC";
$result=mysqli_query($con, $query);

echo "Записване в таблица city, т.е. третата<br/>";
echo "<table border='1'>
	<tr>
		<th>Ids</th>
		<th>Id</th>
		<th>Name</th>
		<th>Code</th>
		<th>City</th>
		<th>код верига</th>
		<th>код град</th>
	</tr>";

while ($row = mysqli_fetch_assoc($result)) {
	
	$id = $row['ids'];
	$name = $row['Name'];
	$code = $row['Code'];	
	$city = $row['City'];

	echo "<tr>
		<td>".$i++."</td>
		<td>".$id."</td>
		
		<td><div class='namee'>$name</div></td>
		<td>".$code."</td>
		<td>".$city."</td>
		<td><input type='text' name='codepharm' class='codepharm'> </td>
		<td><input type='text' name='codecity' class='codecity'></td>
	</tr>";

}
echo "<input type='submit' id='add'>";
echo "</table>";
echo "<div id='message'></div>";


$query2="SELECT * FROM state WHERE countryid='440' ORDER BY id asc";
$result2=mysqli_query($con, $query2);


echo "<table border='1'>
	<tr>
		<th>Id</th>
		<th>Countryid</th>
		<th>statename</th>
	</tr>";

while ($row2 = mysqli_fetch_assoc($result2)) {
	$ids = $row2['id'];
	$countryid = $row2['countryid'];
	$statename = $row2['statename'];	
	
	echo "
	<tr>
		<td>$ids</td>
		<td>$countryid</td>
		<td>$statename</td>
	</tr>
	";
}

?>

</body>
</html>