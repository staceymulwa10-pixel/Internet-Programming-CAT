<?php

session_start();

if(!isset($_SESSION['user_id'])){

header("Location: login.php");

exit();

}

include("db.php");

$user_id=$_SESSION['user_id'];

$sql="SELECT events.title,
events.description,
events.event_date

FROM registrations

INNER JOIN events

ON registrations.event_id=events.id

WHERE registrations.user_id=?";

$stmt=$conn->prepare($sql);

$stmt->bind_param("i",$user_id);

$stmt->execute();

$result=$stmt->get_result();

?>
<!DOCTYPE html>

<html>

<head>

<title>My Registered Events</title>

</head>

<body>

<h2>My Registered Events</h2>

<table border="1">

<tr>

<th>Title</th>

<th>Description</th>

<th>Date</th>

</tr>

<?php

while($row=$result->fetch_assoc()){

?>

<tr>

<td><?php echo htmlspecialchars($row['title']); ?></td>

<td><?php echo htmlspecialchars($row['description']); ?></td>

<td><?php echo $row['event_date']; ?></td>

</tr>

<?php

}

?>

</table>

<br>

<a href="user_dashboard.php">

Back

</a>

</body>

</html>
