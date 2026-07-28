<!DOCTYPE html>
<html>

<head>

<title>
Weather Application
</title>

<link rel="stylesheet" href="style.css">

</head>


<body>

<h1>
Weather Search System
</h1>


<form action="search.php" method="POST">

<input 
type="text"
name="location"
placeholder="Enter city">

<button>
Search
</button>

</form>


<div id="map"></div>


<h2>
Recent Searches
</h2>


<a href="history.php">
View History
</a>

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css">


<script src=
"https://unpkg.com/leaflet/dist/leaflet.js">
</script>
<script src="script.js"></script>

</body>

</html>