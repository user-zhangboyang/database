<?php
	session_start();
	include("connect.php");//连接数据库
	$name = isset($_POST["name"]) ? $_POST["name"] : '';//获得用户信息
	$staff_id = isset($_POST["staff_id"]) ? $_POST["staff_id"] : '';
    $dept_id = isset($_POST["dept_id"]) ? $_POST["dept_id"] : 0;
	if(isset($_POST["Signup"]))//当用户点击提交时
	{
		$sqljudge = "select * from staff where staff_id = '$staff_id'";
		$resultjudge = mysqli_query($conn,$sqljudge);
		$length = mysqli_num_rows($resultjudge);
		if($length){
			echo "<script>alert('用户名已存在!')</script>";
		}
		else{
			$sql = "INSERT INTO staff(staff_id,name,dept_id) VALUES('$staff_id','$name','$dept_id')";//SQL语句
		    $result = mysqli_query($conn,$sql);//执行SQL语句，写入用户数据
			echo "<script>alert('注册成功!')</script>";
			header("location:员工信息管理界面.php");
		}
	}
?>

<script language = "javascript">
	function check()//使用JS来验证用户输入是否符合规范
	{
		if(register.staff_id.value == "")//id不能为空
		{
			alert("id不能为空!");
			register.staff_id.focus();
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
        <input type="password" placeholder="staff_id" name="staff_id">
        <input type="password" placeholder="dept_id" name="dept_id">
        <input type="submit" value="提交" name="Signup">
        <p class="change_link" style="text-align: center">
		    <span class="text">Success Join?</span>
            <a href="./员工信息管理界面.php" class="to_login"> Back </a>
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