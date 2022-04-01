<?php
	session_start();
	include("connect.php");//连接数据库
	$name = isset($_POST["name"]) ? $_POST["name"] : '';//获得用户信息
    $dept_id = isset($_POST["dept_id"]) ? $_POST["dept_id"] : 0;

	$id = $_GET["id"];
    $pastuser_name = $_GET["name"];

	if(isset($_POST["Signup"]))//当用户点击提交时
	{
		$sqljudge = "select * from staff where name = '$name'";
		$resultjudge = mysqli_query($conn,$sqljudge);
		$length = mysqli_num_rows($resultjudge);
		if($length && $pastuser_name != $name){
			echo "<script>alert('用户名已存在!')</script>";
		}
		else{
			$sql = "UPDATE staff SET name='$name',dept_id='$dept_id' WHERE staff_id='$id'";//SQL语句
		    $result = mysqli_query($conn,$sql);//执行SQL语句，写入用户数据
            $sql_user = "UPDATE user SET username='$name' WHERE id='$id'";
            $result_user = mysqli_query($conn,$sql_user);
            if(!$result_user){
                print($conn->error);
		    }
		    if($result){
			    header("location:个人信息界面.php?name=$name");
                echo "<script>alert('修改成功');</script>";
		    }
			else{
				header("location:个人信息界面.php?name=$name");
                echo "'修改数据出错：'.mysqli_error($conn);</script>";
			}
		}
	}
?>

<script language = "javascript">
	function check()//使用JS来验证用户输入是否符合规范
	{
		if(register.name.value == "")//姓名不能为空
		{
			alert("用户名不能为空!");
			register.name.focus();
			return false;
		}
	}
</script>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人信息修改</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./register.css">
</head>
<body>
    <div class="wrap">
    <div class="container">
        <h1>重置信息</h1>
        <form action="" method="post" name="register" onsubmit = "return check()">
        <input type="text" placeholder="name" name="name">
        <input type="password" placeholder="dept_id" name="dept_id">
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