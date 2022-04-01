<?php
    error_reporting(0);
	session_start();
	include("connect.php");
	$postUsername = isset($_POST["username"]) ? $_POST["username"] : '';  //获取用户输入的信息
	// $postPassword = isset($_POST["password"]) ? $_POST["password"] : '';
	$sql = "SELECT username,password FROM user WHERE username = '$postUsername'";//SQL查询
	$query = mysqli_query($conn,$sql);   //执行SQL语句
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC);  //取出数据放入数组
	$password = $row["password"];
	$username = $row["username"];
	if(isset($_POST["Retrieve"]))//当用户点击找回按钮时
	{
		if($username == $postUsername)//验证用户名和密码是否一致
		{
			// $_SESSION['userinfo']=[    //后续判断网页是否失效
			// 	'username'=>$username,
			// 	'password'=>$password
			// ];
			echo "<script>alert('密码是：$password')</script>";
		}
        else if(!$username){
            echo "<script>alert('用户名不存在!')</script>";
        }
	}

	
?>

<script language = "javascript">
	function check()
	{
		if(retrieve.username.value == "")//如果username为空
		{
			alert("账号不能为空!");
			retrieve.username.focus();
			return false;
		}
		// if(retrieve.password.value == "")//如果密码为空
		// {
		// 	alert("密码不能为空!");
		// 	retrieve.password.focus();
		// 	return false;
		// }
	}
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据库密码找回</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./login.css">
</head>
<body>
    <div class="wrap">
    <div class="container">
        <h1>Retrieve</h1>
		<!-- 输入表单信息 -->
        <form action="" method="post" name="retrieve" onsubmit = "return check();"> 
        <input type="text" placeholder="Your username" name="username">
        <!-- <input type="password" placeholder="password" name="password"> -->
        <input type="submit" name="Retrieve" value="submit"/>
            <p class="change_link" style="text-align: center">
			    <p class="p1" style="text-align:center">
				<span class="text">Success?</span>
                <a href="./login.php" class="to_login"> Login </a>
				</p>
                <!-- <p class="p2" style="text-align:center">
				<span class="text">Forget password?</span>
				<a href="./retrieve.php" class="to_login">Retrieve</a>
				</p> -->
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