<?php
$db = mysqli_connect('localhost', 'root', '', 'db_userside');
if(isset($_POST['search'])){
    $searchKey = $_POST['search'];
    $sql = "SELECT * FROM tbl_userreg WHERE username_REG LIKE '%$searchKey%'";
}else
    $sql = "SELECT * FROM tbl_userreg";
    $result = mysqli_query($db,$sql);
?>











