<?php
$name = $_GET['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>职工界面</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./管理员界面.css">
</head>
<body>
    <div class="wrap">
    <div class="container">
        <h1>职工界面</h1>
        <div class="server">
            <a href="./个人信息界面.php?name=<?php echo $name ?>" class="to_counselor"> 个人信息 </a>
        </div>
        <div class="server">
            <a href="./功能界面.php?name=<?php echo $name ?>" class="to_student"> 功能界面 </a>
        </div>
        <div class="server">
            <a href="./login.php" class="to_exit"> 退出系统 </a>
        </div>
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