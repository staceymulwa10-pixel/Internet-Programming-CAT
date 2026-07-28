<?php

$conn = mysqli_connect(
"localhost",
"root",
"",
"weather_app"
);

if(!$conn){
die("Database connection failed");
}

?>