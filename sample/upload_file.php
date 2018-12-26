<?php
	if(isset($_POST['submit_image']))
	{
		for($i=0;$i<count($_FILES["upload_file"]["name"]);$i++)
		{
			 $uploadfile=$_FILES["upload_file"]["tmp_name"][$i];
			 $folder="images/";
			 move_uploaded_file($uploadfile, "$folder".$_FILES["upload_file"]["name"][$i]);
		}
		exit();
	}