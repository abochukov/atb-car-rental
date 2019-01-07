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
	<link href="css/profiles.css" rel="stylesheet">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/roboto/RobotoRegular.css">

	<link rel="stylesheet" type="text/css" href="css/dropdown.css" />
	<style>
	
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
		$sql = "SELECT * FROM users WHERE role = '2'";
		$rs = mysqli_query($conn,$sql);

		

	?>	


	
<div class="container-fluid">

		<div id="wrapper">
			<div id="wrapper2"></div>
		<?php
			$x = 0; //
			$i = 0; // Use it to get number of
			$rows = array();
			while($row = mysqli_fetch_array($rs)) 
				
				$rows[] = $row;	
				foreach ($rows as $row){
				    if($x % 3 == 0) 
				    	 echo '<div class="row asd">';
				?>  

				    <div class="col-lg-3 col-md-3 col-sm-3" style="">
				    <a href="user_details.php?id=<? echo $row['id'] ?>">
				    <ul class='users'>
				    	<li class="img">
				        	<img src="<?php echo "admin/" . $row['image']; ?>" class="img-circle" width="87.5%">
				        	<img src="images/avatars-orange.png" class="img-circle" id="avatars">
				        </li>
				        <li class="name">
				        	<span>
					        	<h4><strong><?php echo $row['first_name']; ?></strong></h4>
					        	<h4><?php echo $row['last_name']; ?></h4>
					        </span>
				        </li>
				    </ul>
				    </a>

				    </div>

				<?php
				    $x++;
				    if($x % 3 == 0) echo '</div><br/><br/>';
				}


			?>

		</div> 
	

		<br clear="all" />
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 footer" style="height: 2px">

			</div><!-- /.col-lg-12 -->
		</div>
		<br/><br/><br/><br/><Br/>
</div>
	

	<style>
	/*	
		ul.users {
			list-style-type: none;	
			display: flex;
   			align-items: center;
   			padding: 5%;
		}

		ul.users li {
			float: left;
		}

		ul.users li.img { width: 65%; }
		ul.users li.name { width: 35%; }

		ul.users li span{
			text-align: right;
		}

		.col-md-4 {
			padding-top: 5%;
			padding-bottom: 5%;
		}

		.users {
			
		}
	*/
	</style>
</body>
</html>
