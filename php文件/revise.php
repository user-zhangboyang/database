<?php
	session_start();
	include("connect.php");//连接数据库
	$name = isset($_POST["name"]) ? $_POST["name"] : '';//获得用户信息
    $if_vip = isset($_POST["if_vip"]) ? $_POST["if_vip"] : 0;
	$password = isset($_POST["password"]) ? $_POST["password"] : '';

	$id = $_GET["id"];
	// print($id);
	$sql_id = "select customer_id from customer where customer_id = '$id'";
	$result_id = mysqli_query($conn,$sql_id);
	$row=mysqli_fetch_array($result_id,MYSQLI_ASSOC);
	$pastuser_id = $row["customer_id"];
	if(isset($_POST["Signup"]))//当用户点击提交时
	{
		$sqljudge = "select * from customer where customer_id = '$customer_id'";
		$resultjudge = mysqli_query($conn,$sqljudge);
		$length = mysqli_num_rows($resultjudge);
		if($length && $pastuser_id != $customer_id){
			echo "<script>alert('用户名已存在!')</script>";
		}
		else{
			$sql = "UPDATE customer SET if_vip='$if_vip',name='$name' WHERE customer_id='$id'";//SQL语句
			$sql_user = "UPDATE user SET username='$name',password='$password' WHERE id='$id'";//SQL语句
		    $result = mysqli_query($conn,$sql);//执行SQL语句，写入用户数据
			$result_user = mysqli_query($conn,$sql_user);//执行SQL语句，写入用户数据
		    if($result){
			    echo "<script>alert('修改成功')";
			    header("location:顾客信息管理界面.php");
		    }
			else{
				echo "'修改数据出错：'.mysqli_error($conn)";
				header("location:顾客信息管理界面.php");
			}
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
    <title>数据库修改</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./register.css">
</head>
<body>
    <div class="wrap">
    <div class="container">
        <h1>重置信息</h1>
        <form action="" method="post" name="register" onsubmit = "return check()">
        <input type="text" placeholder="name" name="name">
		<input type="password" placeholder="password" name="password">
        <input type="text" placeholder="if_vip" name="if_vip">
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