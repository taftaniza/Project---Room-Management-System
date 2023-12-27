<?php
$conn = mysqli_connect("localhost","root","","housing");

function query($query){
    global $conn;
    $result= mysqli_query($conn, $query);
    $rows= [];
    while ($row= mysqli_fetch_assoc($result)){
        $rows[]= $row;
    }
    return $rows;
}


function edit($data){
    global $conn;
    //collect data
    $room_id = htmlspecialchars($data["room_id"]);
    $room_label = htmlspecialchars($data["room_label"]);
    $room_location = htmlspecialchars($data["room_location"]);
    $room_gender = htmlspecialchars($data["room_gender"]);
    $room_window = htmlspecialchars($data["room_window"]);
    $room_monthly_price = htmlspecialchars($data["room_monthly_price"]);
    $room_description = htmlspecialchars($data["room_description"]);

    $query= "UPDATE room SET
            room_id= '$room_id',
            room_label= '$room_label',
            room_location= '$room_location',
            room_gender= '$room_gender',
            room_window= '$room_window',
            room_monthly_price= '$room_monthly_price',
            room_description= '$room_description'

            WHERE room_id= '$room_id'";

    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}


?>
