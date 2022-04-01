<?php
include("connect.php");
mysqli_set_charset($conn,'UTF-8');
$id = $_GET['id'];
$name = $_GET['name'];
$time = date("Y-m-d H:i:s",time());

$sql_goods = "SELECT storage FROM goods WHERE goods_id = '$id'";
$result_goods = mysqli_query($conn,$sql_goods);
$row_goods = mysqli_fetch_array($result_goods);
$storage = $row_goods['storage'];
if($storage > 0){
    $sql = "INSERT INTO account_detail(account_id,goods_id,time) VALUES (0,'$id','$time')";
    $judge = mysqli_query($conn,$sql);
    
    $sqll = "select * from account_detail where goods_id = '$id' and time = '$time'";
    $result = mysqli_query($conn,$sqll);
    if(!$result) print($conn->error);
    $row = mysqli_fetch_array($result);
    $account_id = $row["index"];
    
    $sql_buy="UPDATE account_detail SET account_id = '$account_id' WHERE time = '$time'";
    $result_buy = mysqli_query($conn,$sql_buy);
    if(!$result_buy) print($conn->error);
    
    $sql_account = "INSERT INTO account(account_id,total_price,pay_time,cashier_id,customer_name) VALUES('$account_id','0','$time','0','$name')";//SQL语句
    $result_account = mysqli_query($conn,$sql_account);//执行SQL语句，写入用户数据
    if(!$result_account){
        echo "$conn->error";
    }
    
    $sql_del="UPDATE account SET total_price=(SELECT sum(price) FROM acc_goods
    WHERE acc_goods.account_id=$account_id)
    WHERE account.account_id=$account_id";
    if ($conn->query($sql_del) === TRUE) {
        echo"计算成功<br>";
    } else {
        echo "Error: " . $sql_del . "<br>" . $conn->error;
    }
    
    $sql = "select * from shopping_cart where customer_name = '$name' and goods_id = '$id'";
    $result = mysqli_query($conn,$sql);
    $length = mysqli_num_rows($result);
    if($length > 0){
        $sql_cart = "DELETE FROM shopping_cart WHERE goods_id= '$id' and customer_name = '$name'";
        $result_cart = mysqli_query($conn,$sql_cart);
    }

    $sql = "UPDATE goods SET storage = $storage-1 WHERE goods_id ='$id'";
    $result = mysqli_query($conn,$sql);
    $sql = "UPDATE store SET storage = $storage-1 WHERE goods_id ='$id'";
    $result = mysqli_query($conn,$sql);
    echo "<script>alert('购买成功!');history.back();</script>";
}
else{
    echo "<script>alert('库存不足!');history.back();</script>";
}


?>