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

    $sql_zone = "SELECT * FROM zone";
    $res_zone = mysqli_query($conn, $sql_zone);

    $sql_mode = "SELECT * FROM mode_new WHERE zoneid = '1'";
    $res_mode = mysqli_query($conn, $sql_mode);

    $sql_mode2 = "SELECT * FROM mode_new WHERE zoneid = '2'";
    $res_mode2 = mysqli_query($conn, $sql_mode2);

    $sql_mode3 = "SELECT * FROM mode_new WHERE zoneid = '3'";
    $res_mode3 = mysqli_query($conn, $sql_mode3);

    $sql_mode4 = "SELECT * FROM mode_new WHERE zoneid = '4'";
    $res_mode4 = mysqli_query($conn, $sql_mode4);

    $sql_mode5 = "SELECT * FROM mode_new WHERE zoneid = '5'";
    $res_mode5 = mysqli_query($conn, $sql_mode5)
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


    <script type="text/javascript">
          
          $(document).ready(function(){
             
          });


   
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

      input {
        border: none;
        background: transparent;
      }

      tr:nth-child(even) {background: #f1f1f1}

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
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 tile_stats_count" style="border: none;">
                <table border="1" class="tbl">
                  <tr><th>материал</th><th>активно</th></tr>
                  <h4>special visibility</h4> 
                  <?php
                    while ($row_mode = mysqli_fetch_array($res_mode)) {
                      $active1 = $row_mode['active'];
                      if ($active1 == 1) {$act1 = 'активно';} else {$act1 = 'некативно';}
                      echo "<tr class='my-tr'><td width='70%'><input type='text' id='".$row_mode['id']."' value ='". $row_mode['mode'] ."' data-path='".$row_mode['id']."'></td>";?>
                            <td width='30%' align="center"><input type='checkbox' name='<?php echo $row_mode['id'] ?>' class='ads_Checkbox' value='<?php echo $row_mode['id'] ?>'  id='<?php echo $row_mode['id'] ?>' <?php if ($active1 == 1){?> checked="checked" <?php } ?>></td></tr>
                      <?php   
                    }
                  ?>
                </table>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 tile_stats_count" style="border: none;">
                  <table border="1" class="tbl">
                    <tr><th>материал</th><th>активно</th></tr>
                    <h4>рафт</h4> 
                    <?php
                      while ($row_mode2 = mysqli_fetch_array($res_mode2)) {
                      $active2 = $row_mode2['active'];
                      if ($active2 == 1) {$act2 = 'активно';} else {$act2 = 'некативно';}
                      echo "<tr class='my-tr'><td width='70%'><input type='text' id='".$row_mode2['id']."' value ='". $row_mode2['mode'] ."' data-path='".$row_mode2['id']."'></td>";?>
                            <td width='30%' align="center"><input type='checkbox' value='<?php echo $row_mode2['id'] ?>' name='<?php echo $row_mode2['id'] ?>' id='<?php echo $row_mode2['id'] ?>' <?php if ($active2 == 1){?> checked="checked" <?php } ?>></td></tr>
                      <?php   
                    }
                    ?>
                  </table>
                </div>  

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 tile_stats_count" style="border: none;">
                 <table border="1" class="tbl">
                    <tr><th>материал</th><th>активно</th></tr>
                    <h4>каса</h4> 
                    <?php
                      while ($row_mode3 = mysqli_fetch_array($res_mode3)) {
                      $active3 = $row_mode3['active'];
                      if ($active3 == 1) {$act3 = 'активно';} else {$act3 = 'некативно';}
                      echo "<tr class='my-tr'><td width='70%'><input type='text' id='".$row_mode3['id']."' value ='". $row_mode3['mode'] ."' data-path='".$row_mode3['id']."'></td>";?>
                            <td width='30%' align="center"><input type='checkbox' value='<?php echo $row_mode3['id'] ?>' name='<?php echo $row_mode3['id'] ?>' id='<?php echo $row_mode3['id'] ?>' <?php if ($active3 == 1){?> checked="checked" <?php } ?>></td></tr>
                      <?php   
                    }
                    ?>
                  </table>
                </div>  
            </div>
            <div class="row " style="border: none;">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 tile_stats_count" style="border: none;">
                 <table border="1" class="tbl">
                    <tr><th>материал</th><th>активно</th></tr>
                    <h4>витрина</h4> 
                     <?php
                      while ($row_mode4 = mysqli_fetch_array($res_mode4)) {
                      $active4 = $row_mode4['active'];
                      if ($active4 == 1) {$act4 = 'активно';} else {$act4 = 'некативно';}
                      echo "<tr class='my-tr'><td width='70%'><input type='text' id='".$row_mode4['id']."' value ='". $row_mode4['mode'] ."' data-path='".$row_mode4['id']."'></td>";?>
                            <td width='30%' align="center"><input type='checkbox' value='<?php echo $row_mode4['id'] ?>' name='<?php echo $row_mode4['id'] ?>' id='<?php echo $row_mode4['id'] ?>' <?php if ($active4 == 1){?> checked="checked" <?php } ?>></td></tr>
                      <?php   
                    }
                    ?>
                  </table>
                </div>  

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 tile_stats_count" style="border: none;">
                 <table border="1" class="tbl">
                    <tr><th>материал</th><th>активно</th></tr>
                    <h4>свободен достъп</h4> 
                     <?php
                      while ($row_mode5 = mysqli_fetch_array($res_mode5)) {
                      $active5 = $row_mode5['active'];
                      if ($active5 == 1) {$act5 = 'активно';} else {$act5 = 'некативно';}
                      echo "<tr class='my-tr'><td width='70%'><input type='text' id='".$row_mode5['id']."' value ='". $row_mode5['mode'] ."' data-path='".$row_mode5['id']."'></td>";?>
                            <td width='30%' align="center"><input type='checkbox' value='<?php echo $row_mode5['id'] ?>' name='<?php echo $row_mode5['id'] ?>' id='<?php echo $row_mode5['id'] ?>' <?php if ($active5 == 1){?> checked="checked" <?php } ?>></td></tr>
                      <?php   
                    }
                    ?>
                  </table>
                </div>  

            </div>
        <br />
        <button id="target_btn">ПОТВЪРДИ</button>
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


    

  </body>
</html>
