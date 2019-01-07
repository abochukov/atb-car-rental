<?php

  include '../connection.php';


  $sql_lastTitle = "select * from walnut_blog ORDER BY Id DESC LIMIT 1";
  $res_lastTitle = mysql_query($sql_lastTitle);

  $sql_lastArticle = "select * from walnut_blog ORDER BY Id DESC LIMIT 1";
  $res_lastArticle = mysql_query($sql_lastArticle);

  $sql_allTitles = "select * from walnut_blog ORDER BY Id DESC LIMIT 10";
  $res_allTitles = mysql_query($sql_allTitles);

  while ($row_lastTitle = mysql_fetch_array($res_lastTitle)) {
    $last_Title = $row_lastTitle['Title'];
  }

  while ($row_lastArticle = mysql_fetch_array($res_lastArticle)) {
    $last_Article = $row_lastArticle['Article'];
  }

  $all_title = array();
  while ($row_allTitles = mysql_fetch_array($res_allTitles)) {
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
<link rel="icon" href="../favicon.ico">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>

    $(document).ready(function() {

        var baseUrl = (window.location).href; // You can also use document.URL
        var id = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);

        $(".basic").hide();
        
        $.ajax({  
          type: "POST",  
          dataType: 'json',
          url: "getArticle.php",
          data: {
          id: id
        },

        success : function(data){
          document.getElementById("title").innerHTML = data[0];
          document.getElementById("article").innerHTML = data[1];
              
        },
      
        error : function(XMLHttpRequest, textStatus, errorThrown) {
          $('#message').removeClass().addClass('error').text('There was an error.').show(500);
          console.log('error');

        }
        });

    });
	
	$(document).ready(function() {
		$(document).on("click",".getArticle",function(e){
		    
        var id = $(this).attr("id");
		    $(".basic").hide();
		    
        $.ajax({  
		    	type: "POST",  
		    	dataType: 'json',
		    	url: "getArticle.php",
		    	data: {
					id: id
				},

		    success : function(data){
				 	document.getElementById("title").innerHTML = data[0];
        	document.getElementById("article").innerHTML = data[1];
        			
				},
			
				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#message').removeClass().addClass('error').text('There was an error.').show(500);
					console.log('error');

				}
		    });
		    
		});
	});

</script>
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="../index.php">Ореховата градина</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li><a href="../index.php">начало</a></li>
        <li><a href="full-width.php">продукти</a>
          <ul>
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="full-width.html">Full Width</a></li>
            <li><a href="sidebar-left.html">Sidebar Left</a></li>
            <li class="active"><a href="sidebar-right.html">Sidebar Right</a></li>
            <li><a href="basic-grid.html">Basic Grid</a></li>
          </ul>
        </li>
        <li class="active"><a href="#">блог</a></li>
        <li><a href="#">контакт</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/09.png');">
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Lorem</a></li>
      <li><a href="#">Ipsum</a></li>
      <li><a href="#">Dolor</a></li>
    </ul>
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
    <div class="content three_quarter first blog-article"> 
      <!-- ################################################################################################ -->
      <h1><?php //echo $last_Title ?></h1>
      <p><?php //echo $last_Article; ?></p>

      <h1 class="basic"><?php echo $last_Title; ?></h1>
      <h1 class="choice"><div id="title"></div></h1>

      <span class="basic"><?php echo $last_Article; ?></span>
      <p class="choice"><div id="article"></div></p>
     
      <!--
      <div id=" comments">
        <h2>Comments</h2>
        <ul>
          <li>
            <article>
              <header>
                <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                <address>
                By <a href="#">A Name</a>
                </address>
                <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
              </header>
              <div class="comcont">
                <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
              </div>
            </article>
          </li>
          <li>
            <article>
              <header>
                <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                <address>
                By <a href="#">A Name</a>
                </address>
                <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
              </header>
              <div class="comcont">
                <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
              </div>
            </article>
          </li>
          <li>
            <article>
              <header>
                <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                <address>
                By <a href="#">A Name</a>
                </address>
                <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
              </header>
              <div class="comcont">
                <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
              </div>
            </article>
          </li>
        </ul>
        <h2>Write A Comment</h2>
        <form action="#" method="post">
          <div class="one_third first">
            <label for="name">Name <span>*</span></label>
            <input type="text" name="name" id="name" value="" size="22" required>
          </div>
          <div class="one_third">
            <label for="email">Mail <span>*</span></label>
            <input type="email" name="email" id="email" value="" size="22" required>
          </div>
          <div class="one_third">
            <label for="url">Website</label>
            <input type="url" name="url" id="url" value="" size="22">
          </div>
          <div class="block clear">
            <label for="comment">Your Comment</label>
            <textarea name="comment" id="comment" cols="25" rows="10"></textarea>
          </div>
          <div>
            <input type="submit" name="submit" value="Submit Form">
            &nbsp;
            <input type="reset" name="reset" value="Reset Form">
          </div>
        </form>
      </div>
    -->
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="sidebar one_quarter"> 
      <!-- ################################################################################################ -->
      <h6>Последни статии</h6>
      <nav class="sdb_holder">
        <?php 
          echo "<ul>";
            foreach ($all_title as $row_allTitles) {
              echo "<li><a href='#' id='".$row_allTitles['Id']."' class='getArticle'>" . $row_allTitles['Title'] . "</a></li>";
            }
          echo "</ul>";
        ?>
      </nav>

      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('../images/demo/backgrounds/08.png');">
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
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>