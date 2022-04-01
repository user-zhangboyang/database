<?php
	session_start();
	include("connect.php");//连接数据库
	$goods_id = isset($_POST["goods_id"]) ? $_POST["goods_id"] : '';//获得用户信息
	$goods_name = isset($_POST["goods_name"]) ? $_POST["goods_name"] : '';
    $price = isset($_POST["price"]) ? $_POST["price"] : 0;
    $mfg = date('Y-m-d', strtotime($_POST['mfg']));
    $goods_kind = isset($_POST["goods_kind"]) ? $_POST["goods_kind"] : '';
    $store_id = isset($_POST["store_id"]) ? $_POST["store_id"] : 0;
    $storage = isset($_POST["storage"]) ? $_POST["storage"] : 0;
	if(isset($_POST["Signup"]))//当用户点击提交时
	{
		$sqljudge = "select * from goods where goods_id = '$goods_id'";
		$resultjudge = mysqli_query($conn,$sqljudge);
		$length = mysqli_num_rows($resultjudge);
		if($length){
			echo "<script>alert('用户名已存在!')</script>";
		}
		else{
			$sql = "INSERT INTO goods(goods_id,goods_name,price,mfg,goods_kind,store_id,storage) VALUES('$goods_id','$goods_name','$price','$mfg','$goods_kind','$store_id','$storage')";//SQL语句
		    $result = mysqli_query($conn,$sql);//执行SQL语句，写入用户数据
			echo "<script>alert('注册成功!')</script>";
			header("location:商品信息管理界面.php");
		}
	}
?>

<script language = "javascript">
	function check()//使用JS来验证用户输入是否符合规范
	{
		if(register.goods_id.value == "")//id不能为空
		{
			alert("id不能为空!");
			register.goods_id.focus();
			return false;
		}
	}
</script>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据库添加信息</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./register.css">
</head>
<body>
    <div class="wrap">
    <div class="container">
        <h1>Sign up</h1>
        <form action="" method="post" name="register" onsubmit = "return check()">
        <input type="text" placeholder="goods_name" name="goods_name">
        <input type="text" placeholder="goods_id" name="goods_id">
        <input type="text" placeholder="price" name="price">
        <input type="data" placeholder="mfg" name="mfg">
        <input type="text" placeholder="goods_kind" name="goods_kind">
        <input type="text" placeholder="store_id" name="store_id">
        <input type="text" placeholder="storage" name="storage">
        <input type="submit" value="提交" name="Signup">
        <p class="change_link" style="text-align: center">
		    <span class="text">Success Join?</span>
            <a href="./商品信息管理界面.php" class="to_login"> Back </a>
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