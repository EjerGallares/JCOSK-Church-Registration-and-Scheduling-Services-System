<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
$db = mysqli_connect('localhost', 'root', '', 'jcoskchurch_db');


// for deleting registered member
if (isset($_POST['delete'])){
  $all_id = $_POST['delcheck'];
  $extract_id = implode(',' , $all_id);
  $del= "DELETE FROM tbl_userreg WHERE regUserID IN($extract_id)";
  $sqls=mysqli_query($db, $del);
  if($query_run)
  {
  $_SESSION['statuss'] = "Data has been deleted!";
  $_SESSION['statuss_code'] = "success";
  Header("location: registered.php");
  }
  else
  {
  $_SESSION['statuss'] = "Could not delete data";
  $_SESSION['statuss_code'] = "error";
  Header("location: registered.php");
}  
}
// for declining member
if (isset($_POST['Decline'])){
    $all_id = $_POST['delcheck'];
    $extract_id = implode(',' , $all_id);
    $dec= "DELETE FROM tbl_userreg WHERE regUserID IN($extract_id)";
    $sqls=mysqli_query($db, $dec);
    if($sqls)
    {
    $_SESSION['statuss'] = "Data has been removed!";
    $_SESSION['statuss_code'] = "success";
    Header("location: pendingRequest.php");
    }
    else 
    {
      $_SESSION['statuss'] = "Unable to decline";
      $_SESSION['statuss_code'] = "error";
      Header("location: pendingRequest.php");
    }
    
}
// for approving member
if (isset($_POST['Approves'])){
  $all_id = $_POST['cb_approveAd'];
  $extract_id = implode(',' , $all_id);
  $up= 'UPDATE tbl_userreg SET acct_Status="Member" WHERE regUserID IN("'.$extract_id.'")';
  $sqls=mysqli_query($db, $up);
  if($sqls)
  { 
    $_SESSION['statuss'] = "Approved succefully";
    $_SESSION['statuss_code'] = "success";
  header('Location: pendingRequest.php');      
   }
else 
   {
    $_SESSION['statuss'] = "Failed to update";
    $_SESSION['statuss_code'] = "error";
      header('Location: pendingRequest.php');
   }
}

 if (isset($_POST['updateUser']))
{
    $editid = $_POST['editid'];
    $img_user = $_POST['img_user'];
    $uname = $_POST['uname'];
    $uemail = $_POST['uemail'];
    $ufname = $_POST['ufname'];
    $contact = $_POST['contact'];
    $udatereg = $_POST['udatereg'];

  
      $query = "UPDATE tbl_userreg SET user_PIC='$img_user', username_REG='$uname', emailAdd_REG='$uemail', Fullname_REG='$ufname', contact_REG='$contact', date_REG='$udatereg' WHERE regUserID = $editid";
      $query_run = mysqli_query($db,$query);

      if($query_run)
      { 
        $_SESSION['statuss'] = "Update successfully";
        $_SESSION['statuss_code'] = "success";
      header('Location: registered.php');
                
       }
   else 
       {
        $_SESSION['statuss'] = "Failed to update";
        $_SESSION['statuss_code'] = "error";
          header('Location: registered.php');
       }
 }

 // deleting events
if (isset($_POST['delete'])){
  $all_id = $_POST['delcheck'];
  $extract_id = implode(',' , $all_id);
  $dec= "DELETE FROM tbl_events WHERE event_ID IN($extract_id)";
  $sqls=mysqli_query($db, $dec);
  if($sqls)
  {
  $_SESSION['statuss'] = "Data has been removed!";
  $_SESSION['statuss_code'] = "success";
  Header("location: manageEvent.php");
  }
  else 
  {
    $_SESSION['statuss'] = "Unable to decline";
    $_SESSION['statuss_code'] = "error";
    Header("location: manageEvent.php");
  }
  
}


if (isset($_POST['Approve'])){
  $all_id = $_POST['cb_Approve'];
  $extract_id = implode(',' , $all_id);
  $up= 'UPDATE tbl_logadmin SET acct_Status="admin" WHERE admin_ID IN("'.$extract_id.'")';
  $sqls=mysqli_query($db, $up);
  if($sqls)
  { 
    $_SESSION['statuss'] = "Approved succefully";
    $_SESSION['statuss_code'] = "success";
  header('Location: pendingAdmin.php');
            
   }
else 
   {
    $_SESSION['statuss'] = "Failed to update";
    $_SESSION['statuss_code'] = "error";
      header('Location: pendingAdmin.php');
   }
}

if (isset($_POST['Decline'])){
  $all_id = $_POST['delcheck'];
  $extract_id = implode(',' , $all_id);
  $dec= "DELETE FROM tbl_logadmin WHERE admin_ID IN($extract_id)";
  $sqls=mysqli_query($db, $dec);
  if($sqls)
  {
  $_SESSION['statuss'] = "Data has been removed!";
  $_SESSION['statuss_code'] = "success";
  Header("location: pendingAdmin.php");
  }
  else 
  {
    $_SESSION['statuss'] = "Unable to decline";
    $_SESSION['statuss_code'] = "error";
    Header("location: pendingAdmin.php");
  }
  
}
if (isset($_POST['delete'])){
  $all_id = $_POST['delcheck'];
  $extract_id = implode(',' , $all_id);
  $dec= "DELETE FROM tbl_guestinfo WHERE guest_ID IN($extract_id)";
  $sqls=mysqli_query($db, $dec);
  if($sqls)
  {
  $_SESSION['statuss'] = "Data has been removed!";
  $_SESSION['statuss_code'] = "success";
  Header("location: guestAccounts.php");
  }
  else 
  {
    $_SESSION['statuss'] = "Unable to decline";
    $_SESSION['statuss_code'] = "error";
    Header("location: guestAccounts.php");
  }
  
}