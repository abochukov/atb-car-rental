<!DOCTYPE html>
<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="ajaxSaveState.js"></script>
	<title>state</title>
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
$query="SELECT DISTINCT Code FROM pharmacy WHERE City='БОЛЯРЦИ' ORDER BY Code ASC";
$result=mysqli_query($con, $query);

echo "Записване в таблица state, т.е. втората<br/>";
echo "<table border='1'>
	<tr>
		<th>Ids</th>
		<th>Id</th>
		<th>Name</th>
		<th>Code</th>
		<th>City</th>
		<th>код на града</th>
		<th>име на веригата /Code/</th>
	</tr>";

while ($row = mysqli_fetch_assoc($result)) {
	
	$id = $row['ids'];
	$name = $row['Name'];
	$code = $row['Code'];	
	$city = $row['City'];

	

	echo "<tr>
		<td>".$i++."</td>
		<td>".$id."</td>
		
		<td>$name</td>
		<td>".$code."</td>
		<td>".$city."</td>
		<td><input type='text' name='codepharm' class='codepharm'> </td>
		<td><div class='namee'>$code</div></td>
	</tr>";

}
echo "<input type='submit' id='add'>";
echo "</table>";
echo "<div id='message'></div>";




?>

</body>
</html>