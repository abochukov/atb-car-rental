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
		
		});	
	</script>


</head>


<body>
	
	<?php
		include 'user/header.php';
	?>

	<?php
		$id = $_GET['id'];
		$sql = "SELECT * FROM users WHERE id = '$id'";
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
	?>

	
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-5 col-md-5 col-sm-5">
			<div class="profile">
				<?php
					echo "<br/><br/><br/><br/><img src='admin/".$img."' class='img-responsive img-circle'>
							<img src='images/avatars.png' class='img-responsive img-circle' id='avatars'>
							<br clear='all'/>
							<div class='profile_details'>
								<div class='name'>
									<img src='images/circ.png'>
									<h3>".$first_name."</h3>
									<h4>".$last_name."</h4>
								</div>
								<div class='description'>
									".$description." <br/><br/> 
									<span>".$email."</span>
								</div>
							</div>

					";

				?>
			</div>
		</div>

		<div class="col-lg-2 col-md-2 col-sm-2">
			
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 stat">
					<?php
			$sql_target1 = "SELECT targets_zone1.a1, form_upld.user, COUNT( form_upld.zone ) as zonse
							FROM form_upld
							INNER JOIN targets_zone1 ON form_upld.user = targets_zone1.user
							WHERE form_upld.zone =  '1'
							AND targets_zone1.modeid =  '0'
							AND targets_zone1.user =  '$id'";
			$rs_target1 = mysqli_query($conn,$sql_target1);

			$sql_target2 = "SELECT targets_zone2.a1, form_upld.user, COUNT( form_upld.zone ) as zonse2
							FROM form_upld
							INNER JOIN targets_zone2 ON form_upld.user = targets_zone2.user
							WHERE form_upld.zone =  '2'
							AND targets_zone2.modeid =  '0'
							AND targets_zone2.user =  '$id'";
			$rs_target2 = mysqli_query($conn,$sql_target2);

			$sql_target3 = "SELECT targets_zone3.a1, form_upld.user, COUNT( form_upld.zone ) as zonse3
							FROM form_upld
							INNER JOIN targets_zone3 ON form_upld.user = targets_zone3.user
							WHERE form_upld.zone =  '3'
							AND targets_zone3.modeid =  '0'
							AND targets_zone3.user =  '$id'";
			$rs_target3 = mysqli_query($conn,$sql_target3);

			$sql_target4 = "SELECT targets_zone4.a1, form_upld.user, COUNT( form_upld.zone ) as zonse4
							FROM form_upld
							INNER JOIN targets_zone4 ON form_upld.user = targets_zone4.user
							WHERE form_upld.zone =  '4'
							AND targets_zone4.modeid =  '0'
							AND targets_zone4.user =  '$id'";
			$rs_target4 = mysqli_query($conn,$sql_target4);

			$sql_target5 = "SELECT targets_zone5.a1, form_upld.user, COUNT( form_upld.zone ) as zonse5
							FROM form_upld
							INNER JOIN targets_zone5 ON form_upld.user = targets_zone5.user
							WHERE form_upld.zone =  '5'
							AND targets_zone5.modeid =  '0'
							AND targets_zone5.user =  '$id'";
			$rs_target5 = mysqli_query($conn,$sql_target5);


			while ($row = mysqli_fetch_assoc($rs_target1)) {
				$target1 = $row['a1'];
				//echo "target" . $target1 . "<BR/>";
				$zone = $row['zonse'];
				//echo "KACHENI MATERIALI" . $ZONE;	
				if($zone == 0) {
					$sql_back_1 = "SELECT * FROM targets_zone1 WHERE zoneid='1' AND modeid='0' AND user = '$id'";
					$rs_back_1 = mysqli_query($conn,$sql_back_1);
					while($row_back_1 = mysqli_fetch_assoc($rs_back_1)) {
						$target1 = $row_back_1['a1'];

					}
				} else {
					//echo "Таргет special visibility:&nbsp;" . $target1 ."/". $zone . "&nbsp;&nbsp;";
					$zone1_percent = ($zone*100) / ($target1);
					

					/* Ако качените материали са повече от таргета, да показва 100%, а не 130% примерно*/
					if ($zone1_percent > 100)  {
						$zone1_percent = '100';
					}
				}
			}
			echo "<br/>";
			while ($row2 = mysqli_fetch_assoc($rs_target2)) {
				$target2 = $row2['a1'];
				$zone2 = $row2['zonse2'];
				if($zone2 == 0) {
					$sql_back_2 = "SELECT * FROM targets_zone2 WHERE zoneid='2' AND modeid='0' AND user = '$id'";
					$rs_back_2 = mysqli_query($conn,$sql_back_2);
					while($row_back_2 = mysqli_fetch_assoc($rs_back_2)) {
						$target2 = $row_back_2['a1'];

					}
				} else {
					//echo "Таргет рафт:&nbsp;" . $target2 ."/". $zone2 . "&nbsp;&nbsp;";
					$zone2_percent = ($zone2*100) / ($target2);
					
					/* Ако качените материали са повече от таргета, да показва 100%, а не 130% примерно*/
					if ($zone2_percent > 100)  {
						$zone2_percent = '100';
					}
				}
			}
			echo "<br/>";
			while ($row3 = mysqli_fetch_assoc($rs_target3)) {
				$target3 = $row3['a1'];
				$zone3 = $row3['zonse3'];
				if($zone3 == 0) {
					$sql_back_3 = "SELECT * FROM targets_zone3 WHERE zoneid='3' AND modeid='0' AND user = '$id'";
					$rs_back_3 = mysqli_query($conn,$sql_back_3);
					while($row_back_3 = mysqli_fetch_assoc($rs_back_3)) {
						$target3 = $row_back_3['a1'];
					}
				} else {
					//echo "Таргет каса:&nbsp;" . $target3 ."/". $zone3 . "&nbsp;&nbsp;";
					$zone3_percent = ($zone3*100) / ($target3);
					
					/* Ако качените материали са повече от таргета, да показва 100%, а не 130% примерно*/
					if ($zone3_percent > 100)  {
						$zone3_percent = '100';
					}
				}
			}
			echo "<br/>";
			while ($row4 = mysqli_fetch_assoc($rs_target4)) {
				$target4 = $row4['a1'];
				$zone4 = $row4['zonse4'];
				if($zone4 == 0) {
					$sql_back_4 = "SELECT * FROM targets_zone4 WHERE zoneid='4' AND modeid='0' AND user = '$id'";
					$rs_back_4 = mysqli_query($conn,$sql_back_4);
					while($row_back_4 = mysqli_fetch_assoc($rs_back_4)) {
						$target4 = $row_back_4['a1'];
					}
				} else {
					//echo "Таргет витрина:&nbsp;" . $target4 ."/". $zone4 . "&nbsp;&nbsp;";
					$zone4_percent = ($zone4*100) / ($target4);
					

					/* Ако качените материали са повече от таргета, да показва 100%, а не 130% примерно*/
					if ($zone4_percent > 100)  {
						$zone4_percent = '100';
					}
				}
			}

			echo "<br/>";
			while ($row5 = mysqli_fetch_assoc($rs_target5)) {
				$target5 = $row5['a1'];
				$zone5 = $row5['zonse5'];
				if($zone5 == 0) {
					$sql_back_5 = "SELECT * FROM targets_zone5 WHERE zoneid='5' AND modeid='0' AND user = '$id'";
					$rs_back_5 = mysqli_query($conn,$sql_back_5);
					while($row_back_5 = mysqli_fetch_assoc($rs_back_5)) {
						$target5 = $row_back_5['a1'];
					}
				} else {
					//echo "Таргет свободен достъп:&nbsp;" . $target5 ."/". $zone5 . "&nbsp;&nbsp;";
					$zone5_percent = ($zone5*100) / ($target5);
					

					/* Ако качените материали са повече от таргета, да показва 100%, а не 130% примерно*/
					if ($zone5_percent > 100)  {
						$zone5_percent = '100';
					}
				}
			}
		
		?>

			<!--<img src="images/statistic.png" class="statistic"><br/>-->
			<div class="targets_result">
				<ul class="results_header">
					<li class="labels"><div class="one">зона</div></li>
					<li><div class="one">покритие</div></li>
					<li><div class="one">таргет</div></li>
				</ul>
				<br/><br/>
				<ul class="results">
					<li class="labels"><div class="one">special visibility</div></li>
					<li><div class="one"><?php echo round($zone1_percent) . "%"; ?></div></li>
					<li><div class="one"><?php echo $target1; ?></div></li>
				</ul>
				<br/>
				<ul class="results">
					<li class="labels"><div class="one">рафт</div></li>
					<li><div class="one"><?php echo round ($zone2_percent) . "%"; ?></div></li>
					<li><div class="one"><?php echo $target2; ?></div></li>
				</ul>
				<br/>
				<ul class="results">
					<li class="labels"><div class="one">каса</div></li>
					<li><div class="one"><?php echo round($zone3_percent) . "%"; ?></div></li>
					<li><div class="one"><?php echo $target3; ?></div></li>
				</ul>
				<br/>
				<ul class="results">
					<li class="labels"><div class="one">витрина</div></li>
					<li><div class="one"><?php echo round($zone4_percent) . "%"; ?></div></li>
					<li><div class="one"><?php echo $target4; ?></div></li>
				</ul>
				<br/>
				<ul class="results">
					<li class="labels"><div class="one">свободен достъп</div></li>
					<li><div class="one"><?php echo round($zone5_percent) . "%"; ?></div></li>
					<li><div class="one"><?php echo $target5; ?></div></li>
				</ul>
			</div>
		</div>

	</div>

	<br clear="all" />
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 footer" style="height: 5px">
			<article>
				&nbsp;
			</article>
		</div><!-- /.col-lg-12 -->
	</div>
</div>

</body>
</html>
