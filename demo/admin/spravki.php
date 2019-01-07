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

  <script type="text/javascript">
    
    $(document).ready(function() {
 
         //On pressing a key on "Search box" in "search.php" file. This function will be called.
         $('#show_stat').click(function() {


          
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            //alert(conceptName);
            
       
             
                 //AJAX is called.
                 $.ajax({
       
                     //AJAX type is "Post".
                     type: "POST",
       
                     //Data will be sent to "ajax.php".
                     url: "show_spravka.php",
       
                     //Data, that will be sent to "ajax.php". 
                     data: {
                         //Assigning value of "name" into "search" variable.
                         from_date: from_date,
                         to_date: to_date
                     },
       
                     //If result found, this funtion will be called.
                     success: function(html) {
                         //Assigning result to "display" div in "search.php" file.
                         $("#display").html(html).show();
                     }
                 });
           
         }); 
      });
  </script>

  <script type="text/javascript">
    
    $(document).ready(function() {
 
         //On pressing a key on "Search box" in "search.php" file. This function will be called.
         $('#show_stat').click(function() {

            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            //alert(conceptName);
            
       
             
                 //AJAX is called.
                 $.ajax({
       
                     //AJAX type is "Post".
                     type: "POST",
       
                     //Data will be sent to "ajax.php".
                     url: "export.php",
       
                     //Data, that will be sent to "ajax.php". 
                     data: {
                         //Assigning value of "name" into "search" variable.
                         from_date: from_date,
                         to_date: to_date
                     },
       
                     //If result found, this funtion will be called.
                     success: function(html) {
                        //alert('asd');
                         //Assigning result to "display" div in "search.php" file.
                         //$("#display").html(html).show();
                         $('.pokaji_spravkata').show();
                     }
                 });
         }); 
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

                <div class="pokaji_spravkata">
                  <a href="pdf/some_excel_file.xlsx" style="text-decoration: underline;">изтегли справката</a><br/>
                
                </div>
                <br/><br/>
                <input name="from_date" id="from_date" class="from_date" placeholder="начална дата" />
                <input name="to_date" id="to_date" class="to_date" placeholder="крайна дата" />
                <button id="show_stat">Покажи</button>
                <br/>
                <div id="display"></div>
              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 tile_stats_count" style="border: none;">
                <?php    

                  
              ?> 
              </div>  
            </div>


            <div class="row " style="border: none;">
     
              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 tile_stats_count" style="border: none;">
                <?php    

                  
              ?> 
              </div>  
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
