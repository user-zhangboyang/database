<?php
include("connect.php");
mysqli_set_charset($conn,'UTF-8');
$id = $_GET['id'];
$sql = "DELETE FROM customer WHERE customer_id={$id}";
$sql_user = "DELETE FROM user WHERE id={$id}";
$judge = mysqli_query($conn,$sql);
$judge_user = mysqli_query($conn,$sql_user);
if(!$judge){
    echo "<script>alert('删除错误!')";
    header("location:顾客信息管理界面.php");
}
else{
    echo "<script>alert('删除成功!')";
    header("location:顾客信息管理界面.php");
}
?>