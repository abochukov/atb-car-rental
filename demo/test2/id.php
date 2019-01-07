<!DOCTYPE html>
<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="ajaxSaveID.js"></script>
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
$query="SELECT * FROM pharmacy  ORDER BY Name ASC";
$result=mysqli_query($con, $query);

$query2="SELECT * FROM city  ORDER BY city ASC";
$result2=mysqli_query($con, $query2);

$query3="SELECT DISTINCT (
			pharmacy.name
			), pharmacy.ID, city_new.city,city_new.stateid,city_new.countryid
			FROM pharmacy
			INNER JOIN city_new ON pharmacy.name = city_new.city
			ORDER BY city_new.id ASC ";
$result3=mysqli_query($con, $query3);
/*
SELECT DISTINCT (
pharmacy.name
), pharmacy.ID, city_new.city
FROM pharmacy
INNER JOIN city_new ON pharmacy.name = city_new.city

SELECT DISTINCT (
pharmacy.name
), pharmacy.ID, city_new.city
FROM pharmacy
INNER JOIN city_new ON pharmacy.name = city_new.city
ORDER BY pharmacy.name ASC 
*/

echo "Записване в таблица state, т.е. втората<br/>";
echo "<table border='1'>
	<tr>
		
		<th>Id</th>
		<th>Name</th>
		<th>stateid</th>
		<th>countryid</th>
		
	</tr>";

while ($row3 = mysqli_fetch_assoc($result3)) {
		
	$id = $row3['ID'];
	$name = $row3['name'];
	$city = $row3['city'];
	$stateid = $row3['stateid'];
	$countryid = $row3['countryid'];

		

	echo "<tr>
		<td><div class='codepharm'>$id</div> </td>
		<td><div class='namee'>$name</div></td>
		<td><div class='namee'>$stateid</div></td>
		<td><div class='namee'>$countryid</div></td>
	</tr>";


	
}
echo "<input type='submit' id='add'>";
echo "</table>";
echo "<div id='message'></div>";




?>

</body>
</html>