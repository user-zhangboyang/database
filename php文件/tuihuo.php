<?php
include("connect.php");
mysqli_set_charset($conn,'UTF-8');
$id = $_GET['id'];
$name = $_GET['name'];

$sql = "UPDATE account SET if_back = 1 where account_id = '$id' and customer_name = '$name'";
$result = mysqli_query($conn,$sql);//执行SQL语句，写入用户数据

$sql = "SELECT goods_id FROM account_detail WHERE account_id ='$id'";
$result = mysqli_query($conn,$sql);//执行SQL语句，写入用户数据
$row = mysqli_fetch_array($result);
$goods_id = $row['goods_id'];

$sql = "SELECT storage FROM goods WHERE goods_id ='$goods_id'";
$result = mysqli_query($conn,$sql);//执行SQL语句，写入用户数据
$row = mysqli_fetch_array($result);
$storage = $row['storage'];

$sql = "UPDATE goods SET storage= $storage+1 where goods_id = '$goods_id'";
$result = mysqli_query($conn,$sql);//执行SQL语句，写入用户数据

$sql = "UPDATE store SET storage= $storage+1 where goods_id = '$goods_id'";
$result = mysqli_query($conn,$sql);//执行SQL语句，写入用户数据

if($result){
    echo "<script>alert('退货成功!');history.back();</script>";
}
else{
    echo "$conn->error";
}
?>