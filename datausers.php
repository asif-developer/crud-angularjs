<?php session_start();
//	$file = 'regForm.txt';
    require 'conn.php';
    $postdata = file_get_contents("php://input");
    $data = json_decode($postdata, true);
    $type=$data['type'];
    switch ($type) {
        case 'get_users':
                $q=mysqli_query($conn,"select uid,fname, lname, email from users");
                $res=array();
                while($row = mysqli_fetch_assoc($q)){
                    $res[]=$row;
                }
                echo json_encode($res);
        break;
        
        case 'del':
                $id=$data['uid'];
                $a=mysqli_query($conn,"delete from users where uid='".$id."'") or die(mysqli_error());
                if($a){
                    echo 1;
                }

            break;

        case 'login':
                $user_name=$data['user'];
                $pass=$data['pass'];
                $a=mysqli_query($conn,"select * from admin_users where (admin_name='".$user_name."' or email='".$user_name."') and password='".$pass."'") or die(mysqli_error());
                if(mysqli_num_rows($a)>0){
                    $d=mysqli_fetch_assoc($a);
                    $_SESSION['admin_id']=$d['admin_id'];
                    $_SESSION['admin_name']=$d['admin_name'];
                    echo 1;
                }

            break;

        default:
            # code...
            break;
    }

?>