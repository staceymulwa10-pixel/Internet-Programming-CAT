<?php

$servername="localhost";

$username="root";

$password="";

$database="event_system";

$conn=new mysqli($servername,$username,$password,$database);

if($conn->connect_error){

die("Connection Failed");

}

?>