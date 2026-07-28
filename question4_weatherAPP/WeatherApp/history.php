<?php

include "config.php";

?>

<!DOCTYPE html>

<html>

<head>

<title>
Search History
</title>


<link rel="stylesheet" href="style.css">


</head>


<body>


<h1>
Recent Weather Searches
</h1>



<?php


$sql = "SELECT * FROM searches 
ORDER BY search_time DESC";


$result = mysqli_query($conn,$sql);



if(mysqli_num_rows($result)>0){



while($row=mysqli_fetch_assoc($result)){


echo "

<div class='history-box'>


<h3>
".$row['location']."
</h3>


Temperature:
".$row['temperature']." °C

<br>


Condition:
".$row['weather']."

<br>


Coordinates:
".$row['latitude'].",
".$row['longitude']."

<br>


Date:
".$row['search_time']."



</div>


<hr>


";


}



}

else{


echo "

<h3>
No searches available
</h3>

";


}


?>


<br>


<a href="index.php">

Back to Search

</a>



</body>


</html>