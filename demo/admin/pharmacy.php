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

    $sql_pharmacy = "SELECT DISTINCT (h.city) AS apteka, s.id, s.country AS grad, r.id, r.statename AS code, h.id AS pharm_id
                      FROM country AS s
                      INNER JOIN state AS r ON s.id = r.countryid
                      INNER JOIN city AS h ON r.id = h.stateid";
    $res_pharmacy = mysqli_query($conn, $sql_pharmacy);

    $query_country="SELECT * FROM country ORDER BY country ASC";
    $result_country=mysqli_query($conn, $query_country);


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
    <script type="text/javascript" src="triple_drop.js"></script>

    <link rel="stylesheet" type="text/css" href="fonts/roboto/RobotoRegular.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">


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
 
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#search").keyup(function() {
 
       //Assigning search box value to javascript variable named as "name".
       var name = $('#search').val();
 
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display").html("");
       }
 
       //If name is not empty.
       else {
 
           //AJAX is called.
           $.ajax({
 
               //AJAX type is "Post".
               type: "POST",
 
               //Data will be sent to "ajax.php".
               url: "pharmacy_search.php",
 
               //Data, that will be sent to "ajax.php". 
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name
               },
 
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display").html(html).show();
               }
           });
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

      select {
        font-size: 15px;
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
                  <li><a href="register2.php"> Профили<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                    <!--
                    <ul class="nav child_menu">
                      <li><a href="index.html">Администратор</a></li>
                      <li><a href="index2.html">Потребители</a></li>
                      
                    </ul>
                    -->
                  </li>
                 
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
          <!--
          <br/><br/><br/>
          <div id="message"></div>
          -->
          <!-- /top tiles -->
        <br />
          <!--
         <input type="text" id="search" placeholder="Въеди името на аптеката" />
         <br>
       
         <i>/Въведете име на аптека/</i>
         <br /><br />
          -->
         <!-- Suggestions will be displayed in below div. -->
         <!--<div id="display"></div>-->
         <br/><br/>
         <button onclick="window.location='add_pharmacy.php'">Добавяне на нова аптека</button>
         <br /><br /><br /><br />
          <form id="uploadForm">
             <select name="country" onChange="getState(this.value)" id="select1" class="">
                <option value="">&#x25CB; населено място</option>
                <?php while ($row2=mysqli_fetch_array($result_country)) { ?>
                <option value=<?php echo $row2['id']?>><span><?php echo $row2['country']?></span></option>
                <?php } ?>
            </select>
            <br/><br/>
            <div id="statediv">
              <select name="state">
              <option >&#x25CB; код верига</option>
                </select>
            </div>
            <br/>

            <div id="citydiv">
              <select name="city">
                <option>&#x25CB; име на аптека</option>
              </select>
            </div>
            <br/>
            <button class="btnSubmit" >
                Покажи аптеките
            </button>
            <div id="targetLayer" style="font-size: 15px;"></div>
          </form>

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


    <script type="text/javascript">
      $(document).ready(function (e) {
        $("#uploadForm").on('submit',(function(e) {
          e.preventDefault();
          $.ajax({
                url: "check_pharm.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                  $("#targetLayer").html(data);
                },
                  error: function() 
                {
                }           
           });
        }));
      });
</script>



  </body>
</html>
