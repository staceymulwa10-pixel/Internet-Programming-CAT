<?php

session_start();

include("db.php");

$email = $_POST['email'];

$password = $_POST['password'];
$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");

$stmt->bind_param("s",$email);

$stmt->execute();

$result = $stmt->get_result();
if($result->num_rows==1){

$user=$result->fetch_assoc();

}else{

die("Invalid Email or Password");

}
if(password_verify($password,$user['password'])){

$_SESSION['user_id']=$user['id'];

$_SESSION['fullname']=$user['fullname'];

$_SESSION['role']=$user['role'];

}else{

die("Invalid Email or Password");

}
if($user['role']=="admin"){

header("Location: admin/dashboard.php");

}else{

header("Location: user_dashboard.php");

}

exit();
?>