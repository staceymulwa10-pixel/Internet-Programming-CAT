<?php

session_start();

include("../db.php");

$sql = "SELECT
events.id,
events.title,
events.description,
events.event_date,
events.slots AS total_slots,
COUNT(registrations.id) AS registered_users,
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

$result=$conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

<title>View Events</title>

</head>

<body>

<h2>All Events</h2>

<table border="1">

<tr>

<th>ID</th>

<th>Title</th>

<th>Description</th>

<th>Date</th>

<th>Total Slots</th>

<th>Registered Users</th>

<th>Remaining Slots</th>

<th>Actions</th>

</tr>

<?php

while($row=$result->fetch_assoc()){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo htmlspecialchars($row['title']); ?></td>

<td><?php echo htmlspecialchars($row['description']); ?></td>

<td><?php echo $row['event_date']; ?></td>

<td><?php echo $row['total_slots']; ?></td>

<td><?php echo $row['registered_users']; ?></td>

<td><?php echo $row['remaining_slots']; ?></td>

<td>

<a href="edit_event.php?id=<?php echo $row['id']; ?>">

Edit

</a>

|

<a href="delete_event.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Are you sure you want to delete this event?');">
Delete
</a>

</td>

</tr>

<?php

}

?>

</table>

</body>

</html>