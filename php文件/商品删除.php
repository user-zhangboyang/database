<?php
include("connect.php");
mysqli_set_charset($conn,'UTF-8');
$id = $_GET['id'];
$name = $_GET['name'];
$sql = "DELETE FROM goods WHERE goods_id={$id}";
$judge = mysqli_query($conn,$sql);
if(!$judge){
    echo "<script>alert('删除错误!')";
    header("location:商品管理员功能界面.php?name=$name");
}
else{
    echo "<script>alert('删除成功!')";
    header("location:商品管理员功能界面.php?name=$name");
}
?>