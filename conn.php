<?php 
	$conn = new mysqli("localhost", "root", "", "db_name");
    if(mysqli_connect_error()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }

?>