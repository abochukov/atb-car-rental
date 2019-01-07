<?php
  // Db connection configuration
  include '../connection.php';


  $id = $_POST['id'];

  	if(is_numeric($id)) {  
	    $sql = "SELECT * FROM walnut_blog WHERE Id='$id' ";
	    $res = mysql_query($sql); //or die(mysql_error());
	} else {    
		$sql = "SELECT * FROM walnut_blog ORDER BY Id DESC LIMIT 1 ";
	    $res = mysql_query($sql); //or die(mysql_error());
	}

	while ($row=mysql_fetch_array($res)) {
	    $title = $row['Title'];
		$article = $row['Article'];
	}

$data = array($title, $article);
echo json_encode($data); 

?>