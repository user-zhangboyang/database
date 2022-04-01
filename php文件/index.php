<?php
    session_start();
    if(empty($_SESSION['userinfo']['username'])&&empty($_SESSION['userinfo']['password'])){
      echo "<script>alert(请登录!)</script>";
    }
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据库登陆注册</title>
    <!-- css样式 -->
    <link rel="stylesheet" href="./reset.css">    
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <div class="wrap">
    <div class="container">
        <h1>Welcome To DataBase Services</h1>
        <div class="server">
            <a href="./login.php" class="to_login"> 登录 </a>
        </div>
        <div class="server">
            <a href="./register.php" class="to_register"> 注册 </a>
        </div>
    </div>
    <ul>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
</body>
</html>