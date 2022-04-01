<?php
	session_start();
	include("connect.php");//连接数据库
	$store_id = isset($_POST["store_id"]) ? $_POST["store_id"] : '';//获得用户信息
	$goods_id = isset($_POST["goods_id"]) ? $_POST["goods_id"] : 0;
    $address = isset($_POST["address"]) ? $_POST["address"] : '';
    $storage = isset($_POST["storage"]) ? $_POST["storage"] : 0;
    $name = $_GET['name'];
	if(isset($_POST["Signup"]))//当用户点击提交时
	{
		$sqljudge = "select * from store where store_id = '$store_id'";
		$resultjudge = mysqli_query($conn,$sqljudge);
		$length = mysqli_num_rows($resultjudge);
		if($length){
			echo "<script>alert('用户名已存在!')</script>";
		}
		else{
			$sql = "INSERT INTO store(store_id,address,goods_id,storage) VALUES('$store_id','$address','$goods_id','$storage')";//SQL语句
		    $result = mysqli_query($conn,$sql);//执行SQL语句，写入用户数据
            $sql_goods = "UPDATE goods SET store_id='$store_id',storage='$storage' where goods_id ='$goods_id'";
            $result_goods = mysqli_query($conn,$sql_goods);//执行SQL语句，写入用户数据
            if(!$result_goods){
                print($conn->error);
            }
			echo "<script>alert('注册成功!')</script>";
			header("location:仓库管理员功能界面.php?name=$name");
		}
	}
?>

<script language = "javascript">
	function check()//使用JS来验证用户输入是否符合规范
	{
		if(register.store_id.value == "")//id不能为空
		{
			alert("id不能为空!");
			register.store_id.focus();
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
        <input type="text" placeholder="store_id" name="store_id">
        <input type="text" placeholder="address" name="address">
        <input type="text" placeholder="goods_id" name="goods_id">
        <input type="text" placeholder="storage" name="storage">
        <input type="submit" value="提交" name="Signup">
        <p class="change_link" style="text-align: center">
		    <span class="text">Success Join?</span>
            <a href="./仓库管理员功能界面.php?name=<?php echo $name ?>" class="to_login"> Back </a>
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