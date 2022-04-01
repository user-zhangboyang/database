<?php
include("connect.php");
mysqli_set_charset($conn,'UTF-8');
$id = $_GET['id'];
$name = $_GET['name'];
$sql = "DELETE FROM shopping_cart WHERE goods_id= '$id' and customer_name = '$name'";
$judge = mysqli_query($conn,$sql);
if($judge){
    echo "<script>alert('删除成功!');history.back();</script>";
}
else{
    print($conn->error);
}
?>