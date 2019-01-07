<!-- ==============================================

//  Created by PHP Dev Zone           			 ||

//	http://php-dev-zone.com                      ||

//  Contact for any Web Development Stuff        ||

//  Email: ketan32.patel@gmail.com     			 ||

//=============================================-->





<?php $zone=intval($_GET['zone']);

$con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$con) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($con, 'cookbgco_sting');

	mysqli_set_charset($con,"utf8");

$query="SELECT id,mode FROM mode_new WHERE zoneid='$zone' AND active='1'";

$result=mysqli_query($con, $query);



?>

<select name="mode" >

<option>Избери тип</option>

<?php while ($row=mysqli_fetch_array($result)) { ?>

<option value=<?php echo $row['id']?>><?php echo $row['mode']?></option>

<?php } ?>

</select>

