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
        <h2>账单详情界面</h2>
        <div class="add">
            <form action="./accountselect.php" method="post" name="search" onsubmit = "return check()">
                <a href="./账单信息管理界面.php">返回</a>
            </form>
        </div>
        <table class="table" style="margin-top:35px">
            <tr class="t1">
                <th>account_id</th>
                <th>goods_id</th>
                <th>price</th>
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
            $account_id = $_GET["id"];
            
            $sql = "select account_id,goods_id from account_detail where account_id = '$account_id'";
            $result = mysqli_query($conn,$sql);
            if (!$result) {
                printf("Error: %s\n", mysqli_error($conn));}
            $length = mysqli_num_rows($result);
            for($i=0;$i<$length;$i++){
                $row = mysqli_fetch_assoc($result);
                $goods_id = $row['goods_id'];
                $sqll = "select price from goods where goods_id = '$goods_id'";
                $goodsresult = mysqli_query($conn,$sqll);
                $goodsrow = mysqli_fetch_assoc($goodsresult);
                echo "<tr>";
                echo "<td>{$row['account_id']}</td>";
                echo "<td>{$row['goods_id']}</td>";
                echo "<td>{$goodsrow['price']}</td>";
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
            window.location = "accountdelete.php?id="+id;
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