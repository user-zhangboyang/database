<?php
include("connect.php");
mysqli_set_charset($conn,'UTF-8');
$id = $_GET['id'];
$name = $_GET['name'];
$sql = "select * from goods where goods_id = '$id'";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$price = $row['price'];
$time = date("Y-m-d H:i:s",time());
$sql_cart = "INSERT INTO shopping_cart(goods_id,price,customer_name,time) VALUES('$id','$price','$name','$time')";//SQL语句
$result_cart = mysqli_query($conn,$sql_cart);//执行SQL语句，写入用户数据
if($result_cart){
    echo "<script>alert('成功加入购物车!');history.back();</script>";
}
?>