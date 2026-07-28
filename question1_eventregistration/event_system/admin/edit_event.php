<?php

session_start();

if(!isset($_SESSION['user_id']) || $_SESSION['role']!="admin"){

header("Location: ../login.php");

exit();

}

include("../db.php");

$id=$_GET['id'];

$stmt=$conn->prepare("SELECT * FROM events WHERE id=?");

$stmt->bind_param("i",$id);

$stmt->execute();

$result=$stmt->get_result();

$event=$result->fetch_assoc();

?>
<!DOCTYPE html>

<html>

<head>

<title>Edit Event</title>

</head>

<body>

<h2>Edit Event</h2>

<form action="update_event.php" method="POST">

<input type="hidden"

name="id"

value="<?php echo $event['id']; ?>">

<label>Title</label>

<br>

<input

type="text"

name="title"

value="<?php echo htmlspecialchars($event['title']); ?>"

required>

<br><br>

<label>Description</label>

<br>

<textarea

name="description"

required><?php echo htmlspecialchars($event['description']); ?></textarea>

<br><br>

<label>Date</label>

<br>

<input

type="date"

name="event_date"

value="<?php echo $event['event_date']; ?>"

required>

<br><br>

<label>Available Slots</label>

<br>

<input

type="number"

name="slots"

value="<?php echo $event['slots']; ?>"

required>

<br><br>

<input

type="submit"

value="Update Event">

</form>

</body>

</html>