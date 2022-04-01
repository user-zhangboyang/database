<?php
	session_start();
	include("connect.php");//连接数据库
	$name = $_GET["name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>顾客界面</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./管理员界面.css">
</head>
<body>
    <div class="wrap">
    <div class="container">
        <h1>顾客界面</h1>
        <div class="server">
            <a href="./购物商品界面.php?name=<?php echo $name ?>" class="to_counselor"> 购买商品 </a>
        </div>
        <div class="server">
            <a href="./会员办理界面.php?name=<?php echo $name ?>" class="to_counselor"> 会员办理 </a>
        </div>
        <div class="server">
            <a href="./购物记录界面.php?name=<?php echo $name ?>" class="to_student"> 购买记录 </a>
        </div>
        <div class="server">
            <a href="./购物车界面.php?name=<?php echo $name ?>" class="to_teacher"> 购物车 </a>
        </div>
        <div class="server">
            <a href="./退货界面.php?name=<?php echo $name ?>" class="to_counselor"> 退货 </a>
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

