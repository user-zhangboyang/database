<?php
	session_start();
	include("connect.php");//连接数据库
	$username = isset($_POST["username"]) ? $_POST["username"] : '';//获得用户信息
	$password1 = isset($_POST["password1"]) ? $_POST["password1"] : '';
    $password2 = isset($_POST["password2"]) ? $_POST["password2"] : '';
    $sex = isset($_POST["sex"]) ? $_POST["sex"] : '';
	$status = isset($_POST["status"]) ? $_POST["status"] : '顾客';
	$createtime = date("Y-m-d H:i:s",time());
	if(isset($_POST["Signup"]))//当用户点击提交时
	{
		$sqljudge = "select * from user where username = '$username'";
		$resultjudge = mysqli_query($conn,$sqljudge);
		$length = mysqli_num_rows($resultjudge);
		if($length){
			echo "<script>alert('用户名已存在!')</script>";
		}
		else{
			$sql = "INSERT INTO user(username,password,sex,createtime,status) VALUES('$username','$password1','$sex','$createtime','$status')";//SQL语句
		    $result = mysqli_query($conn,$sql);//执行SQL语句，写入用户数据
			$sqll = "select * from user where username = '$username'";
			$resultgk = mysqli_query($conn,$sqll);
			$row = mysqli_fetch_array($resultgk);
			if($status == '顾客'){
				$customer_id = $row["id"];
				$if_vip = 0;
				$name = $username;
				$sql_customer = "INSERT INTO customer(customer_id,if_vip,name) VALUES('$customer_id','$if_vip','$name')";//SQL语句
		        $result_customer = mysqli_query($conn,$sql_customer);//执行SQL语句，写入用户数据
				if(!$result_customer){
					echo "$conn->error";
				}
			}
			else if($status == '职工'){
				$staff_id = $row["id"];
				$name = $username;
				$dept_id = 0;
				$sql_staff = "INSERT INTO staff(staff_id,name,dept_id) VALUES('$staff_id','$name','$dept_id')";//SQL语句
		        $result_staff = mysqli_query($conn,$sql_staff);//执行SQL语句，写入用户数据
				if(!$result_staff){
					echo "$conn->error";
				}
			}
			echo "<script>alert('注册成功!')</script>";
		}
	}
?>

<script language = "javascript">
	function check()//使用JS来验证用户输入是否符合规范
	{
		if(register.username.value == "")//昵称不能为空
		{
			alert("账号不能为空!");
			register.username.focus();
			return false;
		}
		if(register.password1.value == "")//密码不能为空
		{
			alert("密码不能为空!");
			register.password1.focus();
			return false;
		}
		if(register.password2.value == "")//密码不能为空
		{
			alert("密码不能为空!");
			register.password2.focus();
			return false;
		}
		if(register.password1.value.length < 6)//如果密码小于6位
		{
			alert("密码不能少于6位！");
			register.password1.focus();
			return false;
		}
		if(register.password1.value != register.password2.value)//判断两次输入的密码是否一致
		{
			alert("两次输入的密码不一致！");
			register.password1.focus();
			return false;
		}
        if((register.sex.value != "男" && register.sex.value != "女") || register.sex.value == "") //判断性别
        {
            alert("请选择性别为男或女!");
            register.sex.focus();
            return false;
        }
		if((register.status.value != "顾客" && register.status.value != "职工") || register.status.value == "") //判断身份
        {
            alert("请选择身份为顾客或职工!");
            register.status.focus();
            return false;
        }
	}
</script>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据库注册</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./register.css">
</head>
<body>
    <div class="wrap">
    <div class="container">
        <h1>Sign up</h1>
        <form action="" method="post" name="register" onsubmit = "return check()">
        <input type="text" placeholder="Your username" name="username">
        <input type="password" placeholder="password(不小于六位)" name="password1">
        <input type="password" placeholder="Please confirm your password" name="password2">
        <input type="text" placeholder="sex" name="sex">
		<input type="text" placeholder="status" name="status">
        <input type="submit" value="Sign up" name="Signup">
        <p class="change_link" style="text-align: center">
            <span class="text">Already a member ?</span>
            <a href="./login.php" class="to_login"> Login </a>
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