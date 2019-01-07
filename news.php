<!--
Au<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
  include 'connection.php';

	$sql_active = "SELECT * FROM news ORDER BY ID DESC LIMIT 1";
	$res_active = mysql_query($sql_active);

	$sql = "SELECT * FROM news WHERE ID < (SELECT MAX(ID) FROM news) ORDER BY ID DESC LIMIT 20";
	$res = mysql_query($sql);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Rent A Car</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/news.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />




<meta name="keywords" content="Кола под наем, Транспорт, Rent a car, Автомобил, Международен транспорт, Внос, Износ, Пламена, Пламена Райнова, Райнова, Атанас, Внос от Европа, наем, Rent A Car, наем на кола, кола, автомобил под наем, кола под наем софия , софия наем, кола софия, софия кола наем, изгодно, безплатна доставка, Кола под наем в София, кола под наем от летище София, car rental, rental" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>



<script src="js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

    <style type="text/css">
    	.carousel-inner .active.left { left: -33%; }
		.carousel-inner .next        { left:  33%; }
		.carousel-inner .prev        { left: -33%; }
		.carousel-control.left,.carousel-control.right {background-image:none;}
		.item:not(.prev) {visibility: visible;}
		.item.right:not(.prev) {visibility: hidden;}
		.rightest{ visibility: visible;}
    </style>
<!---- start-smoth-scrolling---->

<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>

	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
<!---End-smoth-scrolling---->

<link rel="stylesheet" href="css/swipebox.css">
			<script src="js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
				</script>
				<!--Animation-->
<script src="js/wow.min.js"></script>
<link href="css/animate.css" rel='stylesheet' type='text/css' />
<script>
	new WOW().init();
</script>
<!---/End-Animation---->
 <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>

<body>
  	<div class="header" id="home">
		<div class="container">
			<div class="header-top">
				<div class="top-menu">
					<span class="menu"><img src="images/nav.png" alt=""/> </span>
						<ul>
						   	<li><a href="index.html" class="active">начало</a></li><label>/</label>
						    <li><a href="about.html">за нас</a></li><label>/</label>
						  	<li><a href="services.html">Условия</a></li><label>/</label>
							<li><a href="products.html">Резервация</a></li><label>/</label>
						   	<!--<li><a href="blog.html">blog</a></li><label>/</label>-->
						   	<li><a href="contact.html">контакти</a></li>
				   		</ul>
			     	
			     		<!-- script for menu -->
							
						 <script>
							 $("span.menu").click(function(){
							 	$(".top-menu ul").slideToggle("slow" , function(){
							 	});
							 });
						 </script>
					<!-- //script for menu -->
		   		</div>
				<div class="search">
						<form>
								<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
								<input type="submit" value="">
						</form>
				</div>
				<div class="clearfix"></div>
		
			</div>

			<div class="logo wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
				<a href="index.html">Rent A Car</a>
			</div>
		
		</div>
	</div>
	<div class="content">
		<div class="news-section">
		   	<div class="container">
		  		<h3>Интересни дестинации</h3>
		   			<div class="news-grids">
		   		        <div class="carousel slide" id="myCarousel">
				          	<div class="carousel-inner">

				                <?php
				                while($row_active=mysql_fetch_assoc($res_active)) {
				                    $id = $row_active['ID'];
				                    $pic = $row_active['Thumb_Image'];
				                    $title = $row_active['Title'];
				                    $date = $row_active['Publish_date'];

				                    $custom_date =  date('d F, Y ', strtotime($row_active['Publish_date']));     

				                    //echo $pic . "<br/>";
				                    echo "
				                       <div class='item active'>
				                          <div class='col-lg-4 col-xs-4 col-md-4 col-sm-4'>
				                              <div class='caption'>
				                                <img src='".$pic."' class='img-responsive' width='480'>
				                              				                              
				                                <h5>".$title."</h5>
				                                <p>".$custom_date."</p>
				                                <a class='btn btn-mini' href='details.php?id=$id'>» Read More</a>
				                              </div>
				                          </div>
				                       </div>
				                    ";
				                  }
				                ?>


				                <?php 
				               
				                  while($row=mysql_fetch_assoc($res)) {
				                  	$id = $row['ID'];
				                    $pic = $row['Thumb_Image'];
				                    $title = $row['Title'];
				                    $date = $row['Publish_date'];

				                    $custom_date =  date('d F, Y ', strtotime($row['Publish_date']));     

				                    //echo $pic . "<br/>";
				                    echo "
				                       <div class='item'>
				                          <div class='col-lg-4 col-xs-4 col-md-4 col-sm-4'>
				                              <div class='caption'>
				                                <img src='".$pic."' class='img-responsive'>
				                              				                              
				                                <h5>".$title."</h5>
				                                <p>".$custom_date."</p>
				                                <a class='btn btn-mini' href='details.php?id=$id'>» Read More</a>
				                              </div>
				                          </div>
				                       </div>
				                    ";
				                  }
				                  
				                ?>

				          	</div>
					        <nav>
						      <ul class="control-box pager">
						        <li><a data-slide="prev" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
						        <li><a data-slide="next" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></li>
						      </ul>
					   		</nav>  
    					</div>
					</div>
			</div>
		</div>

		</div>
		   <div class="categories-section">
		   <div class="container">
		   <div class="footer-grids">
			<div class="col-md-4 up wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
	  <h3>Автопарк</h3>
	  <div class="up1">
			<div class="up-img">
					<img src="images/cars/sw1.png">
			</div>
			 <div class="up-text">
				 <a href="prices.html">Suzuki Swift</a>
				 <p>Автомобил от икономичния клас, предлагащ всички удобства.</p>
			</div>
			<div class="clearfix"></div>
        </div>
		<div class="up1">
			 <div class="up-img">
				<img src="images/cars/as1.png">
			</div>
			<div class="up-text">
				<a href="#">Opel Astra</a>
				<p>Надежден и икономичен автомобил на достъпни цени.</p>
			</div>
			<div class="clearfix"></div>
        </div>
		<div class="up1">
		<div class="up-img">
			<img src="images/im3.jpg">
		</div>
		<div class="up-text">
			 <a href="#">Fusce suscipit</a>
			 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		 </div>
		 <div class="clearfix"></div>
         </div>
		 </div>
		 <div class="col-md-4 cat wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
		   <h3>Categories</h3>
		   <ul>
	<li>Praesent vestim molestie lacus.</li>
	<li>Cras consequat iaculis lorem</li>
	<li>Consectetur adipiscing iaculis</li>
	<li>Lorem ipsum dolor sit</li>
	<li>Cum sociis natoque penatibus et magnis </li>
	<li>Integer molestie lorem</li>
	<li>lorem,Cras consequat iaculis id vehicula</li>
	</ul>
	</div>
		 <div class="col-md-4 cont wow bounceInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
		 <h3>contact</h3>
		 <ul>
		<li><i class="phone"></i></li>
		<li><p>1-000-000-0000</p>
		<p>1-000-000-0000</p></li>
		</ul>
		<ul>
	   <li><i class="smartphone"></i></li>
		<li><p>Seventh Avenue</p>
		<p> Chelsea, Manhattan</p></li>
		</ul>
		<ul>
		<li><i class="message"></i></li>
		<li><a href="mailto:example@mail.com">bcdefg@hijs.dfh</a>
         <a href="mailto:example@mail.com">fjashfaf@jkfs.ckd</a></li>
		</ul>
		</div>
		 <div class="clearfix"></div>
		  </div>
		   </div>
		   </div>
		   <div class="footer-section">
		   <div class="container">
		   <div class="footer-top">
		 <div class="social-icons wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
		<a href="#"><i class="icon1"></i></a>
		<a href="#"><i class="icon2"></i></a>
		<a href="#"><i class="icon3"></i></a>
		<a href="#"><i class="icon4"></i></a>
		</div>
		</div>
		 <div class="footer-middle wow fadeInDown Big animated animated" data-wow-delay="0.4s">
		 <div class="bottom-menu">
      <ul>
   	<li><a href="index.html">home</a></li>
    <li><a href="about.html">About</a></li>
  	<li><a href="services.html">Services</a></li>
	<li><a href="products.html">products</a></li>
   	<li><a href="blog.html">blog</a></li>
   	<li><a href="contact.html">Contact</a></li>
    </ul>
		</div>
		</div>
		<div class="footer-bottom wow bounceInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
									<p> Copyright &copy;2015  All rights  Reserved | Design by<a href="http://w3layouts.com" target="target_blank">W3Layouts</a></p>
									</div>
					<script type="text/javascript">
						$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/
							
							$().UItoTop({ easingType: 'easeOutQuart' });
							
						});
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
				</div>
		   </div>
		   	<script type="text/javascript">
	$('#myCarousel').carousel({
  interval: 40000
});
$('.carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  if (next.next().length>0) {
 
      next.next().children(':first-child').clone().appendTo($(this)).addClass('rightest');
      
  }
  else {
      $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
     
  }
});
	</script>
 </body>
</html> 