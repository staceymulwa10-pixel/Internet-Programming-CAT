<?php

session_start();

if(!isset($_SESSION['user_id'])){

header("Location: login.php");

exit();

}

include("db.php");

$sql = "SELECT
events.id,
events.title,
events.description,
events.event_date,
events.slots,
(events.slots - COUNT(registrations.id)) AS remaining_slots

FROM events

LEFT JOIN registrations
ON events.id = registrations.event_id

GROUP BY
events.id,
events.title,
events.description,
events.event_date,
events.slots";

$result = $conn->query($sql);

?>
<!DOCTYPE html>

<html>

<head>

<title>Available Events</title>

</head>

<body>

<h2>Available Events</h2>

<table border="1">

<tr>

<th>Title</th>

<th>Description</th>

<th>Date</th>

<th>Remaining Slots</th>

<th>Action</th>

</tr>

<?php

while($row=$result->fetch_assoc()){

?>

<tr>

<td><?php echo htmlspecialchars($row['title']); ?></td>

<td><?php echo htmlspecialchars($row['description']); ?></td>

<td><?php echo $row['event_date']; ?></td>

<td><?php echo $row['remaining_slots']; ?></td>

<td>

<a href="register_event.php?id=<?php echo $row['id']; ?>">

Register

</a>

</td>

</tr>

<?php

}

?>

</table>

</body>

</html>