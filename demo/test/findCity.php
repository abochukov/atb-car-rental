<!-- ==============================================

//  Created by PHP Dev Zone           			 ||

//	http://php-dev-zone.com                      ||

//  Contact for any Web Development Stuff        ||

//  Email: ketan32.patel@gmail.com     			 ||

//=============================================-->



<?php $countryId=intval($_GET['country']);

$stateId=intval($_GET['state']);

$con = mysqli_connect("localhost","bgprvhqk_vivach","Q#9L,!TK9x3O");

if (!$con) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($con, 'bgprvhqk_sting');

$query="SELECT id,city FROM city WHERE countryid='$countryId' AND stateid='$stateId'";

$result=mysqli_query($con, $query);



?>

<select name="city" id="select3">

	<option>Select City</option>

	<?php while($row=mysqli_fetch_array($result)) { ?>

	<option value=<?php echo $row['id']?>><?php echo $row['city']?></option>

	<?php } ?>

</select>

