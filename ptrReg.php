<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'jcoskchurch_db');


if(isset($_POST['addPastor']))
{
    $image = $_FILES['ptrImg']['name'];
    $name = $_POST['ptrname'];
    $address = $_POST['ptrAdd'];
    $contact = $_POST['ptrContact'];
    $yearofservice = $_POST['ptryos'];
    $status = $_POST['ptrStat'];

    $allowed_extension = array('gif', 'png', 'jpg', 'jpeg');
    $filename = $_FILES['ptrImg']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($file_extension, $allowed_extension))
    {
        $_SESSION['statuss'] = "You are allowed with only jpg, png, jpeg, and gif. ";
        $_SESSION['statuss_code'] = "warning";
        header('Location: Pastoral.php');
    }
    else
    {
    if(file_exists("Upload/".$_FILES['ptrImg']['name']))
    {
        $filename = $_FILES['ptrImg']['name'];
        $_SESSION['statuss'] = " Image already exist ".$filename;
        $_SESSION['statuss_code'] = "error";
        header('Location: Pastoral.php'); 
    }
    else
    {

    $query = "INSERT INTO tbl_pastoral (ptr_IMG,ptr_Name,ptr_Add,ptr_contact,ptr_years,ptrStatus) VALUES ('$image','$name','$address','$contact','$yearofservice','$status')";
    $query_run = mysqli_query($db,$query);

    if($query_run)
    {
        move_uploaded_file($_FILES["ptrImg"]["tmp_name"], "upload/".$_FILES["ptrImg"]["name"]);
        $_SESSION['statuss'] = "Successfully Added";
        $_SESSION['statuss_code'] = "success";
         header('Location: Pastoral.php');
    }
    else
    {
        $_SESSION['statuss'] = "Image not inserted";
        $_SESSION['statuss_code'] = "error";
        header('Location: Pastoral.php');
    }

 } 

    }
    
}
if (isset($_POST['updatedata']))
{
    $update_ID = $_POST['update_id'];
    $ptrname = $_POST['ptrname'];
    $ptrAdd = $_POST['ptrAdd'];
    $ptrContact = $_POST['ptrContact'];
    $ptryos = $_POST['ptryos'];
    $status = $_POST['ptrStat'];
    $query = "UPDATE tbl_pastoral SET ptr_Name='$ptrname', ptr_Add='$ptrAdd', ptr_contact='$ptrContact', ptr_years='$ptryos', ptrStatus='$status'WHERE ptr_ID = $update_ID"; 
    $query_run = mysqli_query($db,$query);

     if($query_run)
    {
   
        $_SESSION['statuss'] = "Update successfully";
        $_SESSION['statuss_code'] = "success";
        header('Location: Pastoral.php');
                
     }
 else 
     {
        $_SESSION['status'] = "Failed to update";
        $_SESSION['statuss_code'] = "error";
        header('Location: Pastoral.php');
     }
     
    
}



 





















//  if (isset($_POST['ptrname']) && isset($_POST['ptrAdd']) && isset($_POST['ptrContact']) && isset($_POST['ptryos'])) {
//     function validate($data){
//         $data = trim($data);
//         $data = stripslashes($data);
//         $data = htmlspecialchars($data);
//         return $data;
//     }
//     $ptrname = validate ($_POST['ptrname']);
//     $ptrAdd = validate ($_POST['ptrAdd']);
//     $ptrContact = validate ($_POST['ptrContact']);
//     $ptryos = validate($_POST['ptryos']);


//      if (isset($_POST['addPastor'])){
//      $ptrImg = $_POST['ptrImg'];    
//     $ptrname = $_POST['ptrname'];
//     $ptrAdd = $_POST['ptrAdd'];
//     $ptrContact = $_POST['ptrContact'];
//     $ptryos = $_POST['ptryos'];
//     $query = "INSERT INTO `tbl_pastoral`(`ptr_IMG`, `ptr_Name`, `ptr_Add`, `ptr_contact`, `ptr_years`) VALUES('$ptrname', '$ptrname', '$ptrAdd', '$ptrContact', '$ptryos')";
//     $query_run = mysqli_query($db, $query);
//     echo("Success");
//     if($query_run)
//     {
//     // echo '<script> alert("Success"); </script>';
//     header("Location: Pastoral.php?error=Successfully Added");
    
//     }
//     else
//     {
//         // echo '<script> alert("Failed"); </script>';
//     }
// }     
    
//  }







