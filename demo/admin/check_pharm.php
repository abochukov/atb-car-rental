<?php

$conn = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$conn) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($conn, 'cookbgco_sting');
mysqli_set_charset($conn,"utf8");

			$select1 = $_REQUEST['country'];
			$select2 = $_REQUEST['state'];
			$select3 = $_REQUEST['city'];
				
			//echo $select1 . "<br/>";
			//echo $select2 . "<br/>";
			//echo $select3 . "<br/>";

			$today = date('Y-m-d');


			$sql = "SELECT 
					c.id AS nomer,
					c.city AS apteka, 
					c.countryid, 
					c.stateid, 
					c.segment AS segment, 
					c.pharmid AS pharmid, 
					s.statename AS cod, 
					g.country AS grad, 
					p.Address AS adres, 
					p.Clon AS clon
					FROM city AS c
					INNER JOIN state AS s ON c.stateid = s.id
					INNER JOIN country AS g ON c.countryid = g.id
					INNER JOIN pharmacy AS p ON c.pharmid = p.ID
					WHERE c.id = '$select3'";

			$res = mysqli_query($conn, $sql);

			echo "<table border='1'>";
			echo "<tr><th>град</th><th>код</th><th>аптека</th><th>ID</th><th>сегмент</th><th>адрес</th><th>клон</th><th>редактирай</th></tr>";

			while ($row = mysqli_fetch_array($res)) {
					$id_ph = $row['nomer'];
					$grad = $row['grad'];
					$cod = $row['cod'];
					$apteka = $row['apteka'];
					$pharmid = $row['pharmid'];
					$segment = $row['segment'];
					$adres = $row['adres'];
					$pharmid = $row['pharmid'];
					$clon = $row['clon'];
				echo "
					<tr>
						<td>$grad</td>
						<td>$cod</td>
						<td>$apteka</td>
						<td>$pharmid</td>
						<td>$segment</td>
						<td>$adres</td>
						<td>$clon</td>
						<td align='center'><a href='edit_pharm.php?ids=$id_ph' id='".$select3."'><i class='glyphicon  glyphicon-pencil'></i>&nbsp;</a></td>
					</tr>
				";
			}
			echo "</table>";


/*
if (empty($select1) || empty($select2) || empty($select3) &&  empty($brand) && empty($tip) && empty($vid) && empty($position)) {

}
*/
 
?>