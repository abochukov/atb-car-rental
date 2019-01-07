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


    $num_rec_per_page=10;
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
    $start_from = ($page-1) * $num_rec_per_page; 

    $sql_pic = "SELECT * FROM form_upld ORDER BY date_upld DESC LIMIT $start_from, $num_rec_per_page";
    $res_pic = mysqli_query($conn, $sql_pic);

    $query_user = "SELECT * FROM users WHERE role ='2' ORDER BY first_name";
    $result_user = mysqli_query($conn, $query_user);    
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
    <script src="js/gallery.js" type="text/javascript"></script>


    <link rel="stylesheet" type="text/css" href="fonts/roboto/RobotoRegular.css">
    <link rel="stylesheet" type="text/css" href="css/admin_gallery.css">




    <script type="text/javascript">

      $(document).ready(function(){
  
  
          $('#top_btn').click(function() {
            
            //$('#waiting').show(0);
            $('#message').hide(0);
            
            var check = $('input:radio[name=r1]:checked').val();
            $.ajax({
              type : 'POST',
              url : 'admin_gallery_edit.php',
              dataType : 'json',
              data: {
                check: check,
                //user: $("#user").val();

              },
              success : function(data){
                alert("Успешно зададена ТОП снимка");

                $('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').text(data.msg).show(500);
                if(data.error === false) {
                  
                }
              },
              
              error : function(XMLHttpRequest, textStatus, errorThrown) {
                $('#message').removeClass().addClass('error').text('There was an error.').show(500);
                alert('fail');
              }
              
            });
            
            return false;
          });
      });  
      </script>
      <!-- show results by users -->
      <script type="text/javascript">

      $(document).ready(function() {
 
         //On pressing a key on "Search box" in "search.php" file. This function will be called.
         $('#show_pic').click(function() {
       
            var conceptName = $('#selectuser').val()
            //alert(conceptName);
            
       
             
                 //AJAX is called.
                 $.ajax({
       
                     //AJAX type is "Post".
                     type: "POST",
       
                     //Data will be sent to "ajax.php".
                     url: "show_table.php",
       
                     //Data, that will be sent to "ajax.php". 
                     data: {
                         //Assigning value of "name" into "search" variable.
                         search: conceptName
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
      <script>
 
      </script>

    <script>
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

        tr:nth-child(even) {background: #f1f1f1} {


       


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
        <br/>
         <br/><br/>
            <div class="row " style="border: none;">  
              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 tile_stats_count" style="border: none;">
                <table border="1" class="tbl">
                <tr><th>дата</th><th>град</th><th>аптека</th><th>потребител</th><th>бранд</th><th>сегмент</th><th>снимка</th><th>направи ТОП</th><th>изтрий</th></tr>

                  <h4>Снимки</h4> 
                  <?php
                    while ($row_pic = mysqli_fetch_array($res_pic)) {
                        $id = $row_pic['id'];
                        $date_upld = $row_pic['date_upld'];
                        $city = $row_pic['city'];
                        $pharmacy = $row_pic['pharmacy'];
                        $brand = $row_pic['brand'];
                        $user = $row_pic['user'];
                        $segment = $row_pic['sgm'];
                        $img = "../" . $row_pic['img'];
                        /*
                        echo "
                            <input type='hidden' value='$user' id='user'>
                            <input type='hidden' value='$pharmacy' id='pharm'>
                            <input type='hidden' value='$brand' id='brand'>
                            <input type='hidden' value='$img' id='img'>
                        ";
                        */

                        $sql_city = "SELECT * FROM country where id = '$city'";
                        $res_city = mysqli_query($conn, $sql_city);
                        while ($row_city=mysqli_fetch_assoc($res_city)) { $grad = $row_city['country']; }

                        $sql_pharm = "SELECT * FROM city where id = '$pharmacy'";
                        $res_pharm = mysqli_query($conn, $sql_pharm);
                        while ($row_pharm=mysqli_fetch_assoc($res_pharm)) { $apteka = $row_pharm['city']; }

                        $sql_user = "SELECT * FROM users where id = '$user'";
                        $res_user = mysqli_query($conn, $sql_user);
                        while ($row_user=mysqli_fetch_assoc($res_user)) { $ptrbl = $row_user['id']; $potrebitel = $row_user['first_name']; }

                        $sql_brand = "SELECT * FROM brands where id = '$brand'";
                        $res_brand = mysqli_query($conn, $sql_brand);
                        while ($row_brand=mysqli_fetch_assoc($res_brand)) { $marka = $row_brand['brand']; }

                      
                      echo "<tr class='my-tr'>
                            <td width='11%'>$date_upld</td>
                            <td width='11%'>$grad</td>
                            <td width='11%'>$apteka</td>
                            <td width='11%'>$potrebitel</td>
                            <td width='11%'>$marka</td>
                            <td width='11%'>$segment</td>
                            <td width='11%'><img src='$img' width='100%;'></td>
                            <td width='11%'><input type='radio' name='r1' value='$id'></td>
                            <td width='11%'><a href='#'  class='del'><i class='glyphicon  glyphicon-trash'></i>&nbsp;</a></td>
                            </tr>";
                         
                    }
                  ?>
                </table>
                <?php
                $sql_pic = "SELECT * FROM form_upld";
                $res_pic = mysqli_query($conn, $sql_pic);
                $total_records = mysqli_num_rows($res_pic);  //count number of records
                $total_pages = ceil($total_records / $num_rec_per_page); 

                echo "<a href='pagination.php?page=1'>".'|<'."</a> "; // Goto 1st page  

                for ($i=1; $i<=$total_pages; $i++) { 
                            echo "<a href='pictures.php?page=".$i."'>".$i."</a> "; 
                }; 
                echo "<a href='pictures.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
                ?>

              </div>
            </div>
          
            <div class="row " style="border: none;">
                
                

            </div>
            <br />
            <button id="top_btn">ПОТВЪРДИ</button>
            <br/><br/><br/>
             <div class="row " style="border: none;">
              

           
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 tile_stats_count" style="border: none;">
                 
                </div>  
            </div>
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
