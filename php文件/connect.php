<?php
    $server = "localhost";  //获取地址和用户名
    $db_user = "root";
    $db_password = "zhangboyang";
    $conn = mysqli_connect($server,$db_user,$db_password); //建立连接
    $selected = mysqli_select_db($conn,"zby");  //连接数据库zby
    if(!$conn){
        echo "<script>alert(连接失败!)</script>";
    }else{
        echo "<script>alert(连接成功!)</script>";
    } 
?>