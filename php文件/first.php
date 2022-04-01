<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
include("connect.php");
//注册新用户

$sql = "INSERT INTO customer VALUES (6, 2, 'ling',null)";

if ($conn->query($sql) === TRUE) {
    echo"插入顾客信息成功<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
/*****************/

//某个用户选择了某个商品
//首次需要创建账单

$sql="INSERT INTO account(account_id) VALUES (6)";
if ($conn->query($sql) === TRUE) {
    echo"订单创建成功<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE customer SET account_id= 1 WHERE customer_id=5";
if ($conn->query($sql) === TRUE) {
    echo"顾客订单修改成功<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//普通添加商品
$sql="INSERT INTO account_detail(account_id,goods_id) VALUES (5,2)";
if ($conn->query($sql) === TRUE) {
    echo"商品添加成功<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

/*****************/

//结算
$sql="UPDATE account SET total_price=(SELECT sum(price) FROM acc_goods
WHERE acc_goods.account_id='5')
WHERE account.account_id='5'";
if ($conn->query($sql) === TRUE) {
    echo"计算成功<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql="UPDATE account SET pay_time=CURRENT_TIMESTAMP,cashier_id=1
WHERE account_id=5";
if ($conn->query($sql) === TRUE) {
    echo"结算成功<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
/*****************/

$conn->close();
?>

</body>
</html>