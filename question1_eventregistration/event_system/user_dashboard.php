<?php

session_start();

if(!isset($_SESSION['user_id'])){

header("Location: login.php");

exit();

}

?>

<!DOCTYPE html>

<html>

<head>

<title>User Dashboard</title>

</head>

<body>

<h2>

Welcome

<h3>User Menu</h3>

<a href="view_events.php">
View Available Events
</a>

<br><br>

<a href="my_events.php">
My Registered Events
</a>

<br><br>

<a href="logout.php">
Logout
</a>