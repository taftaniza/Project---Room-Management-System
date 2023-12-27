<?php
include("conn.php");
$tenantOpt = mysqli_query($conn, "SELECT tenant_id, tenant_name FROM Tenant WHERE tenant_id NOT IN (SELECT tenant_id from `booking`) ORDER BY tenant_name");
$roomOpt = mysqli_query($conn, "SELECT room_id, room_label FROM room WHERE room_availability = 0 ORDER BY room_label");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/room.css">
    <title>NEW BOOKING</title>
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
          <fieldset><legend>NEW BOOKING</legend>

						<label for="book"><span></span><input type="hidden" value="<?php echo date("Y/m/d")?>"  id="book"class="input-field" name="book_date"/></label>

            <label for="Tenant"><span>Tenant Name</span>
							<select name="tenant_id" id="Tenant" class="select-field">
						<?php
						$i=0;
						while($row = mysqli_fetch_array($tenantOpt)){
						?>
            <option value="<?=$row["tenant_id"];?>">
						<?=$row["tenant_name"];?></option>
						<?php
						$i++;
						}
						?>
            </select></label>

						<label for="Room"><span>Room Name</span>
							<select name="room_id" id="Room" class="select-field">
							<?php
								$i=0;
								while($row = mysqli_fetch_array($roomOpt)){
							?>
              <option value="<?=$row["room_id"];?>">
								<?=$row["room_label"];?></option>
								<?php
									$i++;
								}
								?>
            </select></label>

            <label for="Start"><span>Start Date</span><input type="date"  id="Start"class="input-field" name="book_start_date"/></label>

						<label for="End"><span>End Date</span><input type="date"  id="End"class="input-field" name="book_end_date"/></label>

          </fieldset>

          <div class="action">
            <button class="button"><span><a href="booking.php">BACK</span></a></button>

						<button name="saveBooking" value="submit" class="button"><span>BOOKING</span></button>
          </div>

        </form>
</div>
</div>

<?php
if (isset($_POST['saveBooking'])) {
	$book_date = $_POST['book_date'];
	$tenant_id = $_POST['tenant_id'];
	$room_id = $_POST['room_id'];
	$book_start_date = $_POST['book_start_date'];
	$book_end_date = $_POST['book_end_date'];

	$result = mysqli_query($conn, "INSERT INTO booking (book_date,tenant_id,room_id,  book_start_date, book_end_date,status) VALUES ('$book_date','$tenant_id', '$room_id',  '$book_start_date', '$book_end_date','unpaid')");
	
	$add = mysqli_query($conn, "UPDATE room SET room_availability = 1 WHERE book_id= '$book_id'");
}
?>




  </body>
</html>
