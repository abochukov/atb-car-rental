<?php

  include 'connection.php';


  $sql_Title = "select * from walnut_blog ORDER BY Id DESC LIMIT 3";
  $res_Title = mysql_query($sql_Title);

  $sql_Article = "select * from walnut_blog ORDER BY Id DESC LIMIT 3";
  $res_Article = mysql_query($sql_Article);

  $all_title = array();
  while ($row_allTitles = mysql_fetch_array($res_Title)) {
    //$all_Titles = $row_allTitles['Title'];
    array_push($all_title, $row_allTitles);
  }

?>

<!DOCTYPE html>
<!--
Template Name: Jeren
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Ореховата градина</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="icon" href="favicon.ico">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="index.php">Ореховата градина</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.php">начало</a></li>
        <li><a href="pages/full-width.php">продукти</a>
          <ul>
            <li><a href="pages/gallery.html">кои сме ние</a></li>
            <li><a href="pages/full-width.html">блог</a></li>
            <li><a href="pages/sidebar-left.html">контакт</a></li>
            <li><a href="pages/sidebar-right.html">Sidebar Right</a></li>
            <li><a href="pages/basic-grid.html">Basic Grid</a></li>
          </ul>
        </li>
        <li><a href="pages/blog.php">блог</a></li>
        <li><a href="#">контакт</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay" style="background-image:url('images/demo/backgrounds/06.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    
    <div class="flexslider basicslider">
      <ul class="slides">
        <li>
          <!--
          <article>
            <p>Lacinia</p>
            <h3 class="heading">Eleifend tristique lacus</h3>
            <p>Eleifend sagittis cras convallis nisl eget</p>
            <footer><a class="btn" href="#">Nullam porttitor</a></footer>
          </article>
        </li>
        <li>
          <article>
            <p>Pulvinar</p>
            <h3 class="heading">Ornare tortor quisque</h3>
            <p>Odio semper sed euismod mi euismod curabitur</p>
            <footer><a class="btn inverse" href="#">Eget venenatis</a></footer>
          </article>
        </li>
        <li>
          <article>
            <p>Sagittis</p>
            <h3 class="heading">Feugiat blandit erat</h3>
            <p>Convallis nibh nulla nec dictum mi consequat vel</p>
            <footer><a class="btn" href="#">Facilisis vestibulum</a></footer>
          </article>
        </li>
      -->
      </ul>
    </div>
  
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h3 class="heading">Tincidunt phasellus</h3>
      <p>Non risus leo sed eget lobortis risus mauris blandit maximus.</p>
    </div>
    <p class="btmspace-50 justified">Добре дошли! Здравейте, аз се казвам Атанас Бочуков и моя грижа е плодовете на ореховата градина да достигат до вас. На страницата вие 
      ще намерите отбрана селекция орехови ядки с високо качество. Ореховите ядки имат редица полезни качества за човешкия организъм. На страниците на сайта на Ореховата градина ще откриете вкусни и лесни рецепти с орехи, полезна и любопитна информация за орехът и неговото влияние върху човешкото здраве и красота.<br/><br/> Пожелавам ви приятно прекарване на страницата на Ореховата градина.</p>
    <ul class="nospace group center">
      <li class="one_quarter first">
        <article><a href="#"><img src="images/pack.png"></a>
          <h6 class="heading">продукт 1</h6>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="#"><img src="images/pack.png"></a>
          <h6 class="heading">продукт 2</h6>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="#"><img src="images/pack.png"></a>
          <h6 class="heading">продукт 3</h6>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="#"><img src="images/pack.png"></a>
          <h6 class="heading">продукт 4</h6>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay light" style="background-image:url('images/demo/backgrounds/03.png');">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h3 class="heading">Последно от блога</h3>
      <!--<p>Id eros nec finibus convallis nulla curabitur enim est egestas.</p>-->
    </div>
    <ul class="nospace group services">
    	<?php
    	foreach ($all_title as $row_allTitles) {

    			$art = $row_allTitles['Article'];
    			$art_sml = substr($art, 0, 300);

              echo "<li class='one_third'>
              			<article>
              				<h6 class='heading'>" . $row_allTitles['Title'] . "</h6>
              				<p>" . $art_sml ."...</p>
              				<footer><a href='pages/blog.php?id=".$row_allTitles['Id']."'>Read More &raquo;</a></footer>
              			</article>
              		</li>";
            }
        ?>
        <!--
      <li class="one_third first">
        <article><a href="#"><i class="icon fa fa-camera"></i></a>
          <h6 class="heading">Hendrerit bibendum</h6>
          <p>Id erat etiam molestie mi et tincidunt facilisis nulla urna viverra nibh in ullamcorper&hellip;</p>
          <footer><a href="#">Read More &raquo;</a></footer>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="icon fa fa-bank"></i></a>
          <h6 class="heading">Vestibulum suscipit</h6>
          <p>Enim nullam tincidunt tortor eget amet dui duis sed vestibulum velit praesent blandit lorem viverra&hellip;</p>
          <footer><a href="#">Read More &raquo;</a></footer>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="icon fa fa-cny"></i></a>
          <h6 class="heading">Velit eu maximus massa</h6>
          <p>Turpis vel egestas ante etiam maximus placerat placerat aliquam in lectus ut lectus&hellip;</p>
          <footer><a href="#">Read More &raquo;</a></footer>
        </article>
      </li>
      -->
    </ul>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/08.png');">
  <article class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="three_quarter first">
      <h6 class="nospace">Aenean et sollicitudin</h6>
      <p class="nospace">tincidunt tellus sit amet ex blandit cursus sed placerat hendrerit tincidunt</p>
    </div>
    <footer class="one_quarter"><a class="btn" href="#">augue elementum &raquo;</a></footer>
    <!-- ################################################################################################ -->
  </article>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.flexslider-min.js"></script>
</body>
</html>