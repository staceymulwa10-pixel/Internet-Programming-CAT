<?php

session_start();

include("db.php");
if($_POST['token']!=$_SESSION['token']){

die("Invalid CSRF Token.");

}

$user_id = $_SESSION['user_id'];

$event_id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM registrations WHERE user_id=? AND event_id=?");

$stmt->bind_param("ii",$user_id,$event_id);

$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows>0){

die("You have already registered for this event.");

}
$stmt = $conn->prepare("SELECT slots FROM events WHERE id=?");

$stmt->bind_param("i",$event_id);

$stmt->execute();

$result = $stmt->get_result();

$event = $result->fetch_assoc();
$stmt = $conn->prepare("SELECT COUNT(*) AS total FROM registrations WHERE event_id=?");

$stmt->bind_param("i",$event_id);

$stmt->execute();

$countResult = $stmt->get_result();

$count = $countResult->fetch_assoc();
if($count['total'] >= $event['slots']){

die("Sorry, this event is already full.");

}
$stmt = $conn->prepare("INSERT INTO registrations(user_id,event_id) VALUES(?,?)");

$stmt->bind_param("ii",$user_id,$event_id);

if($stmt->execute()){

echo "Registration Successful.";

}else{

echo "Registration Failed.";

}
