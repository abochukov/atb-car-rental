<!--
Au<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
	include '../connection.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Rent A Car</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Кола под наем, Транспорт, Rent a car, Автомобил, Международен транспорт, Внос, Износ, Пламена, Пламена Райнова, Райнова, Атанас, Внос от Европа" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
<script src="../js/jquery-1.11.1.min.js"></script>
 <link rel="stylesheet" href="../css/flexslider.css" type="text/css" media="screen" />
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>

<link rel="stylesheet" type="text/css" href="../fonts/MyriadProRegular/MyriadProRegular_0.css" />
<link rel="stylesheet" href="../css/custom.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="../js/datepicker-bg.js"></script>

 <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
<!---End-smoth-scrolling---->
<link rel="stylesheet" href="../css/swipebox.css">
			<script src="../js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
				</script>
				<!--Animation-->
<script src="../js/wow.min.js"></script>
<link href="../css/animate.css" rel='stylesheet' type='text/css' />
<style type="text/css">
	#err { display:none; }
	.tbl,.rf { display:none; }
	
</style>
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
		
		$(".port-grids").hide();
			
		$(".reservation").click(function() {
			$(".port-grids").show();
			$(".reservation").hide();
		});
		
	});
	</script>
	<!--
	<div><input type="text" id="miasto_vzemane" value=""></div>
							<div><input type="text" id="data_vzemane" value=""></div>
							<div><input type="text" id="chas_vzemane" value=""></div>
							<div><input type="text" id="miasto_vrashtane" value=""></div>
							<div><input type="text" id="data_vrashtane" value=""></div>
							<div><input type="text" id="chas_vrashtane" value=""></div>
							<div><input type="text" id="period_dni" value=""></div>
							<div><input type="text" id="suma_naemane" value=""></div>
							<div><input type="text" id="suma_ekstri" value=""></div>
							<div><input type="text" id="palna_suma" value=""></div>
							<div><input type="submit" id="reservemycar" value="I Want This Car"></div>
	-->
	<script>
		
		$(document).ready(function(){
			$("#reservemycar").click(function() {
		
				$.ajax({
					type : 'POST',
					url : 'sendMail.php',
					dataType : 'json',
					data: {
						PickupPlace: $("#miasto_vzemane").val(),	
						PickupDate: $("#data_vzemane").val(),	
						PickupHour: $("#chas_vzemane").val(),	
						DropPlace: $("#miasto_vrashtane").val(),
						DropDate: $("#data_vrashtane").val(),
						DropHour: $("#chas_vrashtane").val(),
						Period_Days: $("#period_dni").val(),
						Sum_Rent: $("#suma_naemane").val(),
						Sum_Extra: $("#suma_ekstri").val(),
						Sum_All: $("#palna_suma").val(),
						names: $("#names").val(),
						mail: $("#mail").val(),
						phone: $("#phone").val(),
						sendDetails: $("#sendDetails").val(),
						
					},
					
					success : function(data){
							alert("Писмото е изпратено");
					},
			
					error : function(XMLHttpRequest, textStatus, errorThrown) {
						$('#message').removeClass().addClass('error').text('There was an error.').show(500);

					}
			
				});
			});
		});
	</script>
	
	<script>
		
		$(document).ready(function(){
			$(".options input[type='submit']").click(function() {
		
				var start   = $('#datepicker').datepicker('getDate');
				var end = $('#datepicker_return').datepicker('getDate');
				var days   = (end - start)/1000/60/60/24;
				
				$.ajax({
					type : 'POST',
					url : 'save.php',
					dataType : 'json',
					data: {
						start: $(".styled-select[name=datepicker1]").val(),	
						end: $(".styled-select[name=datepicker2]").val(),
					},
					
					success : function(data){
							if(data.msg == "busy" ) {
								//alert ("Автомобила е зает за избрания период");
								$(".tbl").hide();
								$("#err").show("slide", { direction: "left" }, 1000);
							} else if (data.msg == "free") {
								//alert ("Автомобила е свободен за избрания период");
								$(".tbl").show();
								$("#err").hide();
								$(".rf").show();
							}
					},
			
					error : function(XMLHttpRequest, textStatus, errorThrown) {
						$('#message').removeClass().addClass('error').text('There was an error.').show(500);

					}
			
				});
			});
		});
	</script>
	
	<script>
		$(document).ready(function(){
			$(".options input[type='submit']").click(function() {
				
				var first, second, TakePlace;
				TakePlace = $('#TakePlace option:selected').val();
				ReturnPlace = $('#ReturnPlace option:selected').val();
				
				TakeHour = $('#TakeHour option:selected').val();
				ReturnHour = $('#ReturnHour option:selected').val();
				
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
					$(".fromhour").html(TakeHour+"h");
					$(".tohour").html(ReturnHour+"h");
					$(".difference").html(days + "&nbsp;дни");
					$(':checkbox:not(:checked)')
					
					var sum = (days)*25; //broia dni po 15 euro
					var extra1, extra2, extra3, extra4, extra5, extra6;
					
					if($("#extra1").is(':checked')) { var extra1 = (days)*2; } 					
					if ($("#extra1").is(':not(:checked')) { var extra1 = 0; }					
					if($("#extra2").is(':checked')) { var extra2 = (days)*2; }
					if ($("#extra2").is(':not(:checked')) { var extra2 = 0; }										
					if($("#extra3").is(':checked')) { var extra3 = (days)*2; }				
					if ($("#extra3").is(':not(:checked')) { var extra3 = 0; }				
					if($("#extra4").is(':checked')) { var extra4 = (days)*2; }				
					if ($("#extra4").is(':not(:checked')) { var extra4 = 0; }				
					if($("#extra5").is(':checked')) { var extra5 = 130; }					
					if ($("#extra5").is(':not(:checked')) { var extra5 = 0; }			
					if($("#extra6").is(':checked')) { var extra6 = 130; }				
					if ($("#extra6").is(':not(:checked')) { var extra6 = 0; }
					
					var sumaExtri = (extra1 + extra2 + extra3 + extra4 + extra5 + extra6);
					var sumaAll = (sumaExtri + sum);
					
					$(".sumaExtri").html(sumaExtri + "&euro;");			
					$(".sumaNaem").html(sum + "&euro;");
					$(".sumaAll").html(sumaAll + "&euro;");
					
				
										
				}

				else if((days >= 4) && (days <= 6)) {
					
					$(".fromplace").html(TakePlace);
					$(".toplace").html(ReturnPlace);
					$(".fromdate").html(first);
					$(".todate").html(second);
					$(".fromhour").html(TakeHour+"h");
					$(".tohour").html(ReturnHour+"h");
					$(".difference").html(days + "&nbsp;дни");
					$(':checkbox:not(:checked)');
					
					var sum = (days)*20; //broia dni po 15 euro
					var extra1, extra2, extra3, extra4, extra5, extra6;
					
					if($("#extra1").is(':checked')) { var extra1 = (days)*2; } 	
					
					if ($("#extra1").is(':not(:checked')) { var extra1 = 0; }
					
					if($("#extra2").is(':checked')) { var extra2 = (days)*2; }

					if ($("#extra2").is(':not(:checked')) { var extra2 = 0; }					
					
					if($("#extra3").is(':checked')) { var extra3 = (days)*2; }
					
					if ($("#extra3").is(':not(:checked')) { var extra3 = 0; }
					
					if($("#extra4").is(':checked')) { var extra4 = (days)*2; }
					
					if ($("#extra4").is(':not(:checked')) { var extra4 = 0; }
					
					if($("#extra5").is(':checked')) { var extra5 = 130; }
					
					if ($("#extra5").is(':not(:checked')) { var extra5 = 0; }
					
					if($("#extra6").is(':checked')) { var extra6 = 130; }
					
					if ($("#extra6").is(':not(:checked')) { var extra6 = 0; }
					
					var sumaExtri = (extra1 + extra2 + extra3 + extra4 + extra5 + extra6);
					var sumaAll = (sumaExtri + sum);
					
					$(".sumaExtri").html(sumaExtri + "&euro;");			
					$(".sumaNaem").html(sum + "&euro;");
					$(".sumaAll").html(sumaAll + "&euro;");
					
				}

				else if((days >= 7) && (days <= 14)) {
					
					$(".fromplace").html(TakePlace);
					$(".toplace").html(ReturnPlace);
					$(".fromdate").html(first);
					$(".todate").html(second);
					$(".fromhour").html(TakeHour+"h");
					$(".tohour").html(ReturnHour+"h");
					$(".difference").html(days + "&nbsp;дни");
					$(':checkbox:not(:checked)');
					
					var sum = (days)*18; //broia dni po 15 euro
					var extra1, extra2, extra3, extra4, extra5, extra6;
					
					if($("#extra1").is(':checked')) { var extra1 = (days)*2; } 	
					
					if ($("#extra1").is(':not(:checked')) { var extra1 = 0; }
					
					if($("#extra2").is(':checked')) { var extra2 = (days)*2; }

					if ($("#extra2").is(':not(:checked')) { var extra2 = 0; }					
					
					if($("#extra3").is(':checked')) { var extra3 = (days)*2; }
					
					if ($("#extra3").is(':not(:checked')) { var extra3 = 0; }
					
					if($("#extra4").is(':checked')) { var extra4 = (days)*2; }
					
					if ($("#extra4").is(':not(:checked')) { var extra4 = 0; }
					
					if($("#extra5").is(':checked')) { var extra5 = 130; }
					
					if ($("#extra5").is(':not(:checked')) { var extra5 = 0; }
					
					if($("#extra6").is(':checked')) { var extra6 = 130; }
					
					if ($("#extra6").is(':not(:checked')) { var extra6 = 0; }
					
					var sumaExtri = (extra1 + extra2 + extra3 + extra4 + extra5 + extra6);
					var sumaAll = (sumaExtri + sum);
					
					$(".sumaExtri").html(sumaExtri + "&euro;");			
					$(".sumaNaem").html(sum + "&euro;");
					$(".sumaAll").html(sumaAll + "&euro;");
					
					
				}

				else if((days >= 15) && (days <= 29)) {
					
					$(".fromplace").html(TakePlace);
					$(".toplace").html(ReturnPlace);
					$(".fromdate").html(first);
					$(".todate").html(second);
					$(".fromhour").html(TakeHour+"h");
					$(".tohour").html(ReturnHour+"h");
					$(".difference").html(days + "&nbsp;дни");
					$(':checkbox:not(:checked)');
					
					var sum = (days)*15; //broia dni po 15 euro
					var extra1, extra2, extra3, extra4, extra5, extra6;
					
					if($("#extra1").is(':checked')) { var extra1 = (days)*2; } 	
					
					if ($("#extra1").is(':not(:checked')) { var extra1 = 0; }
					
					if($("#extra2").is(':checked')) { var extra2 = (days)*2; }

					if ($("#extra2").is(':not(:checked')) { var extra2 = 0; }					
					
					if($("#extra3").is(':checked')) { var extra3 = (days)*2; }
					
					if ($("#extra3").is(':not(:checked')) { var extra3 = 0; }
					
					if($("#extra4").is(':checked')) { var extra4 = (days)*2; }
					
					if ($("#extra4").is(':not(:checked')) { var extra4 = 0; }
					
					if($("#extra5").is(':checked')) { var extra5 = 130; }
					
					if ($("#extra5").is(':not(:checked')) { var extra5 = 0; }
					
					if($("#extra6").is(':checked')) { var extra6 = 130; }
					
					if ($("#extra6").is(':not(:checked')) { var extra6 = 0; }
					
					var sumaExtri = (extra1 + extra2 + extra3 + extra4 + extra5 + extra6);
					var sumaAll = (sumaExtri + sum);
					
					$(".sumaExtri").html(sumaExtri + "&euro;");			
					$(".sumaNaem").html(sum + "&euro;");
					$(".sumaAll").html(sumaAll + "&euro;");
					
					
				}

				else if(days >= 30) {
					
					$(".fromplace").html(TakePlace);
					$(".toplace").html(ReturnPlace);
					$(".fromdate").html(first);
					$(".todate").html(second);
					$(".fromhour").html(TakeHour+"h");
					$(".tohour").html(ReturnHour+"h");
					$(".difference").html(days + "&nbsp;дни");
					$(':checkbox:not(:checked)');
					
					var sum = (days)*13; //broia dni po 15 euro
					var extra1, extra2, extra3, extra4, extra5, extra6;
					
					if($("#extra1").is(':checked')) { var extra1 = (days)*2; } 	
					
					if ($("#extra1").is(':not(:checked')) { var extra1 = 0; }
					
					if($("#extra2").is(':checked')) { var extra2 = (days)*2; }

					if ($("#extra2").is(':not(:checked')) { var extra2 = 0; }					
					
					if($("#extra3").is(':checked')) { var extra3 = (days)*2; }
					
					if ($("#extra3").is(':not(:checked')) { var extra3 = 0; }
					
					if($("#extra4").is(':checked')) { var extra4 = (days)*2; }
					
					if ($("#extra4").is(':not(:checked')) { var extra4 = 0; }
					
					if($("#extra5").is(':checked')) { var extra5 = 130; }
					
					if ($("#extra5").is(':not(:checked')) { var extra5 = 0; }
					
					if($("#extra6").is(':checked')) { var extra6 = 130; }
					
					if ($("#extra6").is(':not(:checked')) { var extra6 = 0; }
					
					var sumaExtri = (extra1 + extra2 + extra3 + extra4 + extra5 + extra6);
					var sumaAll = (sumaExtri + sum);
					
					$(".sumaExtri").html(sumaExtri + "&euro;");			
					$(".sumaNaem").html(sum + "&euro;");
					$(".sumaAll").html(sumaAll + "&euro;");
					
					
				}
				/* popalvane na hidden poletata za DB i Mail */
				$('#miasto_vzemane').val(TakePlace);
				$('#data_vzemane').val(first);
				$('#chas_vzemane').val(TakeHour);
				$('#miasto_vrashtane').val(ReturnPlace);
				$('#data_vrashtane').val(second);
				$('#chas_vrashtane').val(ReturnHour);
				$('#period_dni').val(days);
				$('#suma_naemane').val(sum);
				$('#suma_ekstri').val(sumaExtri);
				$('#palna_suma').val(sumaAll);
				
					/*
				<div><input type="text" id="miasto_vzemane" value=""></div>
							<div><input type="text" id="data_vzemane" value=""></div>
							<div><input type="text" id="chas_vzemane" value=""></div>
							<div><input type="text" id="miasto_vrashtane" value=""></div>
							<div><input type="text" id="data_vrashtane" value=""></div>
							<div><input type="text" id="chas_vrashtane" value=""></div>
							<div><input type="text" id="period_dni" value=""></div>
							<div><input type="text" id="suma_naemane" value=""></div>
							<div><input type="text" id="suma_ekstri" value=""></div>
							<div><input type="text" id="palna_suma" value=""></div>
				*/
								
				
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
		<span class="menu"><img src="../images/nav.png" alt=""/> </span>
		<ul>
   	<li><a href="../index.php">начало</a></li><label>/</label>
    <li><a href="../about.php">за нас</a></li><label>/</label>
  	<li><a href="../services.php">Условия</a></li><label>/</label>
	<li><a href="../products.php">Резервация</a></li><label>/</label>
   	<!--<li><a href="blog.html">blog</a></li><label>/</label>-->
   	<li><a href="../contact.php">контакти</a></li>
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
					<h3>Opel Astra</h3>
				<div class="about-grids">
				
				<div class="col-md-4 about-grid wow bounceInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s; " >
						<!--<img src="images/img1.jpg" class="img-responsive" alt="/">-->
						<img src="../images/cars/astra.jpg" class="img-responsive" alt="/" style="float:right;">
				</div>
				
				<div class="col-md-4 about-grid wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
						<img src="../images/cars/astra2.jpg" class="img-responsive" alt="/" style="float:right;">
				</div>
				
				<div class="col-md-4 about-grid wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
						<img src="../images/cars/astra3.jpg" class="img-responsive" alt="/" style="float:right;">
				</div>
				
				<div class="clearfix"></div>
				<br/><br/>
				<div class="col-md-12 about-img wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s; " >
						<p>Предлагаме ви автомобил Opel Astra - година на производство - 2011г. Автомобила е оборудван с климатик, ел.стъкла, ABS система,
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
							<td style="text-align:center;">25 &euro;</td>
							<td style="text-align:center;">20 &euro;</td>
							<td style="text-align:center;">18 &euro;</td>
							<td style="text-align:center;">15 &euro;</td>
							<td style="text-align:center;">13 &euro;</td>
						</tr>
						<tr>
							<td style="text-align:center;">Летен</td>
							<td style="text-align:center;">25 &euro;</td>
							<td style="text-align:center;">20 &euro;</td>
							<td style="text-align:center;">18 &euro;</td>
							<td style="text-align:center;">15 &euro;</td>
							<td style="text-align:center;">13 &euro;</td>
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
				<br/>
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
										
										<select name="txtCountry" class="selectBox" id="TakeHour">
											<option value="00:00">00:00</option>
											<option value="01:00">01:00</option>
											<option value="02:00">02:00</option>
											<option value="03:00">03:00</option>
											<option value="04:00">04:00</option>
											<option value="05:00">05:00</option>
											<option value="06:00">06:00</option>
											<option value="07:00">07:00</option>
											<option value="08:00">08:00</option>
											<option value="09:00">09:00</option>
											<option value="10:00">10:00</option>
											<option value="11:00">11:00</option>
											<option value="12:00">12:00</option>
											<option value="13:00">13:00</option>
											<option value="14:00">14:00</option>
											<option value="15:00">15:00</option>
											<option value="16:00">16:00</option>
											<option value="17:00">17:00</option>
											<option value="18:00">18:00</option>
											<option value="19:00">19:00</option>
											<option value="20:00">20:00</option>
											<option value="21:00">21:00</option>
											<option value="22:00">22:00</option>
											<option value="23:00">23:00</option>
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
										
										<select name="txtCountry" class="selectBox" id="ReturnHour">
											<option value="00:00">00:00</option>
											<option value="01:00">01:00</option>
											<option value="02:00">02:00</option>
											<option value="03:00">03:00</option>
											<option value="04:00">04:00</option>
											<option value="05:00">05:00</option>
											<option value="06:00">06:00</option>
											<option value="07:00">07:00</option>
											<option value="08:00">08:00</option>
											<option value="09:00">09:00</option>
											<option value="10:00">10:00</option>
											<option value="11:00">11:00</option>
											<option value="12:00">12:00</option>
											<option value="13:00">13:00</option>
											<option value="14:00">14:00</option>
											<option value="15:00">15:00</option>
											<option value="16:00">16:00</option>
											<option value="17:00">17:00</option>
											<option value="18:00">18:00</option>
											<option value="19:00">19:00</option>
											<option value="20:00">20:00</option>
											<option value="21:00">21:00</option>
											<option value="22:00">22:00</option>
											<option value="23:00">23:00</option>
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
							<tr><td><input type="checkbox" name="extra1" id="extra1" class="extra1" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"></td>
									<td width="20"></td><td>Бебешко столче - 2&euro;</td></tr>
							<tr><td><input type="checkbox" name="extra2" id="extra2" class="extra2" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"></td>
									<td width="20"></td><td>Детско столче - 2&euro;</td></tr>
							<tr><td><input type="checkbox" name="extra3" id="extra3" class="extra3" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"></td>
									<td width="20"></td><td>GPS навигационна система - 2&euro;</td></tr>
							<tr><td><input type="checkbox" name="extra4" id="extra4" class="extra4" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"></td>
									<td width="20"></td><td>Доставка в Рамките на София - 0&euro;</td></tr>
							<tr><td><input type="checkbox" name="extra5" id="extra5" class="extra5" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"></td>
									<td width="20"></td><td>Трансфер Летище Варна - 130&euro;</td></tr>
							<tr><td><input type="checkbox" name="extra6" id="extra6" class="extra6" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"></td>
									<td width="20"></td><td>Трансфер Летище Бургас - 130&euro;</td></tr>
							<tr height="20"><td colspan="3"></div></td></tr>		
							<tr><td colspan="3"><div class="options"><input type="submit" value="Show"></div></td></tr>		
									
							</table>
						</div>
					</div>
					
					<div class="col-md-8 about-img wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s; " >
						
					</div>
					
				</div>	
				<div class="clearfix"></div>
				<br/>
				
				<br/><br/>
				<div class="col-md-6 about-img wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s; " >
					<div id="err" style="color:red;">Автомобила е зает за избрания период</div>
						<div class="tbl">
						<span>Вашият избор :</span><br/>
						<table width="100%" border="1" >
							<!--
							<tr>
								<th><div style="text-align:center">Място на вземане</div></th>
								<th><div style="text-align:center">Място на връщане</div></th>
								<th><div style="text-align:center">Дата на вземане</div></th>
								<th><div style="text-align:center">Дата на връщане</div></th>
								<th><div style="text-align:center">Период</div></th>
								<th><div style="text-align:center">Сума за целия период</div></th>
								<th><div style="text-align:center">Допълнително оборудване</div></th>
							</tr>
							-->
													
							<tr><td width="50%"><div style="text-align:center">Място на вземане</div></td>
									<td align="center" width="50%"><div class="fromplace" style="display:inline;"></div></td></tr>
							<tr><td width="50%"><div style="text-align:center">Място на връщане</div></td>
									<td align="center" width="50%"><div class="toplace" style="display:inline;"></div></td></tr>
							<tr><td width="50%"><div style="text-align:center">Дата на вземане</div></td>
									<td align="center" width="50%"><div class="fromdate" style="display:inline;"></div>&nbsp;/&nbsp;<div class="fromhour" style="display:inline;"></div></td></tr>
							<tr><td width="50%"><div style="text-align:center">Дата на връщане</div></td>
									<td align="center" width="50%"><div class="todate" style="display:inline;"></div>&nbsp;/&nbsp;<div class="tohour" style="display:inline;"></div></td></tr>
							<tr><td width="50%"><div style="text-align:center">Период</div></td>
									<td align="center" width="50%"><div class="difference" style="display:inline;"></div></td></tr>
							<tr><td width="50%"div style="text-align:center">Сума за целия период</div></td>
									<td align="center" width="50%"><div class="sumaNaem" style="display:inline;"></div></td></tr>
							<tr><td width="50%"><div style="text-align:center">Допълнително оборудване</div></td>
									<td align="center" width="50%"><div class="sumaExtri" style="display:inline;"></div></td></tr>
							<tr><td align="center" width="50%"><b>Общо:</b> </td>
									<td align="center" width="50%"><div class="sumaAll" style="display:inline; font-weight:bold;"></b></td></tr>
							
								
							</tr>
							
							<tr><td colspan="7" border="0"><div id="message"></div></td></tr>
							
						</table>
						
						</div> <!-- end tbl -->
				</div>
			</div>			
			
			<div class="col-md-6 about-img wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s; " >
				<div class="rf">
					<form>
							<div><span>Имена</span><input type="text" name="names" class="names" id="names"></div>
							<div><span>Email</span><input type="text" name="mail" class="mail" id="mail"></div>							
							<div><span>Tелефон</span><input type="text" name="phone" class="phones" id="phone"></div>
							<div><span>Подробна информация</span><textarea rows="4" cols="50" id="sendDetails"></textarea></div>
							<div><input type="hidden" id="miasto_vzemane" value=""></div>
							<div><input type="hidden" id="data_vzemane" value=""></div>
							<div><input type="hidden" id="chas_vzemane" value=""></div>
							<div><input type="hidden" id="miasto_vrashtane" value=""></div>
							<div><input type="hidden" id="data_vrashtane" value=""></div>
							<div><input type="hidden" id="chas_vrashtane" value=""></div>
							<div><input type="hidden" id="period_dni" value=""></div>
							<div><input type="hidden" id="suma_naemane" value=""></div>
							<div><input type="hidden" id="suma_ekstri" value=""></div>
							<div><input type="hidden" id="palna_suma" value=""></div>
							<div><input type="submit" id="reservemycar" value="I Want This Car"></div>
					</form>
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
		   
		   <?php include_once '../footer.php';	?>

 </body>
</html> 