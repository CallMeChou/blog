<?php

//接收提交的数据
$stu_name = $_POST['stu_name'];
$stu_num = $_POST['stu_num'];
$stu_pwd = $_POST['pwd'];
$email = $_POST['email'];


//表单过滤

$stu_name = trim($stu_name);//过滤空格
$stu_num = trim($stu_num);//过滤空格
$stu_pwd=trim($stu_pwd);
$email = trim($email);//过滤空格
//开始判断

if($stu_name == "" && $stu_num == "" && $stu_pwd == "" && $email == ""){
    echo "啥都还没填呢!";
}else if($stu_num == "" && $stu_pwd == ""){
    echo "学号和密码不能为空！";
}else if ($stu_pwd == "") {
    echo "密码不能为空！";
}else if ($stu_name == "") {
    echo "学号不能为空！";
}else if ($email == "") {
    echo "邮箱不能为空！";
}else{
	
	

// 创建连接

$servername = "1.15.3.44";
$username = "daka";
$pwd = "1234c";
$dbname = "daka";
 
$conn = new mysqli($servername, $username, $pwd, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}else{
	$sql_select = "SELECT stu_name,stu_num,password,email FROM user WHERE(stu_name ='$stu_name' and stu_num='$stu_num' and password='$stu_pwd' and email='$email')"; //执行SQL语句
	$ret = mysqli_query($conn, $sql_select);
	$row = mysqli_fetch_array($ret); //判断用户名是否已存在
	if ($row) { //用户名已存在，显示提示信息
	  echo "账号已经在服务器挂机了，请勿重复添加";
	$conn->close();
	}else{

$sql = "INSERT INTO user(stu_name,stu_num,password,email) VALUES('$stu_name','$stu_num','$stu_pwd','$email')";
if(!(mysqli_query($conn,$sql))){
 echo "数据插入失败";
	$conn->close();
 }else{
 echo "数据更新成功!";
$conn->close();
		
 };
	
	
	
}}
	
	
}





?>
