<!DOCTYPE html>
<html lang="en">
<head>
<title>AVAILABLE ROOM</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/button.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
* {
    font-family: sans-serif;
}
body {
  margin: 0;
  background-image: linear-gradient(rgba(12, 155, 171, 0.5), rgba(0,0,10,0.75)),url(images/1stfloor.jpeg);
  background-size: cover;
  background-position: center;
}
table{
  border-collapse: collapse;
  width: 100%;
}
.column {
  width: 60%;
  height: 85vh;
  margin-left:auto;
  margin-right:auto;
  overflow-y: auto;
}
.check{
  margin: auto;
  padding: 20px;
}
</style>
</head>

<body>

<div class="m-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">Fuzo Housing</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="index.php" class="nav-item nav-link">Dashboard</a>
                    <a href="room.php" class="nav-item nav-link active">Room</a>
                    <a href="tenant.php" class="nav-item nav-link">Tenant</a>
                    <a href="booking.php" class="nav-item nav-link">Booking</a>
                    <div class="nav-item dropdown">
                        <a href="payment_data.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Payment</a>
                        <div class="dropdown-menu">
                          <a href="last_payment.php" class="dropdown-item">Last Payment </a>
                            <a href="payment_data.php" class="dropdown-item">Payment Data</a>
                        </div>
                    </div>
                      <a href="revenue.php" class="nav-item nav-link" tabindex="-1">Revenue</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="logout.php" class="nav-item nav-link">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="row">
  <div class="column">

    <button class="buttonAd" ><a style="text-decoration:none; color:white" href="bookadd.php">+ New Booking</a></button>

    <button class="buttonAd" ><a style="text-decoration:none; color:white" href="booking.php"><< Back</a></button>


  <div class="column1">
    <table class="table table-hover bg-light">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Room Label</th>
      <th scope="col">Room Gender</th>
      <th scope="col">Room Monthly Price</th>
      <th scope="col">Room Description</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "conn.php";
    $form=date('Y-m-d', strtotime($_POST['from']));
    $to=date('Y-m-d', strtotime($_POST['to']));

    $oquery=$conn->query("SELECT distinct(room_id),room_label,room_gender, room_monthly_price, room_description FROM room WHERE room_id NOT IN (SELECT room_id FROM booking WHERE NOT (book_start_date > '$form' OR book_end_date < '$to'))");

      while($orow = $oquery->fetch_array()) {
    ?>
    <tr>
      <th scope="row"><?php echo $orow["room_id"];?></th>
      <td><?php echo $orow["room_label"];?></td>
      <td><?php echo $orow["room_gender"];?></td>
      <td><?php echo 'Rp.',number_format($orow["room_monthly_price"]);?></td>
      <td><?php echo $orow["room_description"];?></td>
    </tr>
    <?php
   } ?>
  </tbody>
</table>
  </div>

  </div>


</body>
</html>
