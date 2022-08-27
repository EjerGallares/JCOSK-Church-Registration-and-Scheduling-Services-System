
<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'jcoskchurch_db');
   
if (isset($_POST['register'])){
    $image = $_FILES['img_admin']['name'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $userName = $_POST['userName'];
    $passWord = $_POST['passWord'];
    $email = $_POST['adminEmail'];
    $date = $_POST['adminDate'];
    $insert_data = "INSERT INTO tbl_logadmin (Img_ADMIN, ad_fname, ad_lname, ad_address, ad_contact, ad_username, apassword, email_admin, admin_date)
    values('$image', '$fname', '$lname', '$address', '$contact', '$userName', '$passWord', '$email', '$date')";
    $query_run = mysqli_query($db, $insert_data);
    if($query_run)
    {
    move_uploaded_file($_FILES["img_admin"]["tmp_name"], "upload/".$_FILES["img_admin"]["name"]);
    $_SESSION['statuss'] = "Just wait for the apporval of the head pastor";
    $_SESSION['statuss_code'] = "success";
    header("Location: adminLog.php");
    
    }
    else
    {
        $_SESSION['status'] = "Failed to register";
        $_SESSION['statuss_code'] = "error";
        header("Location: adminLog.php");
    }
}
 
