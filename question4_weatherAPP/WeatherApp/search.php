<?php

include "config.php";

$location = trim($_POST['location']);

// Check cache first
$check = mysqli_query($conn,
"SELECT * FROM cache WHERE location='$location'");

if(mysqli_num_rows($check)>0){

$row=mysqli_fetch_assoc($check);

$temp=$row['temperature'];
$weather=$row['weather'];
$lat=$row['latitude'];
$lon=$row['longitude'];

echo "

<h2>Weather Results (From Cache)</h2>

Location: $location <br>

Temperature: $temp °C <br>

Condition: $weather <br>

Latitude: $lat <br>

Longitude: $lon <br><br>

<a href='index.php'>Search Again</a>

<script>

localStorage.setItem('lat','$lat');
localStorage.setItem('lon','$lon');
localStorage.setItem('city','$location');

</script>

";

exit();

}

// API KEY
$apikey="9934e81b6b7df0d5bebd87a0ea236384";

$url="https://api.openweathermap.org/data/2.5/weather?q=".$location."&appid=".$apikey."&units=metric";

$response=@file_get_contents($url);

if(!$response){

echo "<h3>Weather service unavailable. Please try again later.</h3>";

exit();

}

$data=json_decode($response,true);

$temp=$data['main']['temp'];
$weather=$data['weather'][0]['description'];
$lat=$data['coord']['lat'];
$lon=$data['coord']['lon'];

// Save search history
mysqli_query($conn,

"INSERT INTO searches(location,temperature,weather,latitude,longitude)

VALUES('$location','$temp','$weather','$lat','$lon')");

// Save cache

mysqli_query($conn,

"INSERT INTO cache(location,temperature,weather,latitude,longitude)

VALUES('$location','$temp','$weather','$lat','$lon')

ON DUPLICATE KEY UPDATE

temperature='$temp',

weather='$weather',

latitude='$lat',

longitude='$lon',

cached_at=CURRENT_TIMESTAMP");

echo "

<h2>Weather Results (Live API)</h2>

Location: $location <br>

Temperature: $temp °C <br>

Condition: $weather <br>

Latitude: $lat <br>

Longitude: $lon <br><br>

<a href='index.php'>Search Again</a>

<script>

localStorage.setItem('lat','$lat');
localStorage.setItem('lon','$lon');
localStorage.setItem('city','$location');

</script>

";

?>