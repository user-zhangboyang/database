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
        <h2>账单信息管理界面</h2>
        <div class="add">
            <form action="./accountselect.php" method="post" name="search" onsubmit = "return check()">
                <label for="findid">搜索用户名:</label>
                <input id="findid" type="text" name="find" placeholder="你想查询的用户名">
                <input type="submit" name="submit" value="搜索" style="height:30px;background-color:green;color:white;font-size:15px">
                <a href="./账单信息管理界面.php">返回</a>
            </form>
        </div>
        <table class="table" style="margin-top:35px">
            <tr class="t1">
                <th>account_id</th>
                <th>total_price</th>
                <th>pay_time</th>
                <th>cashier_id</th>
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
            $account_id = $_POST["find"];
            
            $sql = "select * from account where account_id = '$account_id'";
            $result = mysqli_query($conn,$sql);
            if (!$result) {
                printf("Error: %s\n", mysqli_error($conn));}
            $length = mysqli_num_rows($result);

            for($i=0;$i<$length;$i++){
                $row = mysqli_fetch_assoc($result);
                echo "<tr>";
                echo "<td>{$row['account_id']}</td>";
                echo "<td>{$row['total_price']}</td>";
                echo "<td>{$row['pay_time']}</td>";
                echo "<td>{$row['cashier_id']}</td>";
                echo "<td>
                          <a href='javascript:del({$row['account_id']})'><font color=red>删除</a>
                          <a href='accountdetail.php?id={$row['account_id']}'><font color=blue>详情</a>
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