<?php
	session_start();
	include("connect.php");//连接数据库
	$goods_id = isset($_POST["goods_id"]) ? $_POST["goods_id"] : '';//获得用户信息
	$goods_name = isset($_POST["goods_name"]) ? $_POST["goods_name"] : '';
    $price = isset($_POST["price"]) ? $_POST["price"] : 0;
    $mfg = date('Y-m-d', strtotime($_POST['mfg']));
    if($mfg == 1970-01-01){
        $mfg = null;
    } 
    $goods_kind = isset($_POST["goods_kind"]) ? $_POST["goods_kind"] : '';
    $store_id = isset($_POST["store_id"]) ? $_POST["store_id"] : 0;
    $storage = isset($_POST["storage"]) ? $_POST["storage"] : 0;
	$id = $_GET["id"];
	// print($id);
	$sql_id = "select goods_id from goods where goods_id = '$id'";
	$result_id = mysqli_query($conn,$sql_id);
	$row=mysqli_fetch_array($result_id,MYSQLI_ASSOC);
	$pastuser_id = $row["goods_id"];
	if(isset($_POST["Signup"]))//当用户点击提交时
	{
		$sqljudge = "select * from goods where goods_id = '$goods_id'";
		$resultjudge = mysqli_query($conn,$sqljudge);
		$length = mysqli_num_rows($resultjudge);
		if($length && $pastuser_id != $goods_id){
			echo "<script>alert('用户名已存在!')</script>";
		}
		else{
            print($mfg);
			$sql = "UPDATE goods SET goods_id='$goods_id',goods_name='$goods_name',price='$price',mfg='$mfg',goods_kind='$goods_kind',store_id='$store_id',storage='$storage' WHERE goods_id='$id'";//SQL语句
		    $result = mysqli_query($conn,$sql);//执行SQL语句，写入用户数据
		    if($result){
			    echo "<script>alert('修改成功')";
			    header("location:商品信息管理界面.php");
		    }
			else{
				echo "'修改数据出错：'.mysqli_error($conn)";
				header("location:商品信息管理界面.php");
			}
		}
	}
?>

<script language = "javascript">
	function check()//使用JS来验证用户输入是否符合规范
	{
		if(register.goods_id.value == "")//id不能为空
		{
			alert("id不能为空!");
			register.goods_id.focus();
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
        <input type="text" placeholder="goods_name" name="goods_name">
        <input type="text" placeholder="goods_id" name="goods_id">
        <input type="text" placeholder="price" name="price">
        <input type="date" placeholder="mfg" name="mfg">
        <input type="text" placeholder="goods_kind" name="goods_kind">
        <input type="text" placeholder="store_id" name="store_id">
        <input type="text" placeholder="storage" name="storage">
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