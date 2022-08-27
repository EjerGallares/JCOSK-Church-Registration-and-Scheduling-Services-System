<?php
session_start();
date_default_timezone_set("asia/singapore");
$db = mysqli_connect('localhost', 'root', '', 'jcoskchurch_db');

if (isset($_POST['uname']) && isset($_POST['password']))    {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate ($_POST['uname']);
    $pass = validate ($_POST['password']);
    

    if (empty($uname)){
        header("Location: adminLog.php?error=User Name is required");
        exit();
    }else if(empty($pass)){
        header("Location: adminLog.php?error=Password is required");
        exit();

    }else{
     
       $sql = "SELECT * FROM tbl_logadmin WHERE ad_username='$uname' AND apassword='$pass'";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) === 1) {
           $row = mysqli_fetch_assoc($result);
            if ($row['ad_username'] === $uname && $row['apassword'] === $pass  && $row['acct_Status'] == "admin" ) { 
                $_SESSION['adminID'] = $row['admin_ID'];
                $_SESSION['status'] = $row['acct_Status'];
                $_SESSION['img_admin'] = $row['Img_ADMIN'];
                $_SESSION['email'] = $row['email_admin'];
                $_SESSION['fname'] = $row['ad_fname'];
                $_SESSION['lname'] = $row['ad_lname'];
                $_SESSION['address'] = $row['ad_address'];
                $_SESSION['contact'] = $row['ad_contact'];
                $_SESSION['user_name'] = $row['ad_username'];
                $_SESSION['acct_Status'] = $row['acct_Status'];
                // login time session
    $date_added = date("Y-m-d H:i:s");
    $update ="UPDATE tbl_logadmin set loggedin_time ='$date_added' where admin_ID=".$_SESSION['adminID'];
    $rs = mysqli_query($db, $update);
                    // end
       
                 header("Location: dashboard.php");
                exit();
                    
            }
               
        
            else{
                header("Location: adminLog.php?error=You are not an admin yet.");
                exit();
            }
    
        }else{
            header("Location: adminLog.php?error=Incorrect Username or Password");
            exit();
        }
    
    }
    
   
} 
else{ 
    header("Location: adminLog.php");
    exit();
}






