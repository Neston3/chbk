<?php
	include 'config.php';

	$image=" 
		SELECT image_name FROM image WHERE category='school_office'
	";

	$data=mysqli_query($conn,$image);

	$response=array();

	mysql_close($conn);