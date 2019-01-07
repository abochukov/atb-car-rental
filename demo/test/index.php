<?php 
$con = mysqli_connect("localhost","bgprvhqk_vivach","Q#9L,!TK9x3O");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysqli_select_db($con, 'bgprvhqk_sting');
mysqli_set_charset($con,"utf8");

$query="SELECT * FROM country";
$result=mysqli_query($con, $query);

$type="SELECT * FROM type WHERE active='1'";
$type_r=mysqli_query($con, $type);

$mode="SELECT * FROM mode WHERE active='1'";
$mode_r=mysqli_query($con, $mode);

$zone="SELECT * FROM zone WHERE active='1'";
$zone_r=mysqli_query($con, $zone);




?>
<html>
<head>
<title>Country State City Dropdown Using Ajax</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<script src="ajaxSave.js"></script>
<script src="triple_drop.js"></script>


</head>
<body>


<div class="bgColor">
	<form id="uploadForm" action="upload.php" method="post">
		<div id="targetLayer">No Image</div>
		<div id="uploadFormLayer">
		<input name="userImage" type="file" class="inputFile" /><br/>
		<select name="country" onChange="getState(this.value)" id="select1">
			<option value="">Select Country</option>
			<?php while ($row=mysqli_fetch_array($result)) { ?>
			<option value=<?php echo $row['id']?>><?php echo $row['country']?></option>
			<?php } ?>
		</select>
		
		<br/>

		<div id="statediv">
	    	<select name="state">
				<option >Select State</option>
	        </select>
	    </div>

	    <br/>

	    <div id="citydiv">
	    	<select name="city">
				<option>Select City</option>
        	</select>
        </div>

        <br/>

        <div id="citydivs">
    		<select name="tip">
				<option value="">Избери тип</option>
				<?php while ($row=mysqli_fetch_array($type_r)) { ?>
				<option value=<?php echo $row['id']?>><?php echo $row['type']?></option>
				<?php } ?>
        	</select>
        </div>

        <br/>

        <div id="citydivs">
    		<select name="vid">
				<option value="">Избери тип</option>
				<?php while ($row=mysqli_fetch_array($mode_r)) { ?>
				<option value=<?php echo $row['id']?>><?php echo $row['mode']?></option>
				<?php } ?>
        	</select>
        </div>

        <br/>

        <div id="citydivs">
	    	<select name="position" >
				<option value="">Избери зона</option>
				<?php while ($row=mysqli_fetch_array($zone_r)) { ?>
				<option value=<?php echo $row['id']?>><?php echo $row['zone']?></option>
				<?php } ?>
	        </select>
	    </div>
		<input type="submit" value="Submit" class="btnSubmit" />
	</form>
</div>

<script type="text/javascript">
$(document).ready(function (e) {
	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "upload.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
				$("#targetLayer").html(data);
		    },
				error: function() 
	    	{
	    	} 	        
	   });
	}));
});
</script>

</body>
</html>
