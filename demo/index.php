<?php 
session_start();

require_once("config.php");

if(isset($_POST['submit'])){

	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

	$sql = "select * from users where email = '".$email."'";
	$rs = mysqli_query($conn,$sql);
	$numRows = mysqli_num_rows($rs);

	if($numRows  == 1){
		$row = mysqli_fetch_assoc($rs);
		if(password_verify($password,$row['password']) && $row['role']==1){
			
			$first_name = $row['first_name'];
			$email = $row['email'];
			
			$_SESSION['username'] = $first_name;
			$_SESSION['email'] = $email;
			
			header("Location: admin/register2.php");
			
		}

		elseif (password_verify($password,$row['password']) && $row['role']==2) {
			$first_name = $row['first_name'];
			$email = $row['email'];

			$_SESSION['username'] = $first_name;
			$_SESSION['email'] = $email;

			header("Location: user.php");
			
		}

		else{
			echo "Wrong Password";
		}
	}

	else{
		echo "No User found";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/toaster.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
	<link href="css/user.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="fonts/roboto/RobotoRegular.css">

	<script type="text/javascript">
		/*
		$(document).ready(function() {
		    $('dropdown-toggle').dropdown()
		});
		*/
	</script>

	<script>
		$(document).ready(function() {

			$('.one').on("click", function() {
		        if ($(this).is(':focus')) {
		            $('.user').hide();
		        } else {
		            $(this).focus();
		        }
		    });

		    $('.two').on("click", function() {
		        if ($(this).is(':focus')) {
		            $('.pass').hide();
		        } else {
		            $(this).focus();
		        }
		    });

		})
	</script>

	<style>
		label {
		    position: relative;
		    width: 100%;
		    font-family: 'RobotoRegular';
		    
		}

		label:hover span {
		    display: none;
		    font-family: 'RobotoRegular';
		}

		label:active span {
			display: none;
		}


		span {
			vertical-align: middle;
			height: 100%;
		}
		.title {
			font-family: 'RobotoRegular';
			font-size: 16px;
			font-weight: 100;
			color: #4f4f4f;
		    position: absolute;
		    left: 5px;
		    top:-3px;
		    z-index: 1;
		}

		.symbol {
		    color: #f57723;
		    font-size: 30px;
		    padding-right: 20px;
		    margin-top: -3px;
		    display: inline-block;

		}

	</style>
<body>

<!--
<h1>Login</h1>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<input type="text" name="email" value="" placeholder="Email">
	<input type="password" name="password" value="" placeholder="Password">
	<button type="submit" name="submit">Submit</button>
</form>
-->

<div class="sting-logo" class="img-responsive"><img src="user/images/sting-logo.png" width="70%"></div>
<div class="gsk-logo" class="img-responsive"><img src="user/images/gsk-logo.png" width="70%"></div>
	<div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <!--<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />-->
            <img src="images/avatar_login.png" class="img-responsive avatar">
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                
                <label>
                	<!--<span class="title user"><span class="symbol">&#x25CB;</span>User</span>-->
               		<input type="text" name="email" value="" class="form-control one" placeholder="Email">
               	</label>

               	<label>
               		<!--<span class="title pass"><span class="symbol">&#x25CB;</span>Pass</span>-->
                	<input type="password" name="password" value="" class="form-control two" placeholder="Password">
                </label>

                <!--
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                -->
                <br/>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="submit"><img src="images/entrance_btn.png" class='img-responsive'></button>
            </form><!-- /form -->
            <!--
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
            -->
        </div><!-- /card-container -->

        <br clear="all" />

    </div><!-- /container -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 footer" style="position: absolute; bottom: 5%; height: 5px">
			<article>
				&nbsp;
			</article>
		</div><!-- /.col-lg-12 -->
	</div>
</body>
</html>