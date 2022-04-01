<?php
	session_start();
	include("connect.php");//连接数据库
	$account_id = isset($_POST["account_id"]) ? $_POST["account_id"] : '';//获得用户信息
	$total_price = isset($_POST["total_price"]) ? $_POST["total_price"] : 0;
    $pay_time = date('Y-m-d H:i', time()); #当前时间
    $cashier_id = isset($_POST["cashier_id"]) ? $_POST["cashier_id"] : 0;

	$id = $_GET["id"];
	// print($id);
	$sql_id = "select account_id from account where account_id = '$id'";
	$result_id = mysqli_query($conn,$sql_id);
	$row=mysqli_fetch_array($result_id,MYSQLI_ASSOC);
	$pastuser_id = $row["account_id"];
	if(isset($_POST["Signup"]))//当用户点击提交时
	{
		$sqljudge = "select * from account where account_id = '$account_id'";
		$resultjudge = mysqli_query($conn,$sqljudge);
		$length = mysqli_num_rows($resultjudge);
		if($length && $pastuser_id != $account_id){
			echo "<script>alert('用户名已存在!')</script>";
		}
		else{
			$sql = "UPDATE account SET account_id='$account_id',total_price='$total_price',pay_time='$pay_time',cashier_id='$cashier_id' WHERE account_id='$id'";//SQL语句
		    $result = mysqli_query($conn,$sql);//执行SQL语句，写入用户数据
		    if($result){
			    echo "<script>alert('修改成功')";
			    header("location:账单信息管理界面.php");
		    }
			else{
				echo "'修改数据出错：'.mysqli_error($conn)";
				header("location:账单信息管理界面.php");
			}
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
    <title>数据库修改</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./register.css">
</head>
<body>
    <div class="wrap">
    <div class="container">
        <h1>重置信息</h1>
        <form action="" method="post" name="register" onsubmit = "return check()">
        <input type="text" placeholder="account_id" name="account_id">
        <input type="text" placeholder="total_price" name="total_price">
        <input type="text" placeholder="cashier_id" name="cashier_id">
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