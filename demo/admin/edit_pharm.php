<?php
  session_start();

  if(!isset($_SESSION['username'])){
     header("Location:index.php");
  }

  $username = $_SESSION['username'];
  $user_email = $_SESSION['email'];

  $ids = $_GET['ids'];
  //echo $ids;
  require_once("config.php");

    $query = "SELECT * FROM users ORDER BY first_name";
    $result = mysqli_query($conn, $query);

    $query_header = "SELECT * FROM users WHERE email = '$user_email'";
    $result_header = mysqli_query($conn, $query_header);

    $query_pharm = "SELECT 
          c.id AS nomer,
          c.city AS apteka, 
          c.countryid, 
          c.stateid, 
          c.segment AS segment, 
          c.pharmid AS pharmid,
          c.active AS active, 
          s.statename AS cod, 
          g.country AS grad, 
          p.Address AS adres, 
          p.Clon AS clon
          FROM city AS c
          INNER JOIN state AS s ON c.stateid = s.id
          INNER JOIN country AS g ON c.countryid = g.id
          INNER JOIN pharmacy AS p ON c.pharmid = p.ID
          WHERE c.id = '$ids'";
    $pharm_result = mysqli_query($conn, $query_pharm);   


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

    <link rel="stylesheet" type="text/css" href="fonts/roboto/RobotoRegular.css">



    <script type="text/javascript">
      $(document).ready(function(){
          $('#edit').click(function() {

            var act = $(".r1:checked").val();

            $.ajax({
                type : 'POST',
                url : 'edit_pharmacy_save.php',
                dataType : 'json',
                data: {
                 
                  pharm_name: $('#pharm_name').val(),
                  segment: $('#segment').val(),
                  pharmid: $('#pharmid').val(),
                  ph_id: $('#ph_id').val(),
                  adres: $('#adres').val(),
                  clon: $('#clon').val(),
                  check: act,
                  
                },
      
            success : function(data){
              alert('Успешно корегирахте записа');
              $('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').text(data.msg).show(500);
              if(data.error === false) {
                
                //$('#thanks').css('display', 'block');
                          /*
                var href = $(this).attr('href', url);
                // Delay setting the location for one second
                setTimeout(function() {window.location = href}, 3000);
                return false;
                */
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
                  <li><a> Профили <span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                 
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
        <div class="col-lg-12 col-md-12 col-sm-12">
          <!-- top tiles -->
            <?php
              while ($row_pharmacy = mysqli_fetch_array($pharm_result )) {
                $pharm_name = $row_pharmacy['apteka'];
                $segment = $row_pharmacy['segment'];
                $pharmid = $row_pharmacy['pharmid'];
                $code = $row_pharmacy['cod'];
                $city = $row_pharmacy['grad'];
                $adres =  $row_pharmacy['adres'];
                $clon =  $row_pharmacy['clon'];
                $active =  $row_pharmacy['active'];
                
              }

              echo "<table  border='1' style='display:block; width:100%;'>
                    <tr>  
                      <th>Име на аптеката</th>
                      <th>Сегмент</th>
                      <th>ID на аптеката</th>
                      <th>Адрес</th>
                      <th>Клон</th>
                      <th>Град</th>
                      <th>Код</th>

                    </tr>
                    <tr>
                      <td><input type='text' value='$pharm_name' id='pharm_name'></td>
                      <td><input type='text' value='$segment' id='segment'></td>
                      <td><input type='text' value='$pharmid' id='pharmid'></td>
                      <td><input type='text' value='$adres' id='adres'></td>
                      <td><input type='text' value='$clon' id='clon'></td>
                      <td><input type='text' value='$city' id='city'></td>
                      <td><input type='text' value='$code' id='code'></td>
                      <td><input type='hidden' value='$ids' id='ph_id'></td>
                    </tr>
                    <tr>
                      <td >";
                    ?>
                        <input type='radio' name='r1' value='0' class='r1' <?php if ($active == 0){?> checked="checked" <?php } ?>>
                        <label for='radio1'>деактивиране на аптеката </label>
                      </td>
                      <td >
                        <input type='radio' name='r1' value='1' class='r1' <?php if ($active == 1){?> checked="checked" <?php } ?>>
                        <label for='radio1'>активиране на аптеката </label></td>
                      </td>
                    <?php
                    echo "
                    </tr>
                    <tr>
                      <td colspan='7'><div><a href='#' id='edit'>Запази промените</a></div></td>
                    </tr>
                    </table>
              ";
            ?>
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


    <style>
    input{
      width: 100%;
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

    table tr:nth-child(even) {
      background: #f1f1f1;
    }

    </style>
    

  </body>
</html>
