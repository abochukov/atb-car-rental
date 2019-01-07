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

    $sql_city = "SELECT * FROM country ORDER BY country ASC";
    $res_city = mysqli_query($conn, $sql_city);

    $query_state="SELECT * 
    				FROM state
					WHERE id
					IN (

					SELECT MIN( id ) 
					FROM state
					GROUP BY statename
					)
					ORDER BY statename ASC ";
    $result_state=mysqli_query($conn, $query_state);


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
    <link rel="stylesheet" type="text/css" href="css/admin.css">

    <script type="text/javascript" src="triple_drop.js"></script>

    <style>
    #custom_city, #custom_code, #selectss, i {
      display: none;
    }
    </style>


    <script type="text/javascript">
      $(document).ready(function() {
          function fill(Value) {
 
             //Assigning value to "search" div in "search.php" file.
             $('#search').val(Value);
     
             //Hiding "display" div in "search.php" file.
             $('#display').hide();
 
          }
      });
 
      $(document).ready(function() {
        
         
      });

      $(document).ready(function() {

          $('input:radio[name="r1"]').change(function() {
          	var radio1 = $(this).val();

            if ($(this).val() == '1'){  
             
              $("#custom_city").hide();
              $("#custom_code").hide();
              $("#select1").show();
               $("#selectss").hide();
              $(".choice2").show();
              $("#statediv").show();

            }

            if ($(this).val() == '2'){   
              
              $("#custom_city").show();
              $("#selectss").show();
              $("#select1").hide();
              $("#statediv").hide();
              

            }
          });

          $('input:radio[name="r2"]').change(function() {
            if ($(this).val() == '1'){  
               $("#custom_code").hide();    
              $("#statediv").show();
            }

            if ($(this).val() == '2'){        
               $("#custom_code").show();    
                $("#statediv").hide();
                $("#selectss").hide();
                $(".info").show();
            }
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
                  <li><a href="register2.php"> Профили <span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                  
                  <li><a href="pharmacy.php"> Аптеки<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                  <li><a href="zones2.php"> Зони<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                  <li><a href="zones.php">Видове материали<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                  <li><a href="brands.php">Брандове<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                  <li><a href="pictures.php"> Снимки<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                  <li><a href="spravki.php"> Справки<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>

                    <ul class="nav child_menu">
                  
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
         
          <div id="message"></div>
        
          <!-- /top tiles -->
        <br />
         
         <br/>
            <?php

              //echo "Ани, ако гледаш, Митака сега ще ми нарпави едно дизайнче за тук :).";
              echo "<br/>";
              //echo "Нещо запънах на това, но се оправих, утре ще и записва новите аптеки. При избора на съществуваща аптека не ми излизаше id-то. Сетих се днес, че при добавяне на аптека ще има различни комбинации - примерно нова Аптека на Марешки в София - трябва да изберат и град София и кода на Марешки, иначе ще има 2 кода Марешки в София и 2 града София, единия дибавен от мен, единия от тях. Ако обаче открият аптека с код 'леля Ценка' в Долно Камарци, ще трябва да добавят и нов град и нов код. Ако Долно Камарци го няма, съответно няма да има и код, нали са вързани.<br/><br/><br/><br/><br/><br/>";
              echo "... проверявам го правилно ли записва ....<br/> След всички интервенции записва правилно, при различните вариации. Има ситуация 'въведи нов град - има съществуваща аптека' където се показва списък 'код верига', вместо 'всички вериги', оставям го за утре или понеделник сутрин. ";

            ?>
            <br/><br/>
            <form id="add" action="add_pharm.php" method="post">
              <input type='radio' name='r1' value="1" class='r1' checked>
              <label for="radio1">Избери град от списъка</label>

              <input type='radio' name='r1' value="2" class='r1' >
              <label for="radio1">Въведи нов град </label>

              <br/><br/>


              <select name="country" onChange="getState(this.value)" id="select1" class="">
                <option value="">&#x25CB; населено място</option>
                  <?php while ($row_city=mysqli_fetch_array($res_city)) { ?>
                <option value=<?php echo $row_city['id']?>><span><?php echo $row_city['country']?></span></option>
                <?php } ?>
              </select>
              <input type="text" id="custom_city" name="custom_city" style="width: 30%;" placeholder="въведете нов град"><br/><br/>
              
             

              <br /><br />

               <div class="choice2">
                  <input type='radio' name='r2' value="1" class='r2' checked>
                  <label for="radio1">Има съществуваща верига </label>

                  <input type='radio' name='r2' value="2" class='r2' >
                  <label for="radio1">Няма съществуваща верига </label>
              </div>
              
               <!-- Показва се при нов град -->
              <input type="text" id="custom_code" name="custom_code" style="width: 30%;" placeholder="въведете нов код">

              <!-- Показва се при съществуващ град -->
              
              <select name="selectss" id="selectss" class="">
                <option value="">&#x25CB; всички вериги</option>
                  <?php while ($row_st=mysqli_fetch_array($result_state)) { ?>
                <option value=<?php echo $row_st['statename']?>><span><?php echo $row_st['statename']?></span></option>
                <?php } ?>
              </select>

              <div id="statediv">
                  <select name="state">
                     <option > код верига</option>
                </select>
              </div>
               <br /><br />
				        <div id="pharm_name">
                	<input type="text" name="pharm_name" style="width: 30%;" placeholder="въведете аптека">  
              	</div>
              	<br /><br />
				        <div id="pharm_id">
                	<input type="text" name="pharm_id" style="width: 30%;" placeholder="въведете ID на аптеката">  
              	</div>
              	<br /><br />
				        <div id="pharm_segment">
                	<input type="text" name="pharm_segment" style="width: 30%;" placeholder="въведете сегмент">  
              	</div>
                <br /><br />
                <div id="pharm_adres">
                  <input type="text" name="pharm_adres" style="width: 30%;" placeholder="въведете адрес">  
                </div>
                <br/><br/>  
                <div id="pharm_clon">
                  <input type="text" name="pharm_clon" style="width: 30%;" placeholder="въведете клон">  
                </div>
              
               <br/><br/>
                <label for="test">  
                  <div id="targetLayer">
                  
                  </div>  
                  <p id="filename"></p> 
                </label>


              <br/><br/>
              <button type="submit" class="btnSubmit" style="border: 0; background: transparent; outline: none;" >
                  <img src="../images/upload_btn.png"  alt="submit" />
                </button>
            </form>


        
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
  
    <script type="text/javascript">
      $(document).ready(function (e) {
          $("#add").on('submit',(function(e) {
            e.preventDefault();
            $.ajax({
              url: "add_pharm.php",
              type: "POST",
              data:  new FormData(this),
              contentType: false,
                  cache: false,
              processData:false,
              success: function(data)
                {
                $("#targetLayer").html(data);
                alert('Успешно създадена аптека!');
                },
                error: function() 
                {
                }           
             });
          }));
        });
     </script>

    <?php include 'nav-jq.php'; ?>


   

  </body>
</html>
