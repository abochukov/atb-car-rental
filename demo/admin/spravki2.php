<?php
	session_start();

	if(!isset($_SESSION['username'])){
	   header("Location:index.php");
	}

	$username = $_SESSION['username'];
	$user_email = $_SESSION['email'];


	require_once("config.php");

  /*
    if(isset($_POST['submit'])){

        $firstName = $_POST['first_name'];
        $surName = $_POST['surname'];
        $email  = $_POST['email'];
        $password = $_POST['password'];
        
        $options = array("cost"=>4);
        $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        
        $sql = "insert into users (first_name, last_name,email, password) value('".$firstName."', '".$surName."', '".$email."','".$hashPassword."')";

        $result = mysqli_query($conn, $sql);

        if($result)
        {
           echo "Registration successfully";
        }

    }
  */
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

    <title>STING </title>

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
    <script type="text/javascript" src="zone_edit.js"></script>

    <link rel="stylesheet" type="text/css" href="fonts/roboto/RobotoRegular.css">
    <!--<link rel="stylesheet" type="text/css" href="css/admin.css">-->
<!-- date picker -->
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

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
      .user_custom {
        float: right;
        text-align: right;
        margin-right: 60px;
        padding-top: 80px;
      }

      .user_custom span h3 {
        line-height: 70%;
      }

      .user_custom span {
        color: white
      }

      tr:nth-child(even) {background: #f1f1f1}

      .pokaji_spravkata {
        display: none;
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
                  <li><a href="register2.php"> Профили <span class="fa fa-chevron-down" style="color: #f27624;"></span></a>
                    <!--
                    <ul class="nav child_menu">
                      <li><a href="index.html">Администратор</a></li>
                      <li><a href="index2.html">Потребители</a></li>
                      
                    </ul>
                    -->
                  </li>
                  <!--
                  <li><a> Статистика <span class="fa fa-chevron-down" style="color: #f27624;"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">по обекти</a></li>
                      <li><a href="form_advanced.html">по тъговски представители</a></li>
                      <li><a href="form_validation.html">по материали</a></li>
                    </ul>
                  </li>
                  <li><a> Номенклатури<span class="fa fa-chevron-down" style="color: #f27624;"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  -->
                  <li><a href="pharmacy.php"> Аптеки<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                  <li><a href="zones2.php"> Зони<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                  <li><a href="zones.php">Видове материали<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                  <li><a href="brands.php">Брандове<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
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
        <br/>
         <br/><br/>
            
            <div class="row " style="border: none;">
            <?php

              $sql_target1 = "
                  SELECT raiting_zone_1.percent AS percent, 
                         targets_zone1.a1 AS obshto, 
                         targets_zone1.user AS user, 
                         users.first_name AS name
                  FROM raiting_zone_1
                  INNER JOIN targets_zone1 ON raiting_zone_1.userid = targets_zone1.user
                  INNER JOIN users ON raiting_zone_1.userid = users.id
                  WHERE targets_zone1.modeid='0'";
              
              $rs_target1 = mysqli_query($conn,$sql_target1);
              ?>

              <table>
                <tr><th>Потребител</th><th>Зададен таргет</th><th>Покритие</th></tr>
              <?php
              while ($row = mysqli_fetch_assoc($rs_target1)) {
                $percent = $row['percent'];
                $obshto = $row['obshto'];
                $user = $row['name'];
                
                echo "
                  <tr><td>$user</td><td>$obshto</td><td>$percent%</td></tr>
                ";
              }  
              ?>
              </table>

              <?php
                  $sql_target2 = "
                  SELECT raiting_zone_2.percent AS percent2, 
                         targets_zone2.a1 AS obshto2, 
                         targets_zone2.user AS user2, 
                         users.first_name AS name2
                  FROM raiting_zone_2
                  INNER JOIN targets_zone2 ON raiting_zone_2.userid = targets_zone2.user
                  INNER JOIN users ON raiting_zone_2.userid = users.id
                  WHERE targets_zone2.modeid='0'";
              
                $rs_target2 = mysqli_query($conn,$sql_target2);

              ?>
              <br/><br/><br/>
              <p>рафт</p>
              <table>
                <tr><th>Потребител</th><th>Зададен таргет</th><th>Покритие</th></tr>
              <?php
              while ($row2 = mysqli_fetch_assoc($rs_target2)) {
                $percent2 = $row2['percent2'];
                $obshto2 = $row2['obshto2'];
                $user2 = $row2['name2'];
                
                echo "
                  <tr><td>$user2</td><td>$obshto2</td><td>$percent2%</td></tr>
                ";
              }  
              ?>
              </table>

              <?php
                  $sql_target3 = "
                  SELECT raiting_zone_3.percent AS percent3, 
                         targets_zone3.a1 AS obshto3, 
                         targets_zone3.user AS user3, 
                         users.first_name AS name3
                  FROM raiting_zone_3
                  INNER JOIN targets_zone3 ON raiting_zone_3.userid = targets_zone3.user
                  INNER JOIN users ON raiting_zone_3.userid = users.id
                  WHERE targets_zone3.modeid='0'";
              
                $rs_target3 = mysqli_query($conn,$sql_target3);

              ?>
              <br/><br/><br/>
              <p>Каса</p>
              <table>
                <tr><th>Потребител</th><th>Зададен таргет</th><th>Покритие</th></tr>
              <?php
              while ($row3 = mysqli_fetch_assoc($rs_target3)) {
                $percent3 = $row3['percent3'];
                $obshto3 = $row3['obshto3'];
                $user3 = $row3['name3'];
                
                echo "
                  <tr><td>$user3</td><td>$obshto3</td><td>$percent3%</td></tr>
                ";
              }  
              ?>
              </table>


              <?php
                  $sql_target4 = "
                  SELECT raiting_zone_4.percent AS percent4, 
                         targets_zone4.a1 AS obshto4, 
                         targets_zone4.user AS user4, 
                         users.first_name AS name4
                  FROM raiting_zone_4
                  INNER JOIN targets_zone4 ON raiting_zone_4.userid = targets_zone4.user
                  INNER JOIN users ON raiting_zone_4.userid = users.id
                  WHERE targets_zone4.modeid='0'";
              
                $rs_target4 = mysqli_query($conn,$sql_target4);

              ?>
              <br/><br/><br/>
              <p>витрина</p>
              <table>
                <tr><th>Потребител</th><th>Зададен таргет</th><th>Покритие</th></tr>
              <?php
              while ($row4 = mysqli_fetch_assoc($rs_target4)) {
                $percent4 = $row4['percent4'];
                $obshto4 = $row4['obshto4'];
                $user4 = $row4['name4'];
                
                echo "
                  <tr><td>$user4</td><td>$obshto4</td><td>$percent4%</td></tr>
                ";
              }  
              ?>
              </table>

              <?php
                  $sql_target5 = "
                  SELECT raiting_zone_5.percent AS percent5, 
                         targets_zone5.a1 AS obshto5, 
                         targets_zone5.user AS user5, 
                         users.first_name AS name5
                  FROM raiting_zone_5
                  INNER JOIN targets_zone5 ON raiting_zone_5.userid = targets_zone5.user
                  INNER JOIN users ON raiting_zone_5.userid = users.id
                  WHERE targets_zone5.modeid='0'";
              
                $rs_target5 = mysqli_query($conn,$sql_target5);

              ?>
              <br/><br/><br/>
              <p>свободен достъп</p>
              <table>
                <tr><th>Потребител</th><th>Зададен таргет</th><th>Покритие</th></tr>
              <?php
              while ($row5 = mysqli_fetch_assoc($rs_target5)) {
                $percent5 = $row5['percent5'];
                $obshto5 = $row5['obshto5'];
                $user5 = $row5['name5'];
                
                echo "
                  <tr><td>$user5</td><td>$obshto5</td><td>$percent5%</td></tr>
                ";
              }  
              ?>
              </table>

            </div>
            <div class="row " style="border: none;">
                
            </div>
        <br />
        <!--<button id="target_btn">ПОТВЪРДИ</button>-->
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
	


    <?php //include 'nav-jq.php'; ?>


    

  </body>
</html>
