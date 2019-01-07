<?php
	session_start();

	if(!isset($_SESSION['username'])){
	   header("Location:index.php");
	}

	$username = $_SESSION['username'];
	$user_email = $_SESSION['email'];

  $id = $_GET['id'];

	require_once("config.php");

  $con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");
  
  if (!$con) {
      die('Could not connect: ' . mysql_error());
  }
  mysqli_select_db($con, 'cookbgco_sting');
  mysqli_set_charset($con,"utf8");

  $query = "SELECT * FROM users WHERE id='$id'";
  $result = mysqli_query($conn, $query);

  $query_t = "SELECT * FROM mode";
  $result_t = mysqli_query($con, $query_t);

  $query_header = "SELECT * FROM users WHERE email = '$user_email'";
  $result_header = mysqli_query($conn, $query_header);

  /* FOR ZONE 1 */
  $query_target = "SELECT mode_new.id, mode_new.mode, targets_zone1.a1
                    FROM mode_new
                    INNER JOIN targets_zone1 ON mode_new.id = targets_zone1.modeid
                    WHERE targets_zone1.zoneid = '1' AND mode_new.active = '1' AND targets_zone1.user = '$id'";
  $result_target_1 = mysqli_query($conn, $query_target);

  /* FOR ZONE 2 */
  $query_target_2 = "SELECT mode_new.id, mode_new.mode, targets_zone2.a1
                    FROM mode_new
                    INNER JOIN targets_zone2 ON mode_new.id = targets_zone2.modeid
                    WHERE targets_zone2.zoneid = '2' AND mode_new.active = '1' AND targets_zone2.user = '$id'";
  $result_target_2 = mysqli_query($conn, $query_target_2);

  /* FOR ZONE 3 */
  $query_target_3 = "SELECT mode_new.id, mode_new.mode, targets_zone3.a1
                    FROM mode_new
                    INNER JOIN targets_zone3 ON mode_new.id = targets_zone3.modeid
                    WHERE targets_zone3.zoneid ='3' AND mode_new.active = '1' AND targets_zone3.user = '$id'";
  $result_target_3 = mysqli_query($conn, $query_target_3);


/* FOR ZONE 4 */
  $query_target_4 = "SELECT mode_new.id, mode_new.mode, targets_zone4.a1
                    FROM mode_new
                    INNER JOIN targets_zone4 ON mode_new.id = targets_zone4.modeid
                    WHERE targets_zone4.zoneid = '4' AND mode_new.active = '1' AND targets_zone4.user = '$id'";
  $result_target_4 = mysqli_query($conn, $query_target_4);

  /* FOR ZONE 5 */
  $query_target_5 = "SELECT mode_new.id, mode_new.mode, targets_zone5.a1
                    FROM mode_new
                    INNER JOIN targets_zone5 ON mode_new.id = targets_zone5.modeid
                    WHERE targets_zone5.zoneid = '5' AND mode_new.active = '1' AND targets_zone5.user = '$id'";
  $result_target_5 = mysqli_query($conn, $query_target_5);

 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Demo</title>

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
    <script type="text/javascript" src="register.js"></script>

    <link rel="stylesheet" type="text/css" href="fonts/roboto/RobotoRegular.css">

    <!--<link href="css/main.css" rel="stylesheet" type="text/css" />-->
    <link href="css/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />
    <!-- add scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.Jcrop.min.js"></script>
    <script src="js/script.js"></script>

    <script src="targets.js"></script>

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

    <script type="text/javascript">
    $(document).ready(function(){
         $(function(){ $('#jcrop_target').Jcrop(); });
    });
    </script>
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
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">

                <ul class="nav side-menu">
                  <li><a href="register2.php"> Профили <span class="fa fa-chevron-down" style="color: #f27624;"> </span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Администратор</a></li>
                      <li><a href="index2.html">Потребители</a></li>
                      
                    </ul>
                  </li>
                
                
                  <li><a href="pictures.php"> Снимки<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
                  <li><a href="spravki.php"> Справки<span class="fa fa-chevron-down" style="color: #f27624;"></span></a></li>
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
        <!-- top navigation -->
       
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <!--
          <div class="row tile_count">
            <div class="col-md-12 col-sm-12 col-xs-12 tile_stats_count">
                 <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <input type="text" name="first_name" value="" placeholder="First Name">
                    <input type="text" name="surname" value="" placeholder="Surname">
                    <input type="text" name="email" value="" placeholder="Email">
                    <input type="password" name="password" value="" placeholder="Password">
     
                    <button type="submit" name="submit">Submit</button>
                </form>
            </div>
            
          </div>
          -->
          <!-- /top tiles -->
        <br />
        <?php
                while ($row = mysqli_fetch_array($result)) {
                    
                    $id = $row['id'];
                    $name = $row['first_name'];
                    $family = $row['last_name'];
                    $email = $row['email'];

                    $role = $row['role'];
                    $region = $row['region'];
                    $img = $row['image'];
                    $description = $row['description'];

                    if ($role == 1) {
                        $rl = 'Администратор';
                    } else {
                        $rl = 'Потребител';
                    }

        ?>
        <aside>
         
         <?php
          echo "<img src='images/circ.png'><br/><br/>";
          echo "<span>" . $name . "</span><br/>";
          echo $family;
         ?>

        </aside>
        

         <div class="row tile_count" s> 
         	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
            
            <?php
                   echo "
                      <ul class='avatars'>
                        <li><img src='".$img."' class='img-responsive img-circle'></li>
                        <li>
                        ";
            ?>
                           <div class="bbody">
                           вече се fit-ва голяма снимка, пробвай :)
                            <!-- upload form -->
                            <form id="upload_form" enctype="multipart/form-data" method="post" action="" onsubmit="return checkForm()">
                              <!-- hidden crop params -->
                              <input type="hidden" id="x1" name="x1" />
                              <input type="hidden" id="y1" name="y1" />
                              <input type="hidden" id="x2" name="x2" />
                              <input type="hidden" id="y2" name="y2" />
                              <!--<h2>Step1: Please select image file</h2>-->
                              <input id='uploadFile' placeholder='&xcirc;&nbsp;&nbsp;Избор на файл' disabled='disabled' />
                              <div class='fileUpload btn '>
                                    <span></span>
                                    <input id="image_file" type="file" name="image_file" class='upload custom-file-input'  onchange="fileSelectHandler()" />
                              </div>

                              <div class="error"></div>
                              <div class="step2">
                              <!--<h2>Step2: Please select a crop region</h2>-->
        
                              <img id="preview"  />
     
                              <div class="info">
                                <label>File size</label> <input type="text" id="filesize" name="filesize" />
                                <label>Type</label> <input type="text" id="filetype" name="filetype" />
                                <label>Image dimension</label> <input type="text" id="filedim" name="filedim" />
                                <label>W</label> <input type="text" id="w" name="w" />
                                <label>H</label> <input type="text" id="h" name="h" />
                              </div>
                              <input type="submit" value="КАЧИ" />
                              </div>
                            </form>
                          </div>
                        </li>
                      </ul>
                 <?php                      
                }
            ?>

            </div>
        </div>

        <?php
        	function uploadImageFile() { // Note: GD library is required for this function
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$iWidth = $iHeight = 270; // desired image result dimensions
					$iJpgQuality = 90;
					if ($_FILES) {
						// if no errors and size less than 
						if (! $_FILES['image_file']['error'] && $_FILES['image_file']['size'] < 113650 * 1024) {
							if (is_uploaded_file($_FILES['image_file']['tmp_name'])) {
							// new unique filename
							$sTempFileName = 'cache/' . md5(time().rand());
							// move uploaded file into cache folder
							move_uploaded_file($_FILES['image_file']['tmp_name'], $sTempFileName);
							
							// change file permission to 644
							@chmod($sTempFileName, 0644);
							if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
								$aSize = getimagesize($sTempFileName); // try to obtain image info
								if (!$aSize) {
									@unlink($sTempFileName);
									return;
								}
								// check for image type
								switch($aSize[2]) {
									case IMAGETYPE_JPEG:
									$sExt = '.jpg';
									// create a new image from file 
									$vImg = @imagecreatefromjpeg($sTempFileName);
									break;
									case IMAGETYPE_PNG:
									$sExt = '.png';
									// create a new image from file 
									$vImg = @imagecreatefrompng($sTempFileName);
									break;
									default:
									@unlink($sTempFileName);
									return;
								}
								// create a new true color image
								$vDstImg = @imagecreatetruecolor( $iWidth, $iHeight );
								// copy and resize part of an image with resampling
								imagecopyresampled($vDstImg, $vImg, 0, 0, (int)$_POST['x1'], (int)$_POST['y1'], $iWidth, $iHeight, (int)$_POST['w'], (int)$_POST['h']);
								// define a result image filename
								$sResultFileName = $sTempFileName . $sExt;
								// output image to file
								imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
								@unlink($sTempFileName);
								return $sResultFileName;

							}
							}
						}
					}
				}
			}
			$sImage = uploadImageFile();
			//echo '<img src="'.$sImage.'" />';
      
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql_img = "UPDATE users SET image='$sImage' WHERE id='$id'";
        $res_img = mysqli_query($con, $sql_img); //or die(mysql_error());

        echo "<div style='font-family: 'RobotoRegular'; color:#e88440; font-size:17px;'>Успешно качена снимка. Oбновете екрана. </div><br/><br/>" ;
      }
      
			
        ?>
        <br clear="all"/>
        <div class="row " style="border: none;">
        	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	         	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count" style="border: none;">
	               	<input type="text" name="first_name" value="<?php echo $name; ?>" placeholder="First Name" id="first_name">
	         	</div>
	         	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count">
	               	<input type="text" name="surname" value="<?php echo $family; ?>" placeholder="Surname" id="last_name">
	         	</div>
	         	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count">
	               	<input type="text" name="email" value="<?php echo $email; ?>" placeholder="Email" id="email">
	         	</div>
	         	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count">
	               	<input type="password" name="password" value="" placeholder="Password" id="password">
	         	</div>
            <input class="hidden" value="<?php echo $id ?>" id="user">
	         	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count">
	               	<button id="edit_profile">Въведи</button>
	         	</div>
              <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count">
                 
            </div>

         	</form>
        </div>
        <br clear="all"/>
        <div class="row" style="border: none;">
        	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count" style="border: none;">
        		<input type='radio' name='r1' value="2" class='r1' id='r1' <?php echo ($role==2 ? 'checked' : '');?> >
			 	<label for="radio1">Потребител </label>
        	</div>
        	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5 tile_stats_count" style="border: none;">
        		<input type='radio' name='r1' value="1" class='r1' id='r1' <?php echo ($role==1 ? 'checked' : '');?>>
			 	<label for="radio1">Администратор </label>
        	</div>
        </div>
       

        <br clear="all"/>
        <div class="row tile_count" style="border: none;">
        	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 tile_stats_count" style="border: none;">
        		<textarea name='<?php echo $description ?>' placeholder="<?php echo $description; ?>" id="description">
              
              <?php echo $description;  ?>
              
            </textarea>
        	</div>
        </div>

        <div class="row " style="border: none;">

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 tile_stats_count" style="border: none;">
            <table border="1" class="tbl">
             
              <h4>special visibility</h4>
              <?php
                while ($row=mysqli_fetch_assoc($result_target_1)) {
                  echo "<tr class='my-tr'><td width='70%'>". $row['mode'] . "</td>
                  		<td width='30%'><input type='text' id='".$row['id']."' name='".$row['id']."' data-path='".$row['id']."' value='".$row['a1']."' ></td></tr>";
                }
              ?>
            </table>
          </div>
    
        
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 tile_stats_count" style="border: none;">
           
             <table border="1" class="tbl">
             <h4>каса</h4>
              <?php
                while ($row3=mysqli_fetch_assoc($result_target_3)) {
                  echo "<tr class='my-tr'><td width='70%'>". $row3['mode'] . "</td>
                      <td width='30%'><input type='text' id='".$row3['id']."' name='".$row3['id']."' data-path='".$row3['id']."' value='".$row3['a1']."' ></td></tr>";
                }
              ?>
            </table>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 tile_stats_count" style="border: none;">
            
            <table border="1" class="tbl">
             <h4>свободен достъп</h4>
              <?php
                while ($row5=mysqli_fetch_assoc($result_target_5)) {
                  echo "<tr class='my-tr'><td width='70%'>". $row5['mode'] . "</td>
                      <td width='30%'><input type='text' id='".$row5['id']."' name='".$row5['id']."' data-path='".$row5['id']."' value='".$row5['a1']."'></td></tr>";
                }
              ?>
            </table>
          </div>
        </div>

        <br clear="all">

        <div class="row " style="border: none;">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 tile_stats_count" style="border: none;">
            <table border="1" class="tbl">
              <h4>витрина</h4> 
              <?php
                while ($row4=mysqli_fetch_assoc($result_target_4)) {
                  echo "<tr class='my-tr'><td width='70%'>". $row4['mode'] . "</td>
                  		<td width='30%'><input type='text' id='".$row4['id']."' name='".$row4['id']."' data-path='".$row4['id']."' value='".$row4['a1']."' ></td></tr>";
                }
              ?>
           
            </table>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 tile_stats_count" style="border: none;">
            <table border="1" class="tbl">
             <h4>рафт</h4>
              <?php
                while ($row2=mysqli_fetch_assoc($result_target_2)) {
                  echo "<tr class='my-tr'><td width='70%'>". $row2['mode'] . "</td>
                      <td width='30%'><input type='text' id='".$row2['id']."' name='".$row2['id']."' data-path='".$row2['id']."' value='".$row2['a1']."'></td></tr>";
                }
              ?>
            </table>
          </div>

          
        </div>

        <br clear="all">

        <div class="row " style="border: none;">
        	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 tile_stats_count" style="border: none;">
            	<input type="hidden" value="<?php echo $id; ?>" id="userid">
            	<button id="target_btn">ПОТВЪРДИ</button>
            	<div id="message"></div>
          </div>
        </div>

        <br clear="all">
     
        <br />
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <!-- Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a> -->
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
	


    <?php //include 'nav-jq.php'; ?>

    <script>
    	/* targget table add spacer */
    	$(function () {
      		$("tr.my-tr").after('<tr class="tr-spacer"/>');
		});

    </script>
    <script type="text/javascript">
      document.getElementById("uploadBtn").onchange = function () {
          document.getElementById("uploadFile").value = this.value;
      };
    </script>

    <style>
    /* targget table style */

    button#target_btn {
    	background: #e77b2d;
    }

    h4 {
    	color: #4f4f4f;
    	font-family: 'RobotoRegular';
    	font-weight: bold;
    }


    table.tbl, tr, td {
    	border: 1px solid #e57326;
    }

    table.tbl input {
    	border: none;

    }

    .tr-spacer
  	{
  	  height: 10px;
      /*border: 1px solid #e57326;*/
  	}

    aside {
        float: right;
        font-family: 'RobotoRegular';
        text-align: right;
        color: #4f4f4f;
        font-size: 17px;
        line-height: 100%;
    }

      aside span {
        font-size: 20px;
      }

      aside p{
        
        color: #e88440;
      }

      .fileUpload {
        position: relative;
        overflow: hidden;
       margin: 10px;
      }

      .fileUpload input.upload {
          position: absolute;
          top: 0;
          right: 0;
          margin: 0;
          padding: 0;
          font-size: 20px;
          cursor: pointer;
          opacity: 0;
          filter: alpha(opacity=0);
          text-align: center;

      } 

      .btn {
        background-image: url('avatars/arrow.jpg');
        background-repeat: no-repeat; 
        width: 40px;
        height: 40px;

      }

      #uploadFile, #image_file {
        border-top: 1px solid blue;
        border-bottom: 1px solid blue;
        border-left: none;
        border-right: none;
        background: transparent;
        height: 40px;

      }

      ::-webkit-input-placeholder {
        text-align: left;
        font-family: 'RobotoRegular';
        font-size: 15px;
      }

      :-moz-placeholder { /* Firefox 18- */
        text-align: left;  
        font-family: 'RobotoRegular';
        font-size: 15px;
      }

      ::-moz-placeholder {  /* Firefox 19+ */
        text-align: left;  
        font-family: 'RobotoRegular';
        font-size: 15px;
      }

      :-ms-input-placeholder {  
        text-align: left; 
        font-family: 'RobotoRegular';
        font-size: 15px;
      }

      ul.avatars {
        list-style-type: none;
        display: flex;
      	align-items: center;
      	margin: 0;
      	padding: 0;
      }

      ul.avatars li {
       	float: left;
       	display: block;
        margin-left: 40px; 
      }

      input[type=submit] {
    		padding:5px 15px; 
    		background:#3f6eb0;
    		color: #fff; 
    		border:0 none;
    		cursor:pointer;
    		-webkit-border-radius: 5px;
    		border-radius: 5px; 
    		width: 160px;
         font-family: 'RobotoRegular';
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

    	textarea {
    		width: 100%;
    		border: 1px solid #436eb0;
    		height: 100px;
        text-align: left;
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
	
  ul.targets {
    list-style-type: none;
  }

  ul.targets li {
    float: left;
  }

  input.label_targets {
    border-top: 1px solid #e88440;
    border-bottom: 1px solid #e88440;
    text-align: left;
  }

  input.target_value {
    border: 1px solid #e88440;
    width: 40%;
    text-align: left;
  }

  .info {
    display: none;
  }

    </style>  

  </body>
</html>
