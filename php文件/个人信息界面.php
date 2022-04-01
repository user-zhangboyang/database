<?php
$name = $_GET['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>个人信息界面</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./display.css">
</head>
<body>
    <div class="d1">
        <h2>个人信息界面</h2>
        <div class="add">
            <form action="./staffselect.php" method="post" name="search" onsubmit = "return check()">
                <a href="./职工界面.php?name=<?php echo $name ?>">返回</a>
            </form>
        </div>
        <!-- 表头 -->
        <table class="table">  
            <tr class="t1">
                <th>staff_id</th>
                <th>name</th>
                <th>dept_id</th>
                <th>操作</th>
            </tr>

            <!-- echo输出样式 -->
            <style>   
                td{
                    border:1px solid black;
                    height:30px;
                    line-height: 30px;
                }

                .page{
                    display: inline-block;
                    margin:10px;
                }

            </style>

            <?php
            include("connect.php");
            
            class page{
                public $pagemax;
                public $current;
                public $url;
                public $name;

                function __construct($totalnum , $pagenum)
                {
                    $this -> pagemax = ceil($totalnum / $pagenum);//计算最大页数
                    $this-> current = isset($_GET['p']) ? $_GET['p']:1;
                    $this -> url = $_SERVER['REQUEST.URI'];
                    $this -> name = $_GET['name'];
                }

                function show($url){       
                    
                    $html = "";
                    
                    $backnum = $this->current - 1;
                    if($backnum < 1){
                        $backnum = 1;
                    }
                    $html .= "<a class='page' href='$url?p={$backnum}&name={$this->name}'>上一页</a>";

                    for($i=1;$i<=$this -> pagemax;$i++){
                        if($this -> current == $i){
                            $html .= "<span class='page' style='color:red;'>{$i}</span> ";
                        }
                        else{
                            $html .= "<a class='page' href='$url?p={$i}&name={$this->name}'>{$i}</a> ";
                        }
                    }

                    $nextnum = $this->current + 1;
                    if($nextnum > $this->pagemax){
                        $nextnum = $this->current;
                    }
                    $html .= "<a class='page' href='$url?p={$nextnum}&name={$this->name}'>下一页</a>";

                    return $html;
                }
            }

            $sql = "select * from staff where name = '$name' order by staff_id asc";
            $result = mysqli_query($conn,$sql);
            $length = mysqli_num_rows($result);
            $page = new page($length,10);
            echo $page -> show($url);


            mysqli_set_charset($conn,'UTF-8'); 
            $start = ($page ->current - 1) * 10;
            $sql = "select * from staff where name = '$name' order by staff_id asc limit $start,10";
            $result = mysqli_query($conn,$sql);
            $length = mysqli_num_rows($result);
            if($length>0){
                for($i=0;$i<$length;$i++){
                    $row = mysqli_fetch_assoc($result);
                    echo "<tr>";
                    echo "<td>{$row['staff_id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['dept_id']}</td>";
                    echo "<td>
                              <a href='个人信息修改.php?name=$name&id={$row['staff_id']}'><font color=green>修改</a>
                          </td>";
                    echo "</tr>";
                }
            }

            ?>
        </table>
    </div>

</body>
</html>