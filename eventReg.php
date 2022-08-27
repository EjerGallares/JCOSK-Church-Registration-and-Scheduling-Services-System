<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'jcoskchurch_db');

if(isset($_POST['submitEvent'])){
    $image = $_FILES['image']['name'];
    $title = $_POST['eventTitle'];
    $place = $_POST['eventPlace'];
    $date = $_POST['eventDate'];
    $officiator = $_POST['officiator'];



    $insert_data = "INSERT INTO tbl_events (even_Pic, event_Title, event_Place, event_Date, event_officiator)
    values('$image','$title', '$place', '$date', '$officiator')";
        $data_check = mysqli_query($db, $insert_data);
        if($data_check){
          move_uploaded_file($_FILES["image"]["tmp_name"], "./userSide/Uploads/".$_FILES["image"]["name"]);
          $_SESSION['statuss'] = "Posted Successfully";
          $_SESSION['statuss_code'] = "success";
          header("Location: createEvents.php");
          
         
    }
         else{
                $_SESSION['statuss'] = "Unable to post";
          $_SESSION['statuss_code'] = "error";
          header("Location: createEvents.php");
             
        }
    
 
}