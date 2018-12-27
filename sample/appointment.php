<?php

	include 'config.php';

	$appointment=$_POST['btn-appointment'];
	$email=$_POST["email"];
	$name=$_POST["name"];
	$message=$_POST["message"];

	if (isset($appointment) && !empty($email) && !empty($name) && !empty($message)) {
		$query="
			INSERT INTO appointment (name,email,message)
            SELECT * FROM (SELECT '$name','$email','$message') AS tmp
            WHERE NOT EXISTS (
                SELECT email FROM appointment WHERE email='$email'
            )
		";

		if (mysqli_query($conn,$query)) {
			echo '<script type="text/javascript">'; 
            echo 'alert("Thank you for booking");'; 
            echo 'window.location.href = "contact_us.html";';
            echo '</script>'; 
		}else{
			echo '<script type="text/javascript">'; 
            echo 'alert("Please book again...");'; 
            echo 'window.location.href = "contact_us.html";';
            echo '</script>'; 
		}
	}else{
		echo '<script type="text/javascript">'; 
        echo 'alert("Fill the required data");'; 
        echo 'window.location.href = "contact_us.html";';
        echo '</script>'; 
	}
