<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/room.css">
    <title>EDIT ROOM</title>
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
        background-image: linear-gradient(rgba(0, 0,0,0), rgba(0,0,10,0.75)),url(images/4st.jpeg);
      }
      .banner{
        width:100%;
          height:100vh;
          background-size: cover;
          background-position: center;
      }
      .wrapper{
        padding: 30px;
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

    <?php
  require 'conn.php';

  //retrieve data from url
  $room_id= $_GET["room_id"];

  //query data room base on room_id
  $row= query("SELECT * FROM room WHERE room_id= '$room_id'")[0];

  //button check
  if(isset($_POST["submit"])){

  //check data success to change or not
  if(edit($_POST)>0){
      echo
      "<script>
          alert('DATA SUCCESSFULLY UPDATE!');
          document.location.href= 'room.php';
      </script>";
  }else{
      echo
      "<script>
          alert('DATA WASN'T SUCCESSFULLY UPDATE!');
          document.location.href= 'room.php';
      </script>";
  }
   }
  ?>

    <div class="wrapper">
      <div class="form-style-3">
        <form  class="label" action="" method="POST">
          <fieldset><legend>ROOM UPDATE</legend>

            <label><span></span>
              <input type="hidden" class="input-field" name="room_id" value="<?php echo $row['room_id']; ?>"/></label>

            <label for="room_label"><span>Room label</span>
              <input type="text" class="input-field" id="room_label" name="room_label" value="<?php echo $row['room_label']; ?>"/></label>

            <label for="room_location"><span>Room location</span>
              <select name="room_location" id="room_location" class="select-field" value="<?php echo $row['room_location']; ?>">
              <option>1st floor</option>
              <option>2nd floor</option>
              <option>3rd floor</option>
              <option>4th floor</option>
              <option>5th floor</option>
            </select></label>

            <label for="room_gender"><span>Room gender</span>
              <select name="room_gender" id="room_gender" class="select-field" value="<?php echo $row['room_gender']; ?>">
              <option value="male">male</option>
              <option value="female">female</option>
              <option value="other">other</option>
            </select></label>

            <label for="room_window"><span>Room window</span>
              <input type="text"  id="room_window"class="input-field" name="room_window" value="<?php echo $row['room_window']; ?>" /></label>

            <label for="room_monthly_price"><span>Room monthly price</span>
              <input type="text" id="room_monthly_price"class="input-field" name="room_monthly_price" value="<?php echo $row['room_monthly_price']; ?>"/></label>

            <label for="room_description"><span>Room description</span></span>
              <input type="text" id="room_description"class="input-field1" name="room_description" value="<?php echo $row['room_description']; ?>"/></label>
          </fieldset>

          <div class="action">
            <button class="button"><span><a href="room.php">BACK</span></a></button>

            <button name="submit" class="button"><span>UPDATE</span></button>
          </div>

        </form>
</div>
</div>
  </body>
</html>
