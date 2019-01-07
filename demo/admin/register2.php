<?php
	session_start();

	if(!isset($_SESSION['username'])){
	   header("Location:index.php");
	}

	$username = $_SESSION['username'];
	$user_email = $_SESSION['email'];


	require_once("config.php");

  
    $query = "SELECT * FROM users ORDER BY first_name";
    $result = mysqli_query($conn, $query);

    $query_header = "SELECT * FROM users WHERE email = '$user_email'";
    $result_header = mysqli_query($conn, $query_header);




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Demo </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

    <script src="ajax/jquery-1.12.3.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="reg.js"></script>

    <link rel="stylesheet" type="text/css" href="fonts/roboto/RobotoRegular.css">


    <script type="text/javascript">
      $(document).ready(function() {
          $('.del').click(function(){  // ... or however you attach to that link
            var row = $(this).closest('tr');
            
            // hide this row first
            row.fadeOut("fast");
            
            // next, get the next TR, see if it is a notes row, and hide it if it is
            var nxt = row.next();
            if (nxt.hasClass('notes_row'))
              nxt.fadeOut("fast");
            
            // stop link
            return false;
          });
      })
    </script>

    <style type="text/css">
      .user_custom {
        float: right;
        text-align: right;
        margin-right: 60px;
        margin-top: -30px;
      }

      .user_custom span h3 {
        line-height: 70%;
      }

      .user_custom span {
        color: white
      }


    </style>

  </head>

  <body class="nav-md">
    
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
             
              <div class="profile_pic">
                <img src="images/transparent.png" alt="..." class="img-circle">
              </div>
              <!--
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $username; ?></h2>
              </div>
              -->
              <div class="user_custom">
                <img src="images/admin_avatar.png"><br/>
                <?php 
                  while ($row = mysqli_fetch_array($result_header)) {
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                  }
                        
                  
                ?>
                <span><h3><?php echo $first_name; ?></h3><h2><?php echo $last_name; ?></h2></span>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br clear="all" />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li><a> Профили <span class="fa fa-chevron-down" style="color: #f27624;"></span></a>          
                  </li>
                  
                
                  <li><a href="pictures.php"> Снимки<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                  <li><a href="spravki.php"> Справки<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                   
    
              </div>
   
            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <br/><br/><br/>
            <a href="../user.php" style="text-decoration: underline; font-size: 16px;">Прегледай потребителската част</a>
          <br/><br/><br/>
          <form >
          <div class="row" style="border: none;">
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count" style="border: none;">
                  <input type="text" name="first_name" value="" placeholder="Име и Фамилия" id="first_name">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count">
                  <input type="text" name="surname" value="" placeholder="Позиция" id="last_name">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count">
                  <input type="text" name="email" value="" placeholder="Email" id="email">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count">
                  <input type="password" name="password" value="" placeholder="Password" id="password">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count">
                  <button type="submit" name="submit" id="reg_profile">Въведи</button>
            </div>
              <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count">
                 
            </div>
          </div>

           <div class="row" style="border: none;">
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count" style="border: none;">
                <input type='radio' name='r1' value="2" class='r1' id='r1' >
                <label for="radio1">Потребител </label>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count">
                <input type='radio' name='r1' value="1" class='r1' id='r1' >
                <label for="radio1">Администратор </label>
            </div>

            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count">
                
            </div>
            
          </div>
          </form>
          <br/><br/>
          <div id="message"></div>
          <br/>

          <!-- /top tiles -->
        <br />
            <?php
                echo"
                 <table class='table borderless'>
                      
                        <tr>

                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                          <th>Role</th>
                          
                          <th>Update</th>
                          <th>Delete</th>
                        </tr>
            
                ";
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['id'];
                    $name = $row['first_name'];
                    $family = $row['last_name'];
                    $email = $row['email'];
                    $role = $row['role'];
                    

                    if ($role == 1) {
                        $rl = 'Администратор';
                    } else {
                        $rl = 'Потребител';
                    }

                    ?>

      

                    <?php
                   // echo $name . "/" . $family ."/". $email . "/" . $rl . "<br/>";
                    echo "
                      <br/>
                   
                        <tr>
                          <td>".$name."</td>
                          <td>".$family."</td>
                          <td>".$email."</td>
                          <td>".$rl."</td>
                          
                          <td><a href='edit_profile.php?id=".$id."'><i class='glyphicon  glyphicon-pencil'></i>&nbsp;</a></td>
                          <td><a href='#' id='".$id."' class='del'><i class='glyphicon  glyphicon-trash'></i>&nbsp;</a></td>
                        </tr>

                   
                    
                    ";
                }
                echo "</table>";

            ?>


        <br />
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
           <!-- Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>-->
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
	


    <?php include 'nav-jq.php'; ?>


    <style>
    #message {
      font-family: 'RobotoRegular';
      font-size: 16px; 
      color: #e88440;
    }
      button {
        padding:5px 15px; 
        background:#3f6eb0;
        color: #fff; 
        border:0 none;
        cursor:pointer;
        -webkit-border-radius: 5px;
        border-radius: 5px; 
        width: 140px;
      }

      input[type=text], input[type=password] {
        border-top: 1px solid #436eb0;
        border-bottom: 1px solid #436eb0;
        border-left: none;
        border-right: none; 
        height: 30px;
        font-family: 'RobotoRegular';
        width: 90%;
        font-size: 15px;
      }

      ::-webkit-input-placeholder {
        text-align: center;
        font-family: 'RobotoRegular';
        font-size: 15px;
      }

      :-moz-placeholder { /* Firefox 18- */
        text-align: center;  
        font-family: 'RobotoRegular';
        font-size: 15px;
      }

      ::-moz-placeholder {  /* Firefox 19+ */
        text-align: center;  
        font-family: 'RobotoRegular';
        font-size: 15px;
      }

      :-ms-input-placeholder {  
        text-align: center; 
        font-family: 'RobotoRegular';
        font-size: 15px;
      }

      .borderless {
        margin-top: 0%;
      }

      .borderless td, .borderless th {
		    border-top: none !important;
		    border-left: none !important;
		    border-right: none !important;
		    border-bottom: 1px solid #3f6eb0 !important;
		}

		.borderless tr {
			margin-top: 20px;
		}

		.glyphicon	{
			color: #e88440;
		}

        label {
         font-family: 'RobotoRegular';
        font-size: 15px;
        font-style: normal;
        font-weight: normal;
        width: 380px;
        color: #009be1;
        text-align: left;
        padding-top: 8px;
              
      }

    input[type=checkbox]:not(old),
      input[type=radio   ]:not(old) {
          
        width   : 27px; height:27px;
        position:absolute;
        margin  : 0;
        padding : 0;
        opacity : 0;  
      }

      input[type=checkbox]:not(old) + label,
      input[type=radio   ]:not(old) + label {
              
        display      : inline-block;
        margin-left  : 0px;
        padding-left : 38px;
        background   : url('images/checkbtn.png') no-repeat 0 0;
        line-height  : 18px;
        height: 28px;
        line-height: 100%;
        color:#3f6eb0;
      }

      input[type=checkbox]:not(old):checked + label{
        background-position : 0 -26px;
      }

      input[type=radio]:not(old):checked + label{
        background-position : 0 -27px;
      }
          
      @media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
        /* IE10+ CSS styles go here */
      label {
         font-family: 'RobotoRegular';
        font-size:16px;
        font-style: normal;
        font-weight: normal;
        width: 300px;
        color: #666;
        text-align: left;
      }
            
      input[type=checkbox]:not(old),
      input[type=radio   ]:not(old) {
            
        width   : 27px; height:27px;
        position:absolute;
        margin  : 0;
        padding : 0;
        opacity : 0;  
      }
      
      input[type=checkbox]:not(old) + label,
      input[type=radio   ]:not(old) + label {
                
        display      : inline-block;
        margin-left  : 0px;
        padding-left : 68px;
        background   : url('images/checkbtn.png') no-repeat 0 0;
        line-height  : 18px;
        height:28px;
        line-height: 100%;
        color:#4d4d4d;
      }

      input[type=checkbox]:not(old):checked + label{
        background-position : 0 -26px;
      }

      input[type=radio]:not(old):checked + label{
        background-position : 0 -26px;
      }
  }

    </style>
    

  </body>
</html>
