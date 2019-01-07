<?php
	session_start();
	$connect = mysqli_connect("localhost", "cookbgco_nakata", "nakata149754na", "cookbgco_grabni");

	// Change character set to utf8
	mysqli_set_charset($connect,"utf8");
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
<meta charset="cp1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="icon" href="../favicon.ico">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="../layout/styles/purchase.css" rel="stylesheet" type="text/css" media="all">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="foggy.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#show_cart").click(function() {
			$(".purchase").show();
			//$(".content").foggy();
		});

		$("#close").click(function(){
			$(".purchase").hide();
		});
	})
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
        <li class="active"><a href="#">продукти</a>
          <ul>
            <li><a href="gallery.html">Gallery</a></li>
            <li class="active"><a href="full-width.html">Full Width</a></li>
            <li><a href="sidebar-left.html">Sidebar Left</a></li>
            <li><a href="sidebar-right.html">Sidebar Right</a></li>
            <li><a href="basic-grid.html">Basic Grid</a></li>
          </ul>
        </li>
        <li><a href="blog.php">блог</a></li>
        <li><a href="#">контакт</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/09.png');">
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear" style=""> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
      <h1> <a href="#" id="show_cart" class="badge">Към кошницата</a> </h1>
      <?php
      	$query = "SELECT * FROM nuts ORDER BY id ASC";
      	$result = mysqli_query($connect, $query);
      	if(mysqli_num_rows($result) > 0) {
      		echo "<ul class='product'>";
      		while ($row = mysqli_fetch_array($result)) {
      			if($row['type'] == '1') {
      			?>

  				<li class="product-item" style="">

		       		<img src="<?php echo $row["image"] ?>" style="width: 200px;">
		       		<p>
		       			<span class="name"><?php echo $row["name"] ?></span>
		       			<span class="price"><?php echo $row["price"] ?> лв.</span>	
		       			<input type="text" name="quantity" id="quantity<?php echo $row["id"] ?>" class="form-control quantity" value="1">
		       			<input type="hidden" name="hidden_name" id="name<?php echo $row["id"] ?>" value="<?php echo $row["name"] ?>">
		       			<input type="hidden" name="hidden_price" id="price<?php echo $row["id"] ?>" value="<?php echo $row["price"] ?>">
		       			<input type="submit" name="add_to_cart" class="add_to_cart" value="Добави в количката" id="<?php echo $row["id"] ?>">
		       		</p>
			    </li>
			    
      			<?php
      			}

      			if($row['type'] == '2') {
      			?>

  				<li class="product-item" style="">
		       		<img src="<?php echo $row["image"] ?>" style="width: 200px;">
		       		<p>
		       			<span><?php echo $row["name"] ?></span>
		       			<span><?php echo $row["price"] ?></span>
		       			<input type="text" name="quantity" id="quantity<?php echo $row["id"] ?>" class="form-control quantity" value="1">
		       			<input type="hidden" name="hidden_name" id="name<?php echo $row["id"] ?>" value="<?php echo $row["name"] ?>">
		       			<input type="hidden" name="hidden_price" id="price<?php echo $row["id"] ?>" value="<?php echo $row["price"] ?>">
		       			<input type="submit" name="add_to_cart" class="add_to_cart" value="Добави в количката" id="<?php echo $row["id"] ?>">
		       		</p>
			    </li>
			    
      			<?php
      			}
      		}
      		echo "</ul>";
      	}
      ?>

      <script>
      	$(document).ready(function(data) {
      		$('.add_to_cart').click(function(){

      			var product_id = $(this).attr('id');
      			var product_name = $('#name'+product_id).val();
      			var product_price = $('#price'+product_id).val();
      			var product_quantity = $('#quantity'+product_id).val();
      			var action = "add";

      			if(product_id > 0)
      			{
      				$.ajax({
      					url: "action.php",
      					method: "POST",
      					dataType: "json",
      					data: {
      						product_id:product_id,
      						product_name:product_name,
      						product_price:product_price,
      						product_quantity:product_quantity,
      						action:action
      					},
      					success: function(data)
      					{
      						$('#order_table').html(data.order_table);
      						$('.badge').html('Към кошницата - ' + data.cart_item);
      						alert('product has been added to cart');
      					}
      				});
      			} 
      			else 
      			{
      				alert("Please enter number of quantity");
      			}
      		});
      	});

      	$(document).on('click', '.delete', function(){
      		var product_id = $(this).attr('id');
      		var action = 'remove';
      		if(confirm("are u sure u wanna delete")) 
      		{
      			$.ajax({
      				url: 'action.php',
      				method: 'POST',
      				dataType: 'json',
      				data:{
      					product_id: product_id,
      					action: action
      				},
      				success: function(data) {
      					$('#order_table').html(data.order_table);
      					$('.badge').html('Към кошницата - ' + data.cart_item);
      				}
      			});
      		}
      		else 
      		{
      			return false;
      		}
      	})
      </script>
     
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<!-- ################################################################################################ -->
<!-- POP UP PURCHASE -->
<div class="purchase">
	<div id="close"><span>close</span></div>
	<div id="order_table"></div>
</div>
<!-- END POP UP -->
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