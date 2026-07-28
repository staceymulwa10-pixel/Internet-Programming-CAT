<?php

session_start();

if(!isset($_SESSION['user_id']) || $_SESSION['role']!="admin"){

header("Location: ../login.php");

exit();

}

include("../db.php");

$id=$_POST['id'];

$title=$_POST['title'];

$description=$_POST['description'];

$event_date=$_POST['event_date'];

$slots=$_POST['slots'];

$stmt=$conn->prepare("UPDATE events

SET title=?,description=?,event_date=?,slots=?

WHERE id=?");

$stmt->bind_param("sssii",

$title,

$description,

$event_date,

$slots,

$id);

if($stmt->execute()){

header("Location:view_events.php");

exit();

}else{

echo "Failed to update event.";

}

?>