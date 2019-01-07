<!--
Au<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Rent A Car</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Cultivation Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>-->
<link href='fonts/Josefin/JosefinSansRegular.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="fonts/MyriadProRegular/MyriadProRegular_0.css" />
<link rel="stylesheet" type="text/css" href="css/custom.css" />
<script src="js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="js/datepicker-bg.js"></script>
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
</head>
<body>
<div class="header head-top " id="home">
  <div class="container">
    <div class="header-top">
    <div class="top-menu">
      <span class="menu"><img src="images/nav.png" alt=""/> </span>
      <ul>
        <li><a href="index.php">Начало</a></li><label>/</label>
        <li><a href="about.php">За Нас</a></li><label>/</label>
        <li><a href="services.php">Условия</a></li><label>/</label>
        <li><a href="products.php" class="active">Резервация</a></li><label>/</label>
        <li><a href="contact.php">Контакти</a></li>
      </ul>
      <script>
        $("span.menu").click(function(){
          $(".top-menu ul").slideToggle("slow" , function(){
          });
        });
      </script>
      <script>
        var defaulttext = $('.defualt-text').text();
        $('.selectDefault').text(defaulttext);
        $('.selectBox').on('change',function(){
           var defaulttext2 = $('.selectBox').find(":selected").text();
        	  $('.selectDefault').text(defaulttext2);
        });
      </script>

    </div>
    <!-- <div class="search">
      <form>
      	<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
      	<input type="submit" value="">
      </form>
    </div> -->
    <div class="clearfix"></div>

    </div>
    <div class="logo logo1">
      <a href="index.php">Rent A Car</a>
    </div>
  </div>
</div>

<div class="content">
  <div class="project-section wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
    <div class="container">
      <h3>Резервация</h3>
      <div class="port-grids">

        <div class="about-grids">
          <div class="col-md-4 about-grid wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
            <a href="1/prices.php"><img src="./images/cars/fiesta1.png" class="img-responsive" alt="/" style="margin-left:10%;" border="0"></a>
          </div>

          <div class="col-md-4 about-grid wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
            <a href="2/prices.php"><img src="./images/cars/golf1.png" class="img-responsive" alt="/" style="margin-left:10%;" border="0"></a>
          </div>

          <div class="col-md-4 about-grid wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
            <a href="3/prices.php"><img src="./images/cars/astraj1.png" class="img-responsive" alt="/" style="margin-left:10%;" border="0"></a>
          </div>

          <div class="clearfix"></div>
          <br/><br/>
        </div>
        <br/>
        <div class="about-grids">

          <div class="col-md-4 about-grid wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
            <a href="1/prices.php"><img src="./images/cars/insignia1.png" class="img-responsive" alt="/" style="margin-left:10%;" border="0"></a>
          </div>

          <div class="col-md-4 about-grid wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
            <a href="2/prices.php"><img src="./images/cars/honda1.jpg" class="img-responsive" alt="/" style="margin-left:10%;" border="0"></a>
          </div>
          <div class="col-md-4 about-grid wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
          </div>

          <div class="clearfix"></div>
          <br/><br/>

        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once 'footer.php';	?>

</body>
</html>
