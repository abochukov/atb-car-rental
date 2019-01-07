<?php
	session_start();

	if(!isset($_SESSION['username'])){
	   header("Location:index.php");
	}

	//echo $_SESSION['username'];
	$user_email = $_SESSION['email'];
	
	require_once("config.php");

	$con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

	
	if (!$con) {
	    die('Could not connect: ' . mysql_error());
	}
	mysqli_select_db($con, 'cookbgco_sting');
	mysqli_set_charset($con,"utf8");

	/* ТОП снимка */
	$top="SELECT * FROM top_image ";
	$result_top=mysqli_query($con, $top);

	/* критерий потребители */
	$query="SELECT * FROM users WHERE role='2'";
	$result=mysqli_query($con, $query);

	/* критерий позиция */
	$zone="SELECT * FROM zone WHERE active='1'";
	$zone_r=mysqli_query($con, $zone);

	/* критерий материал*/
	$mode="SELECT * FROM mode_new WHERE active='1'";
	$mode_r=mysqli_query($con, $mode);

	/* критерий бранд */
	$brand="SELECT * FROM brands WHERE active='1' ORDER BY priority DESC";
	$brand_r=mysqli_query($con, $brand);

	/* Критерий тип */
	$type="SELECT * FROM type WHERE active='1'";
	$type_r=mysqli_query($con, $type);

	/* критерий град */
	$city="SELECT * FROM country ORDER BY country ASC";
	$city_r=mysqli_query($con, $city);

	/* критерий сегмент */
	$segment="SELECT * 
    				FROM city
					WHERE id
					IN (

					SELECT MIN( id ) 
					FROM city
					GROUP BY segment
					)
					ORDER BY segment ASC";
	$segment_r=mysqli_query($con, $segment);

	/* Ako ne sa izbrali nishto */
	$empty_g="SELECT * FROM form_upld ORDER BY date_upld DESC";
	$empty_r=mysqli_query($con, $empty_g);

	

	


?>

<!DOCTYPE html>
<html>

<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/toaster.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
	<link href="css/user.css" rel="stylesheet">

	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/roboto/RobotoRegular.css">

	<link rel="stylesheet" type="text/css" href="css/select2.css">

	<link rel="stylesheet" type="text/css" href="css/drop_gallery.css" />
	<link rel="stylesheet" type="text/css" href="css/gallery.css" />

	<script src="js/select2.min.js"></script>
	<script src="triple_drop.js"></script>

	<link rel="stylesheet" type="text/css" href="css/pop_gallery.css">
	<script src="js/gallery.js" type="text/javascript"></script>
	
	<!-- date picker -->
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">


	<script>

		$("#select1").select2();

	</script>

	  <script>
		  $(document).ready(function() {
		    $("#from_date").datepicker({
	            prevText: '<i class="fa fa-arrow-left"></i>',
	            nextText: '<i class="fa fa-arrow-right"></i>',
	            constrainInput: true,
	            dateFormat: 'yy-mm-dd'
	        });

		    $("#to_date").datepicker({
	            prevText: '<i class="fa fa-arrow-left"></i>',
	            nextText: '<i class="fa fa-arrow-right"></i>',
	            constrainInput: true,
	            dateFormat: 'yy-mm-dd'
	        });
		  });
  </script>

	<style type="text/css">
		[class^='select2'] {
		  border-radius: 0px !important;
		  border: none;
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
	/*
		$sql = "SELECT * FROM users WHERE email = '$user_email'";
		$rs = mysqli_query($conn,$sql);

		while ($row = mysqli_fetch_assoc($rs)) {
				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$email = $row['email'];
				$img = $row['image'];
				$description = $row['description'];

				//echo $first_name . "<br/>";
				//echo $last_name . "<br/>";
				//echo $description . "<br/>";
			}
	*/
	?>

	
<div class="container-fluid">

		<div class="row" style="background: #f2f2f2">
			<div class="col-lg-1 col-md-1 col-sm-1" ></div>
			<div class="col-lg-5 col-md-5 col-sm-5">
				<?php
					while ($row=mysqli_fetch_array($result_top)) {
						$img = $row['img'];
						$user = $row['user'];
						$brand = $row['brand'];
						$pharm = $row['brand'];

						$get_name = "SELECT * FROM users WHERE id = '$user'";
						$res_name = mysqli_query($con, $get_name );
						while ($row_name = mysqli_fetch_assoc($res_name)) {
							$name = $row_name['first_name'];
							$family = $row_name['last_name'];
							
						}

						$get_brand = "SELECT * FROM brands WHERE id = '$brand'";
						$res_brand = mysqli_query($con, $get_brand );
						while ($row_brand = mysqli_fetch_assoc($res_brand)) {
							$br = $row_brand['brand'];
						}

				

					echo "<img src='$img' class='img-responsive'>";
				?>

			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				
				<div class="weekTitle">
					<span>Снимка на <br/>седмицата</span>
				</div>

				<div class="weekUser">
					<img src="images/avatars.png">

						<h3><?php echo $name ?></h3>	
						<h4><?php echo $family ?></h4>
						<span> <?php echo $br; ?></span>
	
				</div>
				<?php } ?>

			</div>
		</div>

		<div class="row">
	

		<div class="col-lg-12 col-md-12 col-sm-12" style="">
			<article class="upload">
				
			<form id="uploadForm" action="upload.php" method="post">
			<ul class="filters">
				<li class="select1" >
					<div class="criteria">
						<select name="users" id="select1" class="">
							<option value="">представител</option>
							<?php while ($row=mysqli_fetch_array($result)) { ?>
							<option value=<?php echo $row['id']?>><?php echo $row['first_name']. "&nbsp;" . $row['last_name']?></option>
							<?php } ?>
						</select>
					</div>
				</li>
				<li class="select2">
					<div id="" class="criteria">
			    		<select name="zone" id="select2">
							<option value="">зона </option>
							<?php while ($row=mysqli_fetch_array($zone_r)) { ?>
							<option value=<?php echo $row['id']?>><?php echo $row['zone']?></option>
							<?php } ?>
			        	</select>
			        </div>
				</li>
				<li class="select3">
					<div id="" class="criteria">
				    	<select name="mode" id="select3">
							<option value="">материал</option>
							<?php while ($row=mysqli_fetch_array($mode_r)) { ?>
							<option value=<?php echo $row['id']?>><?php echo $row['mode']?></option>
							<?php } ?>
				        </select>
				    </div>
			    </li>
			    <li class="select4">
				    <div id="" class="criteria">
				    	<select name="brand" id="select4">
							<option value="">бранд</option>
							<?php while ($row=mysqli_fetch_array($brand_r)) { ?>
							<option value=<?php echo $row['id']?>><?php echo $row['brand']?></option>
							<?php } ?>
				        </select>
				    </div>
			    </li>
			    <li class="select5">
				    <div id="" class="criteria">
				    	<select name="type" id="select5" >
							<option value="">позициониране</option>
							<?php while ($row=mysqli_fetch_array($type_r)) { ?>
							<option value=<?php echo $row['id']?>><?php echo $row['type']?></option>
							<?php } ?>
				        </select>
				    </div>
			    </li>
			    <li class="select6">
				    <div id="" class="criteria">
				    	<!--<select name="city" id="select6">-->
				    	<select name="country" onChange="getState(this.value)" id="select1" class="">
							<option value="">град</option>
							<?php while ($row=mysqli_fetch_array($city_r)) { ?>
							<option value=<?php echo $row['id']?>><?php echo $row['country']?></option>
							<?php } ?>
				        </select>
				    </div>
			    </li>
			    <li class="select7">
				    <div id="statediv" class="criteria">
				    	<select name="state" id="select7">
							<option > верига</option>
						</select>
				    </div>
			    </li>
			    <li class="select8">
			    	<div id="citydiv">
				    	<select name="citys">
							<option> аптека</option>
			        	</select>
		        	</div>
			    </li>
			   	<li class="select9">
			   		 <div class="criteria"><input name="from_date" id="from_date" class="from_date" placeholder="начална дата" /></div>
			   	</li>
			   	<li class="select10">
			   		 <input name="to_date" id="to_date" class="to_date" placeholder="крайна дата" />
			   	</li>

			   	<li class="select12">
				    <div id="" class="segment">
				    	<!--<select name="city" id="select6">-->
				    	<select name="type" id="select5" >
							<option value="">сегмент</option>
							<?php while ($rows=mysqli_fetch_array($segment_r)) { ?>
							<option value=<?php echo $rows['id']?>><?php echo $rows['segment']?></option>
							<?php } ?>
				        </select>
				    </div>
			    </li>

			    <li class="select11">
				    <button type="submit" class="btnSubmit" style="border: 0; background: transparent; outline: none;" >
						<!--<img src="images/apply.png"  alt="submit" />-->
						<div class='cc'>приложи</div>
					</button>	
				</li>
				
			</ul>
			</form>
			<br clear="all"><br/>

			<div id="targetLayer">
			<?php
				$x = 0; //
				$i = 0; // Use it to get number of
				$rows = array();

				while ($row=mysqli_fetch_array($empty_r)) 
					
					$rows[] = $row;	
					foreach ($rows as $row){
					    if($x % 4 == 0) 
						   	 echo '<div class="row asd">';
					?>  

				    <div class="col-lg-3 col-md-3 col-sm-3" style="">
				    
				    <ul class='gallery'>
				    	<li class="img thumbnail">
				        	<img src="<?php echo $row['img']; ?>" >
				        	
				        </li>
				        <li class="name">
				        	
				        	<span>
				        		<?php
				        		$brand = $row['brand'];
				        		$userid = $row['user'];
				        		
				        		$sql = "SELECT * FROM brands WHERE id = '$brand' ";
				        		$res = mysqli_query($con, $sql);

				        		$sql_us = "SELECT * FROM users WHERE id = '$userid' ";
				        		$res_us = mysqli_query($con, $sql_us);
				        		
				        		echo "<ul class='labels'>";
					        		
					        		echo "<li>";
					        			while ($row3=mysqli_fetch_array($res_us)) { $name = $row3['first_name']; 
					        				$arr = explode(" ", $name, 2);
										$first = $arr[0]; echo $first; }
					        		echo "</li>";
					        		echo "<li>";
					        			while ($row=mysqli_fetch_array($res)) { echo "<span>". $row['brand']."</span>"; }
					        		echo "</li>";
				        		echo "</ul>";
				        		?>
					        	<h4><strong><?php //echo $row['brand']; ?></strong></h4>
					        	<h4><?php echo $row['last_name']; ?></h4>
					        </span>
					        
				        </li>

				    </ul>
				    
				    </div>

				<?php
				    $x++;
				    if($x % 4 == 0) echo '</div><br/>';
				}	
				?>	
			</div>
			</article>
		</div>

	</div>


</div>

<script type="text/javascript" src="js/drop_down.js"></script>		

<script type="text/javascript">
$(document).ready(function (e) {
	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "gallery_search.php",
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
