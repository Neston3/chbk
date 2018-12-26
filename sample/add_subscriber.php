<?php

	include 'config.php';

    //add subscriber
	function add_subscriber($email){
	    
	    global $conn;
        
    	//check if email is not empty
		if (!empty($email)) {
    			
    		//query
    		$query="
				INSERT INTO subscribe (email)
				SELECT * FROM (SELECT '$email') AS tmp
				WHERE NOT EXISTS (
				    SELECT email FROM subscribe WHERE email='$email'
				)
    		";
    
    		//check if query is performed
    		if (mysqli_query($conn,$query)) {
     			//echo "Data inserted";
    		}else{
     			//echo "error";
    		}
    
    	}
	}
