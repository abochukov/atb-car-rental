<?php

$con = mysqli_connect("localhost","cookbgco_nakata","nakata149754na");

if (!$con) {

    die('Could not connect: ' . mysql_error());

}

mysqli_select_db($con, 'cookbgco_sting');
mysqli_set_charset($con,"utf8");

			$select1 = $_REQUEST['country'];
			$select2 = $_REQUEST['state'];
			$select3 = $_REQUEST['city'];
			$brand = $_REQUEST['brand']; //brand
			$tip = $_REQUEST['tip']; //type
			$vid = $_REQUEST['vid']; //mode
			$position = $_REQUEST['position']; //zone
			$user_email = $_REQUEST['user_email'];

			//echo $brand;

			$today = date('Y-m-d');
/*
if (empty($select1) || empty($select2) || empty($select3) &&  empty($brand) && empty($tip) && empty($vid) && empty($position)) {

}
*/
if (empty($_FILES['userImage']['tmp_name'])) {
    echo "моля изберете снимка";
    ?>
    <script type="text/javascript">
						$(document).ready(function() {
							$('.btnSubmit').hide();
							$('.refresh_page').show();

							$('.refresh_page').click(function(){
								location.reload();
							});
						})
					</script>
    <?php
} else {

	if(is_array($_FILES)) {

		if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {

			$sourcePath = $_FILES['userImage']['tmp_name'];

			$targetPath = "images/". uniqid() . $_FILES['userImage']['name'];
			
			$select1 = $_REQUEST['country'];
			$select2 = $_REQUEST['state'];
			$select3 = $_REQUEST['city'];
			$brand = $_REQUEST['brand']; //brand
			$tip = $_REQUEST['tip']; //type
			$vid = $_REQUEST['vid']; //mode
			$position = $_REQUEST['position']; //zone
			$user_email = $_REQUEST['user_email'];

			$today = date('Y-m-d');

			if(move_uploaded_file($sourcePath,$targetPath)) {

				?>
					<!--
					<img class="image-preview" src="<?php echo $targetPath; ?>" class="upload-preview" /><br/>
					-->
				<?php 

					$get_segment = "SELECT * FROM city WHERE id = '$select3'";
					$res_segment = mysqli_query($con, $get_segment);

					while($row_sgm = mysqli_fetch_assoc($res_segment)) {
						$segment = $row_sgm['segment'];
					}
					
					$sql = "INSERT INTO form_upld (`date_upld`,`pharmacy`, `brand`, `type`, `mode`, `zone`, `city`,`code`,`pharm`, `sgm`, `img`, `user`) 
							VALUES
							('$today','$select3', '$brand', '$tip',' $vid','$position','$select1','$select2','$select3', '$segment','$targetPath', '$user_email')";
	    			$result=mysqli_query($con, $sql);


	    			echo "успешно качен материал ";

					?>
					<script type="text/javascript">
						$(document).ready(function() {
							$('.btnSubmit').hide();
							$('.refresh_page').show();

							$('.refresh_page').click(function(){
								location.reload();
							});
						})
					</script>
					
				<?php

			}

		}

	} 
}
?>