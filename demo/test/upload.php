<?php

if(is_array($_FILES)) {

	if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {

		$sourcePath = $_FILES['userImage']['tmp_name'];

		$targetPath = "images/".$_FILES['userImage']['name'];
		
		$select1 = $_REQUEST['country'];
		$select2 = $_REQUEST['state'];
		$select3 = $_REQUEST['city'];
		$tip = $_REQUEST['tip'];
		$vid = $_REQUEST['vid'];
		$position = $_REQUEST['position'];

		if(move_uploaded_file($sourcePath,$targetPath)) {

			?>

				<img class="image-preview" src="<?php echo $targetPath; ?>" class="upload-preview" /><br/>
				<?php 
					echo "country" . $select1 . "<br/>"; 
					echo "state" . $select2 . "<br/>"; 
					echo "city" . $select3 . "<br/>"; 
					echo "тип" . $tip . "<br/>"; 
					echo "вид" . $vid . "<br/>"; 
					echo "зона" . $position . "<br/>"; 
				?>

			<?php

		}

	}

}

?>