<?php

include("db.php");

$sql="SELECT

events.id,

events.title,

events.slots-

COUNT(registrations.id)

AS remaining

FROM events

LEFT JOIN registrations

ON events.id=registrations.event_id

GROUP BY events.id";

$result=$conn->query($sql);

$data=[];

while($row=$result->fetch_assoc()){

$data[]=$row;

}

echo json_encode($data);
function loadSlots(){

fetch("fetch_slots.php")

.then(response=>response.json())

.then(data=>{

console.log(data);

});

}

setInterval(loadSlots,5000);

?>
