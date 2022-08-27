
<?php

session_start();
date_default_timezone_set("asia/singapore");
$db = mysqli_connect('localhost', 'root', '', 'jcoskchurch_db');
 $date_added = date("Y-m-d H:i:s");
 $update ="UPDATE tbl_logadmin set loggedout_time ='$date_added' where admin_ID=".$_SESSION['adminID'];
 $rs = mysqli_query($db, $update);

 header("Location: index.php");
 unset($_SESSION["user_name"]);
 unset($_SESSION["name"]);
 unset($_SESSION["adminID"]);
 unset($_SESSION["emailadmin"]);

?>