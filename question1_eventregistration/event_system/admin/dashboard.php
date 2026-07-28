<?php

session_start();

if(!isset($_SESSION['user_id']) || $_SESSION['role']!="admin"){

header("Location: ../login.php");

exit();

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Admin Dashboard</title>

</head>

<body>

<h2>

Welcome Administrator

<h3>Administrator Menu</h3>

<a href="create_event.php">

Create New Event

</a>

<br><br>

<a href="view_events.php">

View Events

</a>

<br><br>

<a href="../logout.php">

Logout

</a>

</body>

</html>