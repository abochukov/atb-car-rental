<!-- ==============================================

//  Created by PHP Dev Zone           			 ||

//	http://php-dev-zone.com                      ||

//  Contact for any Web Development Stuff        ||

//  Email: ketan32.patel@gmail.com     			 ||

//=============================================-->



<?php $countryId=intval($_GET['country']);

$stateId=intval($_GET['state']);

$con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$con) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($con, 'cookbgco_sting');
mysqli_set_charset($con,"utf8");

$query="SELECT id,city FROM city WHERE countryid='$countryId' AND stateid='$stateId'";

$result=mysqli_query($con, $query);



?>

<select name="city" id="select3">

	<option>Избери аптека</option>

	<?php while($row=mysqli_fetch_array($result)) { ?>

	<option value=<?php echo $row['id']?>><?php echo $row['city']?></option>

	<?php } ?>

</select>

