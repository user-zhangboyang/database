<?php
	session_start();
	include("connect.php");//连接数据库
	$account_id = isset($_POST["account_id"]) ? $_POST["account_id"] : '';//获得用户信息
	$total_price = isset($_POST["total_price"]) ? $_POST["total_price"] : 0;
    $pay_time = date('Y-m-d H:i', time());
    $cashier_id = isset($_POST["cashier_id"]) ? $_POST["cashier_id"] : 0;
	if(isset($_POST["Signup"]))//当用户点击提交时
	{
		$sqljudge = "select * from account where account_id = '$account_id'";
		$resultjudge = mysqli_query($conn,$sqljudge);
		$length = mysqli_num_rows($resultjudge);
		if($length){
			echo "<script>alert('用户名已存在!')</script>";
		}
		else{
			$sql = "INSERT INTO account(account_id,total_price,pay_time,cashier_id) VALUES('$account_id','$total_price','$pay_time','$cashier_id')";//SQL语句
		    $result = mysqli_query($conn,$sql);//执行SQL语句，写入用户数据
            if(!$result){
                print(mysqli_error($conn));
            }
			echo "<script>alert('注册成功!')</script>";
			header("location:账单信息管理界面.php");
		}
	}
?>

<script language = "javascript">
	function check()//使用JS来验证用户输入是否符合规范
	{
		if(register.account_id.value == "")//id不能为空
		{
			alert("id不能为空!");
			register.account_id.focus();
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
        <input type="text" placeholder="account_id" name="account_id">
        <input type="text" placeholder="total_price" name="total_price">
        <input type="text" placeholder="cashier_id" name="cashier_id">
        <input type="submit" value="提交" name="Signup">
        <p class="change_link" style="text-align: center">
		    <span class="text">Success Join?</span>
            <a href="./账单信息管理界面.php" class="to_login"> Back </a>
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