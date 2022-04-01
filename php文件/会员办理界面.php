<?php
include("connect.php");
mysqli_set_charset($conn,'UTF-8');
$name = $_GET['name'];
$sql="UPDATE customer SET if_vip = 1 WHERE name = '$name'";
$judge = mysqli_query($conn,$sql);
echo "<script>alert('会员办理成功!');history.back();</script>";
?>