<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "db_adminside";

$conn = mysqli_connect($sname, $unmae, $password,);

if (!$conn) {
    echo "Connection failed!";
}
?>