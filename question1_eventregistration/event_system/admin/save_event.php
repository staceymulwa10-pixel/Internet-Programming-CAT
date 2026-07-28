<?php

session_start();

include("../db.php");

$title=$_POST['title'];

$description=$_POST['description'];

$event_date=$_POST['event_date'];

$slots=$_POST['slots'];

$stmt=$conn->prepare("INSERT INTO events(title,description,event_date,slots)

VALUES(?,?,?,?)");

$stmt->bind_param("sssi",

$title,

$description,

$event_date,

$slots);

if($stmt->execute()){

echo "Event Created Successfully";

}else{

echo "Error Creating Event";

}

?>