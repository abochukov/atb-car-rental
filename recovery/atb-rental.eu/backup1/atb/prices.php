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
<meta name="keywords" content="Кола под наем, Транспорт, Rent a car, Автомобил, Международен транспорт, Внос, Износ, Пламена, Пламена Райнова, Райнова, Атанас, Внос от Европа" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.11.1.min.js"></script>
 <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>

<link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="js/datepicker-bg.js"></script>

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

<!-- script for datepicker -->
		<script>
			/*
			$(function() {
				$( "#datepicker" ).datepicker();
			  });
			  
			  $(function() {
				$( "#datepicker_return" ).datepicker();
			  });
			  */
			  $(function() {
				  $(".styled-select").datepicker({
					inline: true,
					minDate: 0,
					showOtherMonths: true,
					dateFormat: 'yy-mm-dd',
					dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
				   });
			   });
			   

			 
	  </script>
	 <!-- //script for datepicker -->
	<script>
	$(document).ready(function(){
		/*
		$(".port-grids").hide();
		$(".reservation").click(function() {
			$(".port-grids").show();
		});
		*/
	});
	</script>
	<script>
		$(document).ready(function(){
			$(".options input[type='submit']").click(function() {
				
				var first, second, TakePlace;
				TakePlace = $('#TakePlace option:selected').val();
				ReturnPlace = $('#ReturnPlace option:selected').val();
				
				first = $(".styled-select[name=datepicker1]").val();
				second = $(".styled-select[name=datepicker2]").val();
				
				
				
				//alert(first + " , " + second);
				//first = $(".styled-select[name=datepicker1]").datepicker('getDate');
				//second = $(".styled-select[name=datepicker2]").datepicker('getDate');
				//alert(first + " , " + second);
				
				var start   = $('#datepicker').datepicker('getDate');
				var end = $('#datepicker_return').datepicker('getDate');
				var days   = (end - start)/1000/60/60/24;
								
				if (days<=0) {
					$("#err").html("Въвели сте невалиден период");
				}
				
				else if((days >= 1) && (days <= 3)) {
					
					$(".fromplace").html(TakePlace);
					$(".toplace").html(ReturnPlace);
					$(".fromdate").html(first);
					$(".todate").html(second);
					$(".difference").html(days + "&nbsp;дни");
					$(':checkbox:not(:checked)')
					
					var sum = (days)*25; //broia dni po 15 euro
					if($("#extra1").is(':checked')) {
						var extra1 = (days)*2; //broia dni po 2 euro za bebshko stolche
						$(".sumaExtri").html(extra1 + "&euro;");
					}
					$(".sumaNaem").html(sum + "&euro;");
				}

				else if((days >= 4) && (days <= 6)) {
					
					$(".fromplace").html(TakePlace);
					$(".toplace").html(ReturnPlace);
					$(".fromdate").html(first);
					$(".todate").html(second);
					$(".difference").html(days + "&nbsp;дни");
					$(':checkbox:not(:checked)')
					
					var sum = (days)*20; //broia dni po 15 euro
					if($("#extra1").is(':checked')) {
						var extra1 = (days)*2; //broia dni po 2 euro za bebshko stolche
						$(".sumaExtri").html(extra1 + "&euro;");
					}
					$(".sumaNaem").html(sum + "&euro;");
				}

				else if((days >= 7) && (days <= 14)) {
					
					$(".fromplace").html(TakePlace);
					$(".toplace").html(ReturnPlace);
					$(".fromdate").html(first);
					$(".todate").html(second);
					$(".difference").html(days + "&nbsp;дни");
					$(':checkbox:not(:checked)')
					
					var sum = (days)*18; //broia dni po 15 euro
					if($("#extra1").is(':checked')) {
						var extra1 = (days)*2; //broia dni po 2 euro za bebshko stolche
						$(".sumaExtri").html(extra1 + "&euro;");
					}
					$(".sumaNaem").html(sum + "&euro;");
				}

				else if((days >= 15) && (days <= 29)) {
					
					$(".fromplace").html(TakePlace);
					$(".toplace").html(ReturnPlace);
					$(".fromdate").html(first);
					$(".todate").html(second);
					$(".difference").html(days + "&nbsp;дни");
					$(':checkbox:not(:checked)')
					
					var sum = (days)*15; //broia dni po 15 euro
					if($("#extra1").is(':checked')) {
						var extra1 = (days)*2; //broia dni po 2 euro za bebshko stolche
						$(".sumaExtri").html(extra1 + "&euro;");
					}
					$(".sumaNaem").html(sum + "&euro;");
				}

				else if(days >= 30) {
					
					$(".fromplace").html(TakePlace);
					$(".toplace").html(ReturnPlace);
					$(".fromdate").html(first);
					$(".todate").html(second);
					$(".difference").html(days + "&nbsp;дни");
					$(':checkbox:not(:checked)')
					
					var sum = (days)*13; //broia dni po 15 euro
					if($("#extra1").is(':checked')) {
						var extra1 = (days)*2; //broia dni po 2 euro za bebshko stolche
						$(".sumaExtri").html(extra1 + "&euro;");
					}
					$(".sumaNaem").html(sum + "&euro;");
				}				
				
				//html('FromDay=' + $FromDay + '&FromMonth=' + $FromMonth + '&FromYear='+$FromYear+'"');
				
			});		
		});
	
	</script>
	
	
</head>
<body>
  <div class="header" id="home">
		<div class="container">
		<div class="header-top">
		<div class="top-menu">
		<span class="menu"><img src="images/nav.png" alt=""/> </span>
		<ul>
   	<li><a href="index.html">начало</a></li><label>/</label>
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
		<div class="header-bottom">
	<div class="header-grids">
	<!--
	<div class="col-md-3 header-grid">
	<div class="header-img1 wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
	<img src="images/icon4.png"" class="img-responsive" alt="/">
					<h4>Dolor nunc vule </h4>
					<p>Cras consequat iaculis lorem, id vehicula erat mattis quis. Vivamus laoreet velit justo, in ven e natis purus.</p>
					</div>
					</div>
	-->
	<!--
	<div class="col-md-3 header-grid">
		<div class="header-img2 wow fadeInDownBig animated animated" data-wow-delay="0.4s">
	<img src="images/icon5.png"" class="img-responsive" alt="/">
					<h4>vule Dolor nunc</h4>
					<p>Cras consequat iaculis lorem, id vehicula erat mattis quis. Vivamus laoreet velit justo, in ven e natis purus.</p>
					</div>
					</div>
	-->			
	<!--
	<div class="col-md-3 header-grid">
		<div class="header-img3 wow fadeInUpBig animated animated" data-wow-delay="0.4s">
	<img src="images/icon6.png"" class="img-responsive" alt="/">
					<h4>nunc vule put </h4>
					<p>Cras consequat iaculis lorem, id vehicula erat mattis quis. Vivamus laoreet velit justo, in ven e natis purus.</p>
					</div>
					</div>
	-->
	<!--
					<div class="col-md-3 header-grid">
						<div class="header-img4 wow bounceInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
	<img src="images/icon7.png"" class="img-responsive" alt="/">
					<h4>Cras consequat </h4>
					<p>Cras consequat iaculis lorem, id vehicula erat mattis quis. Vivamus laoreet velit justo, in ven e natis purus.</p>
					</div>
					</div>
	-->
	<div class="clearfix"></div>
	</div>
</div>	
</div>
</div>
		 <div class="content">
			<div class="about-section">
				<div class="container">
					<h3>Suzuki Swift</h3>
				<div class="about-grids">
				
				<div class="col-md-4 about-img wow bounceInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s; " >
						<!--<img src="images/img1.jpg" class="img-responsive" alt="/">-->
						<img src="images/cars/swift1.jpg" class="img-responsive" alt="/" style="float:right;">
				</div>
				
				<div class="col-md-4 about-grid wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
					
				</div>
				
				<div class="col-md-4 about-grid wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
					
				</div>
				
				<div class="clearfix"></div>
				<br/><br/>
				<div class="col-md-12 about-img wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s; " >
						<p>Предлагаме ви автомобил Suzuki Swift - година на производство - 2012г. Автомобила е оборудван с климатик, ел.стъкла, ABS система,
						мултифункционален волан, вздушни възглавници.</p>
				</div>
								
				<div class="clearfix"></div>
				</div>
				
				<div class="about-grids">
				
				<div class="col-md-12 about-img wow bounceInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
					<table width="100%" border="1">
						<tr>
							<th style="text-align:center;">Период</th>
							<th style="text-align:center;">1-3 дни</th>
							<th style="text-align:center;">4-6 дни</th>
							<th style="text-align:center;">7-14 дни</th>
							<th style="text-align:center;">5-29 дни</th>
							<th style="text-align:center;">над 30 дни</th>
						</tr>
						<tr>
							<td style="text-align:center;">Зимен</td>
							<td style="text-align:center;">10 &euro;</td>
							<td style="text-align:center;">10 &euro;</td>
							<td style="text-align:center;">10 &euro;</td>
							<td style="text-align:center;">10 &euro;</td>
							<td style="text-align:center;">10 &euro;</td>
						</tr>
						<tr>
							<td style="text-align:center;">Летен</td>
							<td style="text-align:center;">10 &euro;</td>
							<td style="text-align:center;">10 &euro;</td>
							<td style="text-align:center;">10 &euro;</td>
							<td style="text-align:center;">10 &euro;</td>
							<td style="text-align:center;">10 &euro;</td>
						</tr>
					</table>
				</div>
							
				<div class="clearfix"></div>
				</div>
				<br/><br/>
				<div class="col-md-12 about-img wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s; " >
					<p>Допълнителна информация</p><br/>
					<ul style="list-style-type:none;"> 
						<li>&#10003; Автомобила се предава с пълен резервоар</li>
						<li>&#10003; Автомобила има сключено застраховка автокаско</li>
						<li>&#10003; Платени всички пътни такси за територията на Р България</li>
					</ul>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12 about-img wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s; " >
					<input type="submit" class="reservation" value="Резервирай">
				</div>
				
				<div class="port-grids">
				<div class="port1">
				
						<div class="contact-form-row">
									<div>
										<span>Място на взимане :</span>
										<select name="txtCountry" class="selectBox" id="TakePlace">
											<option value="Летище София">Летище София</option>
											<option value="Летище Варна">Летище Варна</option>
											<option value="Летище Бургас">Летище Бургас</option>
											<option value="Ваш адрес в София">Ваш адрес в София</option>
										</select>
									</div>
									<div>
										<span>Дата на взимане :</span>
										<input type="text" name="datepicker1" id="datepicker" class="styled-select" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
									</div>
									<div>
										<span>Час на вземане :</span>
										
										<select name="txtCountry" class="selectBox">
											<option value="1">00:00</option>
											<option value="2">01:00</option>
											<option value="3">02:00</option>
											<option value="4">03:00</option>
											<option value="5">04:00</option>
											<option value="6">05:00</option>
											<option value="7">06:00</option>
											<option value="8">07:00</option>
											<option value="9">08:00</option>
											<option value="10">09:00</option>
											<option value="11">10:00</option>
											<option value="12">11:00</option>
											<option value="13">12:00</option>
											<option value="14">13:00</option>
											<option value="15">14:00</option>
											<option value="16">15:00</option>
											<option value="17">16:00</option>
											<option value="18">17:00</option>
											<option value="19">18:00</option>
											<option value="20">19:00</option>
											<option value="21">20:00</option>
											<option value="22">21:00</option>
											<option value="25">22:00</option>
											<option value="24">23:00</option>
										</select>
									</div>
									<div class="clearfix"> </div>
								</div>
				</div>			
				<div class="clearfix"></div>
				<div class="port2">				
						<div class="contact-form-row">
									<div>
										<span>Място на връщане :</span>
										<select name="txtCountry" class="selectBox" id="ReturnPlace">
											<option value="Летище София">Летище София</option>
											<option value="Летище Варна">Летище Варна</option>
											<option value="Летище Бургас">Летище Бургас</option>
											<option value="Ваш адрес в София">Ваш адрес в София</option>
										</select>
									</div>
									<div>
										<span>Дата на връщане :</span>
										<input type="text" name="datepicker2" id="datepicker_return" class="styled-select" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
									</div>
									<div>
										<span>Час на връщане :</span>
										
										<select name="txtCountry" class="selectBox">
											<option value="1">00:00</option>
											<option value="2">01:00</option>
											<option value="3">02:00</option>
											<option value="4">03:00</option>
											<option value="5">04:00</option>
											<option value="6">05:00</option>
											<option value="7">06:00</option>
											<option value="8">07:00</option>
											<option value="9">08:00</option>
											<option value="10">09:00</option>
											<option value="11">10:00</option>
											<option value="12">11:00</option>
											<option value="13">12:00</option>
											<option value="14">13:00</option>
											<option value="15">14:00</option>
											<option value="16">15:00</option>
											<option value="17">16:00</option>
											<option value="18">17:00</option>
											<option value="19">18:00</option>
											<option value="20">19:00</option>
											<option value="21">20:00</option>
											<option value="22">21:00</option>
											<option value="25">22:00</option>
											<option value="24">23:00</option>
										</select>
									</div>
									<div class="clearfix"> </div>
								</div>
				</div>	
				<div class="clearfix"></div>
				<br/><br/>
				<div class="port3">				
					<div class="col-md-4 about-img wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s; " >
						<div>
							<span>Допълнително оборудване :</span><br/>
							<table>
							<tr><td><input type="checkbox" name="extra1" id="extra1" class="extra1" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"></td><td width="20"></td><td>Бебешко столче - 2&euro;</td></tr>
							<tr><td><input type="checkbox" name="extra2" id="extra2" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"></td><td width="20"></td><td>Детско столче - 2&euro;</td></tr>
							<tr><td><input type="checkbox" name="extra3" id="extra3" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"></td><td width="20"></td><td>GPS навигационна система - 2&euro;</td></tr>
							<tr><td><input type="checkbox" name="extra4" id="extra4" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"></td><td width="20"></td><td>Доставка в Рамките на София - 0&euro;</td></tr>
							<tr><td><input type="checkbox" name="extra5" id="extra5" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"></td><td width="20"></td><td>Трансфер Летище Варна - 60&euro;</td></tr>
							<tr><td><input type="checkbox" name="extra6" id="extra6" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"></td><td width="20"></td><td>Трансфер Летище Бургас - 70&euro;</td></tr>
							</table>
						</div>
					</div>
					
					<div class="col-md-8 about-img wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s; " >
						<div id="err"></div>
						<p><b>Информация за наем</b></p>
						<table width="100%" border="0">
							
							<tr><td>Място на вземане&nbsp;-&nbsp;<div class="fromplace" style="display:inline;"></div></td></tr>
							<tr><td>Място на връщане&nbsp;-&nbsp;<div class="toplace" style="display:inline;"></div></td></tr>
							<tr height="10"><td></td></tr>
							<tr><td>Дата на вземане&nbsp;-&nbsp;<div class="fromdate" style="display:inline;"></div></td></tr>
							<tr><td>Дата на връщане&nbsp;-&nbsp;<div class="todate" style="display:inline;"></div></td></tr>
							<tr height="10"><td></td></tr>
							<tr><td>Период&nbsp;-&nbsp;<div class="difference" style="display:inline;"></div></td></tr>
							<tr><td>Сума за целия период&nbsp;-&nbsp;<div class="sumaNaem" style="display:inline;"></div></td></tr>
							<tr><td>Допълнително оборудване&nbsp;-&nbsp;<div class="sumaExtri" style="display:inline;"></div></td></tr>
							
						</table>

					</div>
					
				</div>	
				<div class="clearfix"></div>
				
				<div class="options">
					<input type="submit" value="Show">
				</div>
				
				</div>			
				

				
				
				
				<div class="clearfix"></div>
				</div>
		   </div>
		   <!--
		   <div class="service-section">
				<div class="container">
					<h3>our services</h3>
					<div class="service-grids">
					<div class="col-md-4 service-grid wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<img src="images/icon1.png" class="img-responsive" alt="/">
					<h4>Dolor nunc vule putateulr</h4>
					<p>Cras consequat iaculis lorem, id vehicula erat mattis quis. Vivamus laoreet velit justo, in ven e natis purus.Praesent nec sagittis mauris. Fusce convallis nunc neque.Integer egestas.Vivamus laoreet velit justo</p>
					</div>
					<div class="col-md-4 service-grid wow fadeInUpBig animated animated" data-wow-delay="0.4s">
					<img src="images/icon2.png" class="img-responsive" alt="/">
						<h4>Dolor nunc vule putateulr</h4>
						<p>Cras consequat iaculis lorem, id vehicula erat mattis quis. Vivamus laoreet velit justo, in ven e natis purus.Praesent nec sagittis mauris. Fusce convallis nunc neque.Integer egestas.Vivamus laoreet velit justo</p>
						</div>
					<div class="col-md-4 service-grid wow bounceInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<img src="images/icon3.png" class="img-responsive" alt="/">
						<h4>Dolor nunc vule putateulr</h4>
						<p>Cras consequat iaculis lorem, id vehicula erat mattis quis. Vivamus laoreet velit justo, in ven e natis purus.Praesent nec sagittis mauris. Fusce convallis nunc neque.Integer egestas.Vivamus laoreet velit justo</p>
	`					</div>
					<div class="clearfix"></div>
					</div>
		   </div>
		   </div>
		   -->
		   <!--
		   <div class="work-section wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
		   <div class="container">
		   <h3>our latest works</h3>
		   <div class="latest-grids">
		   <div class="latest-grid1">
			  <div class="col-md-3 latest-grid work">
			  	<a href="images/img2.jpg" class="swipebox"><img src="images/img2.jpg" class="img-responsive" alt="/">
		   <div class="textbox">
						<img src="images/magnify.png" class="img-responsive" alt="/">
						</div>
						</div></a>
		      <div class="col-md-3 latest-grid work">
			  	<a href="images/img3.jpg" class="swipebox"><img src="images/img3.jpg" class="img-responsive" alt="/">
		   <div class="textbox">
						<img src="images/magnify.png" class="img-responsive" alt="/">
						</div>
						</div></a>
		      <div class="col-md-3 latest-grid work">
			  	<a href="images/img4.jpg" class="swipebox"><img src="images/img4.jpg" class="img-responsive" alt="/">
		   <div class="textbox">
						<img src="images/magnify.png" class="img-responsive" alt="/">
						</div>
						</div></a>
		      <div class="col-md-3 latest-grid work">
			  	<a href="images/img5.jpg" class="swipebox"><img src="images/img5.jpg" class="img-responsive" alt="/">
		   <div class="textbox">
						<img src="images/magnify.png" class="img-responsive" alt="/">
						</div>
						</div></a>
		   <div class="clearfix"></div>
		   </div>
		   <div class="latest-grid2">
			  <div class="col-md-3 latest-grid work">
			  	<a href="images/img6.jpg" class="swipebox"><img src="images/img6.jpg" class="img-responsive" alt="/">
		   <div class="textbox">
						<img src="images/magnify.png" class="img-responsive" alt="/">
						</div>
						</div></a>
		      <div class="col-md-3 latest-grid work">
			  	<a href="images/img7.jpg" class="swipebox"><img src="images/img7.jpg" class="img-responsive" alt="/">
		   <div class="textbox">
						<img src="images/magnify.png" class="img-responsive" alt="/">
						</div>
						</div></a>
		      <div class="col-md-3 latest-grid work">
			  	<a href="images/img8.jpg" class="swipebox"><img src="images/img8.jpg" class="img-responsive" alt="/">
		  <div class="textbox">
						<img src="images/magnify.png" class="img-responsive" alt="/">
						</div>
						</div></a>
		      <div class="col-md-3 latest-grid work">
			  	<a href="images/img9.jpg" class="swipebox"><img src="images/img9.jpg" class="img-responsive" alt="/">
		   <div class="textbox">
						<img src="images/magnify.png" class="img-responsive" alt="/">
						</div>
						</div></a>
		   <div class="clearfix"></div>
		   </div>
		   <div class="clearfix"></div>
		   </div>
		   </div>
		   </div>
		   -->
		   <!--
		   <div class="news-section">
		   <div class="container">
		   <h3>latest news</h3>
		   <div class="news-grids">
					<div class="col-md-4 news-grid wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<img src="images/img10.jpg" class="img-responsive" alt="/">
					<h4><a href="#">Dolor nunc vule putateulr</a></h4>
					<p class="date">March 23rd, 2015 <a href="#">5 Comments</a></p>
							<p>Praesent vestim molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
                          <a href="#" class="button hvr-shutter-in-vertical">read more</a>
						  </div>
					<div class="col-md-4 news-grid wow fadeInDown Big animated animated" data-wow-delay="0.4s">
					<img src="images/img11.jpg" class="img-responsive" alt="/">
						<h4><a href="#">Dolor nunc vule putateulr</a></h4>
					<p class="date">March 23rd, 2014 <a href="#">5 Comments</a></p>
							<p>Praesent vestim molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
						   <a href="#" class="button hvr-shutter-in-vertical">read more</a>
						</div>
					<div class="col-md-4 news-grid wow bounceInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<img src="images/img12.jpg" class="img-responsive" alt="/">
	        		<h4><a href="#">Dolor nunc vule putateulr</a></h4>
				<p class="date">March 25rd, 2014 <a href="#">5 Comments</a></p>
							<p>Praesent vestim molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
							  <a href="#" class="button hvr-shutter-in-vertical">read more</a>
							</div>
					<div class="clearfix"></div>
					</div>
		   </div>
		   </div>
		   -->
		   </div>
		   <div class="categories-section">
		   <div class="container">
		   <div class="footer-grids">
			<div class="col-md-4 up wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
	  <h3>upcome events</h3>
	  <div class="up1">
	 <div class="up-img">
	 <img src="images/im1.jpg">
	</div>
     <div class="up-text">
		 <a href="#">sagittis magna</a>
		 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		 </div>
		 <div class="clearfix"></div>
         </div>
		  <div class="up1">
	 <div class="up-img">
	 <img src="images/im2.jpg">
	</div>
     <div class="up-text">
		 <a href="#">Integer molest</a>
		 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
	<li>Трансфери</li>
	<li>Автопарк</li>
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

 </body>
</html> 