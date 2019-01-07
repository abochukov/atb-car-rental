<?php
session_start();
if(!session_is_registered(myusername)){
	header("location:main_login.php");
}

include '../connection.php';

?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

	<link rel="http://tinymce.com/css/codepen.min.css" type="text/css" href="test.css" />
	<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>


	

	<script src="ajaxSave.js" type="text/javascript"></script>

	<script>
	Date.firstDayOfWeek = 0;
	Date.format = 'mm-dd-yyyy';
	
	  $(function() {
		$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });

	  });  
  </script>
  
	<script>

		tinymce.init({
		  selector: 'textarea',
		  height: 500,
		  theme: 'modern',
		   file_browser_callback : 'myFileBrowser',
		  plugins: [
		    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		    'searchreplace wordcount visualblocks visualchars code fullscreen',
		    'insertdatetime media nonbreaking save table contextmenu directionality',
		    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
		  ],
		  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
		  image_advtab: true,
		  templates: [
		    { title: 'Test template 1', content: 'Test 1' },
		    { title: 'Test template 2', content: 'Test 2' }
		  ],
		  content_css: [
		    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		    '//www.tinymce.com/css/codepen.min.css'
		  ]

		});

		function fileBrowserCallBack(field_name, url, type, win) {
		     var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
		     var enableAutoTypeSelection = true;
		     var cType;
		     tinyfck_field = field_name;
		     tinyfck = win;
		     switch (type) {
		         case "image":
		             cType = "Image";
		         break;
		         case "flash":
		             cType = "Flash";
		         break;
		         case "file":
		             cType = "File";
		         break;
		     }
		     if (enableAutoTypeSelection && cType) {
		         connector += "?Type=" + cType;
		     }
		     window.open(connector, "tinyfck", "modal,width=600,height=400");
		  }
		
	</script>

	
  
  <script type="text/javascript">
  /*
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced"
	});
	*/
</script>

  
	<style type="text/css">
	body {background:#e7e7e5;}
		 .subTable, th {border:1px solid #b4a503;}
		th {background:#d6c400;}
		#removeid {color:red; text-decoration:none; padding:0 0 0 12px;}
	</style>
</head>
<body>


<form method="post" id="ss">
Дата:<br/>
<input type="text" name="date" id="datepicker" ><br/><br/>
Събитие:<br/>
<textarea cols="22" rows="10" name="event" id="event"></textarea><br/><br/>
<input type="submit" name="submit" id="saver" >
</form>
<div id="message"></div>


<?php

	$sql = "SELECT * FROM news ORDER BY ID DESC";
	$res = mysql_query($sql);

	while($row=mysql_fetch_assoc($res)) {
		$title = $row['Title'];
		$text = $row['Text'];
		$thumb = "../" . $row['Thumb_Image'];

		echo "
			<article>
				<div class='thumb'><img src='".$thumb."' width='300' /></div>
			</article
		";
	}

?>


</body>
</html>