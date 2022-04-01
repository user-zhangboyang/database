<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>数据库界面</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./display.css">
</head>
<body>
    <div class="d1">
        <h2>商品信息管理界面</h2>
        <div class="add">
            <form action="./goodselect.php" method="post" name="search" onsubmit = "return check()">
                <label for="findid">搜索用户名:</label>
                <input id="findid" type="text" name="find" placeholder="你想查询的用户名">
                <input type="submit" name="submit" value="搜索" style="height:30px;background-color:green;color:white;font-size:15px">
                <a href="./goodadd.php">添加</a>
                <a href="./购物商品界面.php">返回</a>
            </form>
        </div>
        <table class="table" style="margin-top:35px">
            <tr class="t1">
                <th>goods_id</th>
                <th>goods_name</th>
                <th>price</th>
                <th>mfg</th>
                <th>goods_kind</th>
                <th>store_id</th>
                <th>storage</th>
                <th>操作</th>
            </tr>

            <style>   
                td{
                    border:1px solid black;
                    height:30px;
                    line-height: 30px;
                }

                .page{
                    display: inline-block;
                    margin:5px;
                }

            </style>

            <?php
            include("connect.php");
            mysqli_set_charset($conn,'UTF-8');
            $goods_id = $_POST["find"];
            
            $sql = "select * from goods where goods_id = '$goods_id'";
            $result = mysqli_query($conn,$sql);
            if (!$result) {
                printf("Error: %s\n", mysqli_error($conn));}
            $length = mysqli_num_rows($result);

            for($i=0;$i<$length;$i++){
                $row = mysqli_fetch_assoc($result);
                echo "<tr>";
                echo "<td>{$row['goods_id']}</td>";
                echo "<td>{$row['goods_name']}</td>";
                echo "<td>{$row['price']}</td>";
                echo "<td>{$row['mfg']}</td>";
                echo "<td>{$row['goods_kind']}</td>";
                echo "<td>{$row['store_id']}</td>";
                echo "<td>{$row['storage']}</td>";
                echo "<td>
                          <a href='javascript:del({$row['goods_id']})'><font color=red>删除</a>
                          <a href='goodrevise.php?id={$row['goods_id']}'><font color=green>修改</a>
                      </td>";
                echo "</tr>";
            }
            // $page = new page($length,10);
            // echo $page -> show($url);
            ?>
        </table>
    </div>

<script type="text/javascript">
    function del(id){
        if(confirm("是否确定删除？")){
            window.location = "gooddelete.php?id="+id;
        }
    }
</script>

<script language = "javascript">
	function check()
	{
		if(search.find.value == "")//如果id为空
		{
			alert("id不能为空!");
			search.find.focus();
			return false;
		}
	}
</script>
</body>
</html>