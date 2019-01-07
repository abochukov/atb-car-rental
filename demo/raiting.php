<?php
	session_start();

	if(!isset($_SESSION['username'])){
	   header("Location:index.php");
	}

	//echo $_SESSION['username'];
	$user_email = $_SESSION['email'];

	require_once("config.php");

	

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

	<script type="text/javascript">
		$( document ).ready(function() {
			$('a').on('click', function(){
			   var target = $(this).attr('rel');
			   $("#"+target).show().siblings("div").hide();
			});
		});	
	</script>

	<style>
	
		.col {
		  flex: 1; /* additionally, equal width */
		  
		  padding: 1em;
		  border: solid;
		}

		.row{
		    display: flex; /* equal height of the children */
		}

		
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
				$id = $row['id'];
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

	
<div class="container-fluid" >
	<div class="row" >
		<div class="col-lg-5 col-md-5 col-sm-5 vcenter " >
			<div class="profile_raiting" >
				<ul class="pr_r">
					<li><a href="#" rel="zone1">special visivility</a></li>
					<li><a href="#" rel="zone2">рафт</a></li>
					<li><a href="#" rel="zone3">каса</a></li>
					<li><a href="#" rel="zone4">витрина</a></li>
					<li><a href="#" rel="zone5">свободен достъп</a></li>
					<li><a href="#" rel="zone6">обща класация</a></li>
				</ul>
			</div>
		</div>

		<div class="col-lg-1 col-md-2 col-sm-2"></div>

		<div class="col-lg-6 col-md-6 col-sm-6 stat vcenter">
		<?php
			$sql_target1 = "SELECT users.first_name, raiting_zone_1.percent AS percent
							FROM users
							INNER JOIN raiting_zone_1 ON users.id = raiting_zone_1.userid
							ORDER BY raiting_zone_1.percent DESC ";
			$rs_target1 = mysqli_query($conn,$sql_target1);


			$sql_target2 = "SELECT users.first_name, raiting_zone_2.percent AS percent2
							FROM users
							INNER JOIN raiting_zone_2 ON users.id = raiting_zone_2.userid
							ORDER BY raiting_zone_2.percent DESC ";
			$rs_target2 = mysqli_query($conn,$sql_target2);


			$sql_target3 = "SELECT users.first_name, raiting_zone_3.percent AS percent3
							FROM users
							INNER JOIN raiting_zone_3 ON users.id = raiting_zone_3.userid
							ORDER BY raiting_zone_3.percent DESC ";
			$rs_target3 = mysqli_query($conn,$sql_target3);


			$sql_target4 = "SELECT users.first_name, raiting_zone_4.percent AS percent4
							FROM users
							INNER JOIN raiting_zone_4 ON users.id = raiting_zone_4.userid
							ORDER BY raiting_zone_4.percent DESC ";
			$rs_target4 = mysqli_query($conn,$sql_target4);


			$sql_target5 = "SELECT users.first_name, raiting_zone_5.percent AS percent5
							FROM users
							INNER JOIN raiting_zone_5 ON users.id = raiting_zone_5.userid
							ORDER BY raiting_zone_5.percent DESC ";
			$rs_target5 = mysqli_query($conn,$sql_target5);

			$sql_target_all = "SELECT users.first_name, raiting_zone_all.percent AS percentAll
							FROM users
							INNER JOIN raiting_zone_all ON users.id = raiting_zone_all.userid
							ORDER BY raiting_zone_all.percent DESC ";
			$rs_target_all = mysqli_query($conn,$sql_target_all);

			

			?>
			<div class="chart1" id="zone1">
				<div class="raiting">
					<span>special visibility</span><img src="images/raiting-icon.png" >
					<ul class="raiting_results">
						<?php
						$i = 1;
						while ($row = mysqli_fetch_assoc($rs_target1)) {
							$user_name = $row['first_name'];
							$percent = $row['percent'];
							
						?>
					
						<li><?php echo "<b>" . $i++ . ".</b>&nbsp;" . $user_name . "&nbsp;|&nbsp;" . round($percent) ."%" ?></li>
							
						<?php }	?>
					</ul>
				</div>
			</div>

			<div class="chart2" id="zone2">
				<div class="raiting">
					<span>Рафт</span><img src="images/raiting-icon.png" >
					<ul class="raiting_results">
						<?php
						$i = 1;
						while ($row2 = mysqli_fetch_assoc($rs_target2)) {
							$user_name = $row2['first_name'];
							$percent = $row2['percent2'];
							
						?>
					
						<li><?php echo $i++.".&nbsp;" . $user_name . "&nbsp;|&nbsp;" . round($percent) ."%" ?></li>
							
						<?php }	?>
					</ul>
				</div>
			</div>

			<div class="chart3" id="zone3">
				<div class="raiting">
					<span>Каса</span><img src="images/raiting-icon.png" >
					<ul class="raiting_results">
						<?php
						$i = 1;
						while ($row3 = mysqli_fetch_assoc($rs_target3)) {
							$user_name = $row3['first_name'];
							$percent = $row3['percent3'];
							
						?>
					
						<li><?php echo $i++.".&nbsp;" . $user_name . "&nbsp;|&nbsp;" . round($percent) ."%" ?></li>
							
						<?php }	?>
					</ul>
				</div>
			</div>

			<div class="chart4" id="zone4">
				<div class="raiting">
					<span>Витрина</span><img src="images/raiting-icon.png" >
					<ul class="raiting_results">
						<?php
						$i = 1;
						while ($row4 = mysqli_fetch_assoc($rs_target4)) {
							$user_name = $row4['first_name'];
							$percent = $row4['percent4'];
							
						?>
					
						<li><?php echo $i++.".&nbsp;" . $user_name . "&nbsp;|&nbsp;" . round($percent) ."%" ?></li>
							
						<?php }	?>
					</ul>
				</div>
			</div>

			<div class="chart5" id="zone5">
				<div class="raiting">
					<span>Свободен достъп</span><img src="images/raiting-icon.png" >
					<ul class="raiting_results">
						<?php
						$i = 1;
						while ($row5 = mysqli_fetch_assoc($rs_target5)) {
							$user_name = $row5['first_name'];
							$percent = $row5['percent5'];
							
						?>
					
						<li><?php echo $i++.".&nbsp;" . $user_name . "&nbsp;|&nbsp;" . round($percent) . "%" ?></li>
							
						<?php }	?>
					</ul>
				</div>
			</div>

			<div class="chart6" id="zone6">
				<div class="raiting">
					<span>Обща класация</span><img src="images/raiting-icon.png" >
					<ul class="raiting_results">
						<?php
						$i = 1;
						while ($rowAll = mysqli_fetch_assoc($rs_target_all)) {
							$user_name = $rowAll['first_name'];
							$percent = $rowAll['percentAll'];
							
						?>
					
						<li><?php echo $i++.".&nbsp;" . $user_name . "&nbsp;|&nbsp;" . round($percent) . "%" ?></li>
							
						<?php }	?>
					</ul>
				</div>
			</div>

			

			<!--<img src="images/statistic.png" class="statistic"><br/>-->
			
		</div>
		<!-- end chart 2 -->

		</div>
		



	</div>

	<br clear="all" />
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 footer" style="height: 2px">

		</div><!-- /.col-lg-12 -->
	</div>
	<br/><br/><br/><br/><r/>
</div>

</body>
</html>
