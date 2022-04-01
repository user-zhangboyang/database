<?php
	session_start();
	include("connect.php");//连接数据库
	$goods_name = isset($_POST["goods_name"]) ? $_POST["goods_name"] : '';
    $price = isset($_POST["price"]) ? $_POST["price"] : 0;
    $goods_kind = isset($_POST["goods_kind"]) ? $_POST["goods_kind"] : '';
    $storage = isset($_POST["storage"]) ? $_POST["storage"] : 0;
	$id = $_GET["id"];
    $name = $_GET['name'];
	// print($id);
	if(isset($_POST["Signup"]))//当用户点击提交时
	{
		$sql = "UPDATE goods SET goods_name='$goods_name',price='$price',goods_kind='$goods_kind',storage='$storage' WHERE goods_id='$id'";//SQL语句
		$result = mysqli_query($conn,$sql);//执行SQL语句，写入用户数据
        $sql = "UPDATE store SET storage='$storage' WHERE goods_id='$id'";//SQL语句
		$result = mysqli_query($conn,$sql);
		if($result){
		    echo "<script>alert('修改成功')";
		    header("location:商品管理员功能界面.php?name=$name");
		}
		else{
			echo "'修改数据出错：'.mysqli_error($conn)";
			header("location:商品管理员功能界面.php?name=$name");
		}
		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据库修改</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./register.css">
</head>
<body>
    <div class="wrap">
    <div class="container">
        <h1>重置信息</h1>
        <form action="" method="post" name="register" onsubmit = "return check()">
        <input type="text" placeholder="goods_name" name="goods_name">
        <input type="text" placeholder="price" name="price">
        <input type="text" placeholder="goods_kind" name="goods_kind">
        <input type="text" placeholder="storage" name="storage">
        <input type="submit" value="提交" name="Signup">
        <p class="change_link" style="text-align: center">
		    <p class="p1" style="text-align:center">
				<!-- <span class="text">Success Revise?</span>
                <a href="./display.php" class="to_login"> Back </a> -->
			</p>
	    </p>
        </form>
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