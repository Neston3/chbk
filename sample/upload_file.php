<?php
	
	include 'config.php';

	$folder="image";


	if(isset($_POST['submit_image']))
	{
		//if file is not present, make it
		if (!file_exists($folder)) {
			 mkdir($folder,0777,true);
		}

		for($i=0;$i<count($_FILES["upload_file"]["name"]);$i++)
		{
			 $uploadfile=$_FILES["upload_file"]["tmp_name"][$i];
			 $name=$_FILES["upload_file"]["name"][$i];
			
			 move_uploaded_file($uploadfile, "$folder/$name");

			 //save the filename to database
			 $image_query="
			 	INSERT INTO image (image_name,category)
				SELECT * FROM (SELECT '$name','design') AS tmp
				WHERE NOT EXISTS (
				    SELECT image_name FROM image WHERE image_name='$name' and category='design'
				)
			 ";

			 if (mysqli_query($conn,$image_query)) {
			 	//image successful
			 	echo '<script type="text/javascript">'; 
                echo 'alert("Successfully uploaded");'; 
                echo 'window.location.href = "admin_index.html";';
                echo '</script>'; 
			 }else{
			 	echo '<script type="text/javascript">'; 
                echo 'alert("Unsuccessful please try again");'; 
                echo 'window.location.href = "admin_index.html";';
                echo '</script>';
			 }
		}
		exit();
	}