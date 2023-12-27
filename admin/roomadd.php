<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/room.css">
    <title>NEW ROOM</title>
    <style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;}
      body{
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background-image: linear-gradient(rgba(0, 0,0,0), rgba(0,0,10,0.75)),url(images/1stfloor.jpeg);
      }
      .banner{
        width:100%;
          height:100vh;
          background-size: cover;
          background-position: center;
      }
      .wrapper{
        padding: 85px;
        height: 100vh;
        width: 100vh;
      }

      .button {
          background-color:#FA3C30;
          color: #fff;
          border:none;
          border-radius:10px;
          padding:15px;
        }
      .button:hover {
            background-color:#3396E1;
            transition: 0.7s;
        }
    </style>
  </head>
  <body>

    <div class="wrapper">
      <div class="form-style-3">
        <form  class="label" action="" method="POST">
          <fieldset><legend>NEW ROOM</legend>

            <label for="Room label"><span>Room label</span><input type="text" class="input-field" id="Room label" name="room_label" value="" /></label>

            <label for="room_location"><span>Room location</span><select name="room_location" id="room_location" class="select-field">
              <option>1st floor</option>
              <option>2nd floor</option>
              <option>3rd floor</option>
              <option>4th floor</option>
              <option>5th floor</option>
            </select></label>

            <label for="room_gender"><span>Room gender</span><select name="room_gender" id="room_gender" class="select-field">
              <option value="male">male</option>
              <option value="female">female</option>
              <option value="other">other</option>
            </select></label>

            <label for="room_window"><span>Room window</span><input type="text"  id="room_window"class="input-field" name="room_window" value="" /></label>

            <label for="room_monthly_price"><span>Room monthly price</span></span><input type="text" id="room_monthly_price"class="input-field" name="room_monthly_price" placeholder="Rp."/></label>

            <label for="room_description"><span>Room description</span><textarea name="room_description" id="room_description"class="textarea-field"></textarea></label>



          </fieldset>

          <div class="action">
            <button class="button"><span><a href="room.php">BACK</span></a></button>
            <button name="Submit" value="Submit" class="button"><span>ADD</span></button>
          </div>

        </form>
</div>
<?php
include "conn.php";

    if (isset($_POST['Submit'])) {
      $room_label = $_POST['room_label'];
      $room_location = $_POST['room_location'];
      $room_gender = $_POST['room_gender'];
      $room_window = $_POST['room_window'];
      $room_monthly_price = $_POST['room_monthly_price'];
      $room_description = $_POST['room_description'];

      $result = mysqli_query($conn, "INSERT INTO room (room_label,room_location,  room_gender, room_window,room_monthly_price, room_availability,room_description ) VALUES ('$room_label', '$room_location',  '$room_gender', '$room_window','$room_monthly_price',0, '$room_description')");


    if(($_POST)>0){
    echo
    "<script>
        alert('DATA SUCCESSFULLY ADDED!');
        document.location.href= 'room.php';
    </script>";
}else{
    echo
    "<script>
        alert('DATA WASN'T SUCCESSFULLY ADDED!');
        document.location.href= 'room.php';
    </script>";
}
}

?>



</div>
  </body>
</html>
