<?php
	session_start();
	include("connect.php");//连接数据库
	$name = isset($_POST["name"]) ? $_POST["name"] : '';//获得用户信息
	$customer_id = isset($_POST["customer_id"]) ? $_POST["customer_id"] : '';
    $if_vip = isset($_POST["if_vip"]) ? $_POST["if_vip"] : 0;
	if(isset($_POST["Signup"]))//当用户点击提交时
	{
		$sqljudge = "select * from customer where customer_id = '$customer_id'";
		$resultjudge = mysqli_query($conn,$sqljudge);
		$length = mysqli_num_rows($resultjudge);
		if($length){
			echo "<script>alert('用户名已存在!')</script>";
		}
		else{
			$sql = "INSERT INTO customer(customer_id,if_vip,name) VALUES('$customer_id','$if_vip','$name')";//SQL语句
		    $result = mysqli_query($conn,$sql);//执行SQL语句，写入用户数据
			echo "<script>alert('注册成功!')</script>";
			header("location:顾客信息管理界面.php");
		}
	}
?>

<script language = "javascript">
	function check()//使用JS来验证用户输入是否符合规范
	{
		if(register.customer_id.value == "")//id不能为空
		{
			alert("id不能为空!");
			register.customer_id.focus();
			return false;
		}
		if(register.name.value == "")//姓名不能为空
		{
			alert("姓名不能为空!");
			register.name.focus();
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
        <input type="text" placeholder="name" name="name">
        <input type="password" placeholder="customer_id" name="customer_id">
        <input type="password" placeholder="if_vip" name="if_vip">
        <input type="submit" value="提交" name="Signup">
        <p class="change_link" style="text-align: center">
		    <span class="text">Success Join?</span>
            <a href="./顾客信息管理界面.php" class="to_login"> Back </a>
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