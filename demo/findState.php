<!-- ==============================================

//  Created by PHP Dev Zone           			 ||

//	http://php-dev-zone.com                      ||

//  Contact for any Web Development Stuff        ||

//  Email: ketan32.patel@gmail.com     			 ||

//=============================================-->





<?php $country=intval($_GET['country']);

$con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$con) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($con, 'cookbgco_sting');

	mysqli_set_charset($con,"utf8");

$query="SELECT id,statename FROM state WHERE countryid='$country'";

$result=mysqli_query($con, $query);



?>

<select name="state" onchange="getCity(<?php echo $country?>,this.value)" id="select2">

<option>Избери верига</option>

<?php while ($row=mysqli_fetch_array($result)) { ?>

<option value=<?php echo $row['id']?>><?php echo $row['statename']?></option>

<?php } ?>

</select>

