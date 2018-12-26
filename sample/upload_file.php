<?php
	
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
		}
		exit();
	}