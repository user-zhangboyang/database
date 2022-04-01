<?php
include("connect.php");
mysqli_set_charset($conn,'UTF-8');
$id = $_GET['id'];
$sql = "DELETE FROM staff WHERE staff_id={$id}";
$judge = mysqli_query($conn,$sql);
if(!$judge){
    echo "<script>alert('删除错误!')";
    header("location:员工信息管理界面.php");
}
else{
    echo "<script>alert('删除成功!')";
    header("location:员工信息管理界面.php");
}
?>