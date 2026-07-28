<?php

include("db.php");

include("db.php");

$fullname = $_POST['fullname'];

$email = $_POST['email'];

$password = $_POST['password'];

$confirm = $_POST['confirm_password'];
if($password != $confirm){

die("Passwords do not match.");

}
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("SELECT id FROM users WHERE email=?");

$stmt->bind_param("s",$email);

$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows > 0){

die("Email already exists.");

}
$stmt = $conn->prepare("INSERT INTO users(fullname,email,password) VALUES(?,?,?)");

$stmt->bind_param("sss",$fullname,$email,$hashedPassword);

if($stmt->execute()){

echo "Registration Successful.";

}else{

echo "Registration Failed.";

}

?>
