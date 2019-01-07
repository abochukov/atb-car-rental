<?php
	$connect = mysql_connect ('localhost', 'cookbgco_nakata', 'nakata149754na') or die ("Couldn't connect " . mysql.error());
	$select = mysql_select_db ("cookbgco_Cook", $connect) or die ("Couldn't select database " .mysql.error());
	mysql_query("SET NAMES CP1251"); 
	mysql_query("SET NAMES utf8");
?>