<?php 
//	$file = 'regForm.txt';
require 'conn.php';
        $postdata = file_get_contents("php://input");
        $data = json_decode($postdata, true);
        $fname= $conn->real_escape_string($data['fName']);
        $lname= $conn->real_escape_string($data['lName']);
        $email= $conn->real_escape_string($data['email']);
        $pass=md5($conn->real_escape_string($data['pass']));
        $q=mysqli_query($conn,'Insert into users(fname,lname,email,password) values("'.$fname.'","'.$lname.'","'.$email.'","'.$pass.'")');
        if($q){
          echo 1;
        }else{
          echo 0;
        }
?>