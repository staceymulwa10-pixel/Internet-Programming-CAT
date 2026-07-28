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

<title>Create Event</title>

</head>

<body>

<h2>Create New Event</h2>

<form action="save_event.php" method="POST">

<label>Event Title</label>

<br>

<input type="text"

name="title"

required>

<br><br>

<label>Description</label>

<br>

<textarea

name="description"

required>

</textarea>

<br><br>

<label>Event Date</label>

<br>

<input

type="date"

name="event_date"

required>

<br><br>

<label>Available Slots</label>

<br>

<input

type="number"

name="slots"

required>

<br><br>

<input

type="submit"

value="Save Event">

</form>

</body>

</html>