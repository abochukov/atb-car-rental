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

    $file_ending = "xls";


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
        padding-top: 80px;
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
                    <!--
                    <ul class="nav child_menu">
                      <li><a href="index.html">Администратор</a></li>
                      <li><a href="index2.html">Потребители</a></li>
                      
                    </ul>
                    -->
                  </li>
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
                   <li><a href="pharmacy.php"> Аптеки<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                   <li><a href="zones.php"> Редакция Зони<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                   <li><a href="pictures.php"> Снимки<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                    <ul class="nav child_menu">
                  <!--
                  <li><a><i class="fa fa-table"></i> Галерия <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Регулярни</a></li>
                      <li><a href="tables_dynamic.html">ТОП</a></li>
                      <li><a href="tables_dynamic.html">Конкуренти</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Таргети <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  -->
                </ul>
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
          
          <br/><br/>

            <?php 
              $from_date = $_POST['from_date'];
              $to_date = $_POST['to_date'];
              include_once "PHPExcel.php";
              //include_once 'Autoloader.php';
              
              $query = "SELECT a.date_upld AS data, a.zone, a.mode, a.date_upld,
                        c.city AS city, 
                        z.zone AS zone,
                        m.mode AS mode, 
                        b.brand AS brand, 
                        t.type AS type, 
                        g.country AS grad, 
                        s.statename AS kod, 
                        c.segment AS segment,
                        c.pharmid AS pharmid, 
                        u.first_name AS user,
                        p.address AS adres,
                        p.clon AS clon
                        FROM form_upld AS a
                        INNER JOIN zone AS z ON a.zone = z.id
                        INNER JOIN mode_new AS m ON a.mode = m.id
                        INNER JOIN city AS c ON a.pharmacy = c.id
                        INNER JOIN brands AS b ON a.brand = b.id
                        INNER JOIN type AS t ON a.type = t.id
                        INNER JOIN country AS g ON a.city = g.id
                        INNER JOIN state AS s ON a.code = s.id
                        INNER JOIN users AS u ON a.user = u.id
                        INNER JOIN pharmacy AS p ON c.pharmid = p.ID
                        WHERE a.date_upld BETWEEN '$from_date' AND '$to_date'
                        ORDER BY a.id";
              
              //$query = "SELECT * FROM form_upld";
              $result = mysqli_query($conn, $query);

              // Instantiate a new PHPExcel object
              $objPHPExcel = new PHPExcel(); 
              // Set the active Excel worksheet to sheet 0
              $objPHPExcel->setActiveSheetIndex(0); 
              // Initialise the Excel row number
              $rowCount = 1; 
              // Iterate through each result from the SQL query in turn
              // We fetch each database result row into $row in turn
              while($row = mysqli_fetch_array($result)){ 


                  // Set cell An to the "name" column from the database (assuming you have a column called name)
                  //    where n is the Excel row number (ie cell A1 in the first row)
                  $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['data']); 

                  // Set cell Bn to the "age" column from the database (assuming you have a column called age)
                  //    where n is the Excel row number (ie cell A1 in the first row)
                  $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['user']); 

                  $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['zone']); 

                  $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['mode']); 

                  $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['brand']); 

                  $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['type']); 

                  $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['grad']); 

                  $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['kod']); 

                  $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['pharmid']); 
                  $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['city']); 
                  $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['segment']); 
                  $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['adres']); 
                  $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row['clon']); 


                  // Increment the Excel row counter

                  $rowCount++; 
                  
              } 

              // Instantiate a Writer to create an OfficeOpenXML Excel .xlsx file
              $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
              // Write the Excel file to filename some_excel_file.xlsx in the current directory
              $objWriter->save('pdf/some_excel_file.xlsx'); 

              /* GENERATE ZONE 1 */
              /* ======================================= */


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
   
   

              // Instantiate a new PHPExcel object
              $objPHPExcel2 = new PHPExcel(); 
              // Set the active Excel worksheet to sheet 0
              $objPHPExcel2->setActiveSheetIndex(0); 
              // Initialise the Excel row number
              $rowCount2 = 1; 
              // Iterate through each result from the SQL query in turn
              // We fetch each database result row into $row in turn
              while($rowz1 = mysqli_fetch_array($rs_target1)){ 
              		$percent = $rowz1['percent'];
              		$pr = $percent . "%";

                  // Set cell An to the "name" column from the database (assuming you have a column called name)
                  //    where n is the Excel row number (ie cell A1 in the first row)
                  $objPHPExcel2->getActiveSheet()->SetCellValue('A'.$rowCount2, $rowz1['name']); 

                  // Set cell Bn to the "age" column from the database (assuming you have a column called age)
                  //    where n is the Excel row number (ie cell A1 in the first row)
                  $objPHPExcel2->getActiveSheet()->SetCellValue('B'.$rowCount2, $rowz1['obshto']); 

                  $objPHPExcel2->getActiveSheet()->SetCellValue('C'.$rowCount2, $pr); 

                


                  // Increment the Excel row counter

                  $rowCount2++; 
                  
              } 

              // Instantiate a Writer to create an OfficeOpenXML Excel .xlsx file
              $objWriter2 = new PHPExcel_Writer_Excel2007($objPHPExcel2); 
              // Write the Excel file to filename some_excel_file.xlsx in the current directory
              $objWriter2->save('pdf/special_visibility.xlsx'); 
            ?>

            <!-- GENERATE ZONE 2 -->
			<!-- ======================================= -->
             
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
   
   

              // Instantiate a new PHPExcel object
              $objPHPExcel3 = new PHPExcel(); 
              // Set the active Excel worksheet to sheet 0
              $objPHPExcel3->setActiveSheetIndex(0); 
              // Initialise the Excel row number
              $rowCount3 = 1; 
              // Iterate through each result from the SQL query in turn
              // We fetch each database result row into $row in turn
              while($rowz2 = mysqli_fetch_array($rs_target2)){ 
              		$percent2 = $rowz2['percent2'];
              		$pr2 = $percent2 . "%";

                  // Set cell An to the "name" column from the database (assuming you have a column called name)
                  //    where n is the Excel row number (ie cell A1 in the first row)
                  $objPHPExcel3->getActiveSheet()->SetCellValue('A'.$rowCount3, $rowz2['name2']); 

                  // Set cell Bn to the "age" column from the database (assuming you have a column called age)
                  //    where n is the Excel row number (ie cell A1 in the first row)
                  $objPHPExcel3->getActiveSheet()->SetCellValue('B'.$rowCount3, $rowz2['obshto2']); 

                  $objPHPExcel3->getActiveSheet()->SetCellValue('C'.$rowCount3, $pr2); 

                


                  // Increment the Excel row counter

                  $rowCount3++; 
                  
              } 

              // Instantiate a Writer to create an OfficeOpenXML Excel .xlsx file
              $objWriter3 = new PHPExcel_Writer_Excel2007($objPHPExcel3); 
              // Write the Excel file to filename some_excel_file.xlsx in the current directory
              $objWriter3->save('pdf/raft.xlsx'); 
            ?>

			<!-- GENERATE ZONE 3 -->
			<!-- ======================================= -->
             
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
   
   

              // Instantiate a new PHPExcel object
              $objPHPExcel4 = new PHPExcel(); 
              // Set the active Excel worksheet to sheet 0
              $objPHPExcel4->setActiveSheetIndex(0); 
              // Initialise the Excel row number
              $rowCount4 = 1; 
              // Iterate through each result from the SQL query in turn
              // We fetch each database result row into $row in turn
              while($rowz3 = mysqli_fetch_array($rs_target3)){ 
              		$percent3 = $rowz3['percent3'];
              		$pr3 = $percent3 . "%";

                  // Set cell An to the "name" column from the database (assuming you have a column called name)
                  //    where n is the Excel row number (ie cell A1 in the first row)
                  $objPHPExcel4->getActiveSheet()->SetCellValue('A'.$rowCount4, $rowz3['name3']); 

                  // Set cell Bn to the "age" column from the database (assuming you have a column called age)
                  //    where n is the Excel row number (ie cell A1 in the first row)
                  $objPHPExcel4->getActiveSheet()->SetCellValue('B'.$rowCount4, $rowz3['obshto3']); 

                  $objPHPExcel4->getActiveSheet()->SetCellValue('C'.$rowCount4, $pr3); 

                


                  // Increment the Excel row counter

                  $rowCount4++; 
                  
              } 

              // Instantiate a Writer to create an OfficeOpenXML Excel .xlsx file
              $objWriter4 = new PHPExcel_Writer_Excel2007($objPHPExcel4); 
              // Write the Excel file to filename some_excel_file.xlsx in the current directory
              $objWriter4->save('pdf/kasa.xlsx'); 
            ?>


			<!-- GENERATE ZONE 4 -->
			<!-- ======================================= -->
             
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
   
   

              // Instantiate a new PHPExcel object
              $objPHPExcel5 = new PHPExcel(); 
              // Set the active Excel worksheet to sheet 0
              $objPHPExcel5->setActiveSheetIndex(0); 
              // Initialise the Excel row number
              $rowCount5 = 1; 
              // Iterate through each result from the SQL query in turn
              // We fetch each database result row into $row in turn
              while($rowz4 = mysqli_fetch_array($rs_target4)){ 
              		$percent4 = $rowz4['percent4'];
              		$pr4 = $percent4 . "%";

                  // Set cell An to the "name" column from the database (assuming you have a column called name)
                  //    where n is the Excel row number (ie cell A1 in the first row)
                  $objPHPExcel5->getActiveSheet()->SetCellValue('A'.$rowCount5, $rowz4['name4']); 

                  // Set cell Bn to the "age" column from the database (assuming you have a column called age)
                  //    where n is the Excel row number (ie cell A1 in the first row)
                  $objPHPExcel5->getActiveSheet()->SetCellValue('B'.$rowCount5, $rowz4['obshto4']); 

                  $objPHPExcel5->getActiveSheet()->SetCellValue('C'.$rowCount5, $pr4); 

                


                  // Increment the Excel row counter

                  $rowCount5++; 
                  
              } 

              // Instantiate a Writer to create an OfficeOpenXML Excel .xlsx file
              $objWriter5 = new PHPExcel_Writer_Excel2007($objPHPExcel5); 
              // Write the Excel file to filename some_excel_file.xlsx in the current directory
              $objWriter5->save('pdf/vitrina.xlsx'); 
            ?>

            <!-- GENERATE ZONE 4 -->
			<!-- ======================================= -->
             
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
   
   

              // Instantiate a new PHPExcel object
              $objPHPExcel6 = new PHPExcel(); 
              // Set the active Excel worksheet to sheet 0
              $objPHPExcel6->setActiveSheetIndex(0); 
              // Initialise the Excel row number
              $rowCount6 = 1; 
              // Iterate through each result from the SQL query in turn
              // We fetch each database result row into $row in turn
              while($rowz5 = mysqli_fetch_array($rs_target5)){ 
              		$percent5 = $rowz5['percent5'];
              		$pr5 = $percent5 . "%";

                  // Set cell An to the "name" column from the database (assuming you have a column called name)
                  //    where n is the Excel row number (ie cell A1 in the first row)
                  $objPHPExcel6->getActiveSheet()->SetCellValue('A'.$rowCount6, $rowz5['name5']); 

                  // Set cell Bn to the "age" column from the database (assuming you have a column called age)
                  //    where n is the Excel row number (ie cell A1 in the first row)
                  $objPHPExcel6->getActiveSheet()->SetCellValue('B'.$rowCount6, $rowz5['obshto5']); 

                  $objPHPExcel6->getActiveSheet()->SetCellValue('C'.$rowCount6, $pr5); 

                


                  // Increment the Excel row counter

                  $rowCount6++; 
                  
              } 

              // Instantiate a Writer to create an OfficeOpenXML Excel .xlsx file
              $objWriter6 = new PHPExcel_Writer_Excel2007($objPHPExcel6); 
              // Write the Excel file to filename some_excel_file.xlsx in the current directory
              $objWriter6->save('pdf/svoboden_dostap.xlsx'); 
            ?>

          <!-- /top tiles -->
        <br />



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


   

  </body>
</html>
