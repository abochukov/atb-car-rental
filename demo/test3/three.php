<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1">

<title>untitled document</title>

<link rel="stylesheet" href="css/screen.css" media="screen">

</head>
<body> 
<h1>Page three</h1>
<?php
   $menu=file_get_contents("menu.txt");
   $base=basename($_SERVER['PHP_SELF']);
   $menu=preg_replace("|<li><a href=\"".$base."\">(.*)</a></li>|U", "<li id=\"current\">$1</li>", $menu);
   echo $menu;
?>

</body>
</html>