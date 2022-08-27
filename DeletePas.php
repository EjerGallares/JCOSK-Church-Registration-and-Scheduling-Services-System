<?php

$db = mysqli_connect('localhost', 'root', '', 'db_adminside');

if (isset($_POST['delete']))
{
     $all_id = $_POST['delcheck'];
     $extractid = implode(',' , $all_id);
      $del= "DELETE FROM tbl_pastoral WHERE ptr_ID IN($extractid)"; 
      $sqls=mysqli_query($db, $del);
      $_SESSION['status'] = "Record has been deleted!";
      $_SESSION['status_code'] = "success";
     Header("location: Pastoral.php");
    
}
else
{
    // $_SESSION['status'] = "Record has not been deleted!";
    // $_SESSION['status_code'] = "error";
    // Header("location: Pastoral.php");
}

