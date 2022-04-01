<?php
include("connect.php");
mysqli_set_charset($conn,'UTF-8');
$account_id = $_GET['id'];
$name = $_GET['name'];

$sql = "SELECT staff_id FROM staff WHERE name ='$name'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$staff_id = $row['staff_id'];


$sql = "UPDATE account SET cashier_id = '$staff_id' WHERE account_id = '$account_id'";
$judge = mysqli_query($conn,$sql);

if(!$judge){
    echo "<script>alert('错误!')";
    header("location:收银员功能界面.php?name=$name");
}
else{
    echo "<script>alert('成功!')";
    header("location:收银员功能界面.php?name=$name");
}
?>