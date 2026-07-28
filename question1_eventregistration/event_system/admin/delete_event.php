<?php

session_start();

if(!isset($_SESSION['user_id']) || $_SESSION['role']!="admin"){

header("Location: ../login.php");

exit();

}

include("../db.php");

$id=$_GET['id'];

$stmt=$conn->prepare("DELETE FROM events WHERE id=?");

$stmt->bind_param("i",$id);

if($stmt->execute()){

header("Location:view_events.php");

exit();

}else{

echo "Unable to delete event.";

}

?>