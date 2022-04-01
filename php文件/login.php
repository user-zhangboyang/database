<?php
    error_reporting(0);
	session_start();
	include("connect.php");
	$postUsername = isset($_POST["username"]) ? $_POST["username"] : '';  //获取用户输入的信息
	$postPassword = isset($_POST["password"]) ? $_POST["password"] : '';
	$sql = "SELECT username,password,status FROM user WHERE username = '$postUsername'";//SQL查询
	$query = mysqli_query($conn,$sql);   //执行SQL语句
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC);  //取出数据放入数组
	$password = $row["password"];
	$username = $row["username"];
	$status = $row["status"];
	print($status);
	if(isset($_POST["Login"]))//当用户点击登录按钮时
	{
		if($username == $postUsername && $password == $postPassword)//验证用户名和密码是否一致
		{
			$_SESSION['userinfo']=[    //后续判断网页是否失效
				'username'=>$username,
				'password'=>$password
			];
			echo "<script>alert('登陆成功!')</script>";
			if($status == '管理员'){
				header("location:管理员界面.php");
			}
			else if($status == '顾客'){
				header("location:顾客界面.php?name={$username}");
			}
			else if($status == '职工'){
				header("location:职工界面.php?name={$username}");
			}			
		}
		else
		{
			echo "<script>alert('帐户名或密码错误！')</script>";//用户名和密码不一致，跳转到当前页面重新输入
		}
	}

	
?>

<script language = "javascript">
	function check()
	{
		if(logon.username.value == "")//如果username为空
		{
			alert("账号不能为空!");
			logon.username.focus();
			return false;
		}
		if(logon.password.value == "")//如果密码为空
		{
			alert("密码不能为空!");
			logon.password.focus();
			return false;
		}
	}
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据库登陆</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./login.css">
</head>
<body>
    <div class="wrap">
    <div class="container">
        <h1>Login</h1>
		<!-- 输入表单信息 -->
        <form action="" method="post" name="logon" onsubmit = "return check();"> 
        <input type="text" placeholder="Your username" name="username">
        <input type="password" placeholder="password" name="password">
        <input type="submit" name="Login" value="Login"/>
            <p class="change_link" style="text-align: center">
			    <p class="p1" style="text-align:center">
				<span class="text">No number?</span>
                <a href="./register.php" class="to_login"> Register </a>
				</p>
                <p class="p2" style="text-align:center">
				<span class="text">Forget password?</span>
				<a href="./retrieve.php" class="to_login">Retrieve</a>
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