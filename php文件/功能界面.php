<?php
include("connect.php");
mysqli_set_charset($conn,'UTF-8');
$name = $_GET['name'];

$sql = "SELECT dept_id FROM staff WHERE name='$name'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$dept_id = $row['dept_id'];
if($dept_id == 0){
    echo "<script>alert('未入职部门请填写个人信息!');history.back();</script>";
}
else if($dept_id == 1){
    header("location:商品管理员功能界面.php?name=$name");
}
else if($dept_id == 2){
    header("location:仓库管理员功能界面.php?name=$name");
}
else if($dept_id == 3){
    header("location:收银员功能界面.php?name=$name");
}
?>