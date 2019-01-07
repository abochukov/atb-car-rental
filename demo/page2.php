<?php
	session_start();

	if(!isset($_SESSION['username'])){
	   header("Location:index.php");
	}

	//echo $_SESSION['username'];
	$user_email = $_SESSION['email'];
	//echo $user_email;

	require_once("config.php");

	$con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

	
	if (!$con) {
	    die('Could not connect: ' . mysql_error());
	}
	mysqli_select_db($con, 'cookbgco_sting');
	mysqli_set_charset($con,"utf8");

	//$query="SELECT * FROM country ORDER BY country ASC";
		$query="SELECT DISTINCT(g.country), g.id,  c.active  
			FROM country AS g
			INNER JOIN city as c ON g.id = c.countryid
			WHERE c.active = '1'
			ORDER BY country ASC";
	$result=mysqli_query($con, $query);

	$type="SELECT * FROM type WHERE active='1'";
	$type_r=mysqli_query($con, $type);

	$mode="SELECT * FROM mode WHERE active='1'";
	$mode_r=mysqli_query($con, $mode);

	$zone="SELECT * FROM zone WHERE active='1'";
	$zone_r=mysqli_query($con, $zone);

	$brand="SELECT * FROM brands WHERE active='1' ORDER BY priority DESC";
	$brand_r=mysqli_query($con, $brand);

?>

<!DOCTYPE html>
<html>

<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/toaster.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
	<link href="css/user.css" rel="stylesheet">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/roboto/RobotoRegular.css">


	<link rel="stylesheet" type="text/css" href="css/dropdown.css" />
	<script src="triple_drop.js"></script>
	<script src="double_drop.js"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	

	<script>
		/*
		jQuery(document).ready(function($){
		    $('select').select2({width:100});
		   
		});
		*/		

	</script>

	<style type="text/css">
		[class^='select2'] {
		  border-top: 1px solid red;

		}
	</style>
</head>


<body>
	
	<?php
		//include 'user/header.php';

		$menu=file_get_contents("user/header.php");
		$base=basename($_SERVER['PHP_SELF']);
		$menu=preg_replace("|<li><a href=\"".$base."\">(.*)</a></li>|U", "<li id=\"current\">$1</li>", $menu);
		echo $menu;
	?>

	<?php
		$sql = "SELECT * FROM users WHERE email = '$user_email'";
		$rs = mysqli_query($conn,$sql);

		while ($row = mysqli_fetch_assoc($rs)) {
				$user_id = $row['id'];
				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$email = $row['email'];
				$img = $row['image'];
				$description = $row['description'];

				//echo $first_name . "<br/>";
				//echo $last_name . "<br/>";
				//echo $description . "<br/>";
			}
	?>

	
<div class="container-fluid">


		<div class="row">
		<div class="col-lg-5 col-md-5 col-sm-5">
			<div class="profile">
				<?php
					echo "<br/><br/><br/><br/><img src='images/folder-icon.png' class='img-responsive'>
			
							<br clear='all'/>
							<div class='profile_details_upload'>
								<div class='name'>
									<img src='images/circ.png'><br/><br/>
									<h3>".$first_name."</h3>
									
									<h4>".$last_name."</h4>
								</div>
								
							</div>

					";

				?>
			</div>
		</div>

		<div class="col-lg-1 col-md-1col-sm-1"></div>

		<div class="col-lg-3 col-md-3 col-sm-3 stat" >
			<article class="upload">

			<form id="uploadForm" action="upload.php" method="post">

				<select name="country" onChange="getState(this.value)" id="select1" class="">
					<option value="">&#x25CB; населено място</option>
					<?php while ($row=mysqli_fetch_array($result)) { ?>
					<option value=<?php echo $row['id']?>><span><?php echo $row['country']?></span></option>
					<?php } ?>
				</select>
		
				<div id="statediv">
			    	<select name="state">
						<option >&#x25CB; код верига</option>
			        </select>
			    </div>


			    <div id="citydiv">
			    	<select name="city">
						<option>&#x25CB; име на аптека</option>
		        	</select>
		        </div>

		        <div id="citydivs">
		    		<select name="brand">
						<option value="">&#x25CB; бранд</option>
						<?php while ($row=mysqli_fetch_array($brand_r)) { ?>
						<option value=<?php echo $row['id']?>><?php echo $row['brand']?></option>
						<?php } ?>
		        	</select>
		        </div>


		        <div id="citydivs">
		    		<select name="tip">
						<option value="">&#x25CB; тип позициониране</option>
						<?php while ($row=mysqli_fetch_array($type_r)) { ?>
						<option value=<?php echo $row['id']?>><?php echo $row['type']?></option>
						<?php } ?>
		        	</select>
		        </div>

		        <div id="citydivs">
			    	<select name="position" onChange="getMode(this.value)" >
						<option value="">&#x25CB; зона</option>
						<?php while ($row=mysqli_fetch_array($zone_r)) { ?>
						<option value=<?php echo $row['id']?>><?php echo $row['zone']?></option>
						<?php } ?>
			        </select>
			    </div>

		        <div id="modediv">
		    		<select name="vid">
						<option value="">&#x25CB; вид материал</option>
		        	</select>
		        </div>

			    <input type="hidden" name="user_email" value="<?php echo $user_id ?>">
		</div>	    
		<div class="col-lg-2 col-md-2 col-sm-3 stat">		
				<!--<div id="targetLayer">No Image</div>-->
				
				<label for="test">	
					<div id="targetLayer">
					 	<div class="lbl"><p>&#x25CB; Избор на файл</p></div>
						<input name="userImage" type="file" class="inputFile" /><br/>
					</div>	
					<p id="filename"></p>	
				</label>

				<br/>
				<button type="submit" class="btnSubmit" style="border: 0; background: transparent; outline: none;" >
					<img src="images/upload_btn.png"  alt="submit" />
				</button>

				<button class="refresh_page" style="border: 0; background: transparent; outline: none;" >
					<img src="images/refresh.png"  alt="submit" />
				</button>
			
			</form>

			</article>
		</div>

	</div>
	<br clear="all" />
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 footer" style="height: 2px">

		</div><!-- /.col-lg-12 -->
	</div>
	<br/><br/><br/><br/><r/>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="js/drop_down.js"></script>		

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
<script>
	$(document).ready(function (e) {
		$('input[type=file]').on('change', function() {
			$("#filename").text($(this).val());
		});

		$('input[type=file]').on('dragenter', function() {
			$('.lbl').addClass('dragover');
		});

		$('input[type=file]').on('dragleave', function() {
			$('.lbl').removeClass('dragover');
		});

	});
</script>


</body>
</html>
