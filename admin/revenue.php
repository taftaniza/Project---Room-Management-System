<?php
include "conn.php";
$apr = mysqli_query($conn, "SELECT SUM( payment_total)as revenue from payment WHERE monthname(pay_date)='April'");
$may = mysqli_query($conn, "SELECT SUM(  payment_total)as revenue from payment WHERE monthname(pay_date)='May'");
$jun = mysqli_query($conn, "SELECT SUM(  payment_total)as revenue from payment WHERE monthname(pay_date)='June'");
$jul = mysqli_query($conn, "SELECT SUM(  payment_total)as revenue from payment WHERE monthname(pay_date)='July'");
$aug = mysqli_query($conn, "SELECT SUM( payment_total)as revenue from payment WHERE monthname(pay_date)='August'");
$sept = mysqli_query($conn, "SELECT SUM( payment_total)as revenue from payment WHERE monthname(pay_date)='September'");
$total = mysqli_query($conn, "SELECT SUM(  payment_total)as revenue from payment");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>REVENUE</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
table {
  border-collapse: collapse;
  width: 100%;
  border: solid blue;
  text-align: center;
}
.column {
  width: 70%;
  height: 85vh;
  margin-left:auto;
  margin-right:auto;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width:600px) {
  .column {
    width: 100%;
  }
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
                    <a href="room.php" class="nav-item nav-link">Room</a>
                    <a href="tenant.php" class="nav-item nav-link">Tenant</a>
                    <a href="booking.php" class="nav-item nav-link">Booking</a>
                    <div class="nav-item dropdown">
                        <a href="payment_data.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Payment</a>
                        <div class="dropdown-menu">
                          <a href="last_payment.php" class="dropdown-item">Last Payment </a>
                            <a href="payment_data.php" class="dropdown-item">Payment Data</a>
                        </div>
                    </div>
                    <a href="revenue.php" class="nav-item nav-link active" tabindex="-1">Revenue</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="../login.php" class="nav-item nav-link">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="row">
  <div class="column">
  <div class="column1">
    <table class="table table-hover bg-light">
  <thead>
    <tr>
      <th scope="col">#No</th>
      <th scope="col">Monthly Period</th>
      <th scope="col">Revenue</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <th scope="row">#1</th>
      <th scope="row">April</th>
      <?php while ($row = mysqli_fetch_assoc($apr)):?>
      <th scope="row"><?php echo 'Rp.',number_format($row["revenue"]);?></th>
      <?php endwhile; ?>
    </tr>
    <tr>
        <th scope="row">#2</th>
      <th scope="row">May</th>
      <?php while ($row = mysqli_fetch_assoc($may)):?>
      <th scope="row"><?php echo 'Rp.',number_format($row["revenue"]);?></th>
      <?php endwhile; ?>
    </tr>
    <tr>
        <th scope="row">#3</th>
      <th scope="row">June</th>
      <?php while ($row = mysqli_fetch_assoc($jun)):?>
      <th scope="row"><?php echo 'Rp.',number_format($row["revenue"]);?></th>
      <?php endwhile; ?>
    </tr>
    <tr>
        <th scope="row">#4</th>
      <th scope="row">July</th>
      <?php while ($row = mysqli_fetch_assoc($jul)):?>
      <th scope="row"><?php echo 'Rp.',number_format($row["revenue"]);?></th>
      <?php endwhile; ?>
    </tr>
    <tr>
        <th scope="row">#5</th>
      <th scope="row">August</th>
      <?php while ($row = mysqli_fetch_assoc($aug)):?>
      <th scope="row"><?php echo 'Rp.',number_format($row["revenue"]);?></th>
      <?php endwhile; ?>
    </tr>
    <tr>
        <th scope="row">#6</th>
      <th scope="row">September</th>
      <?php while ($row = mysqli_fetch_assoc($sept)):?>
      <th scope="row"><?php echo 'Rp.',number_format($row["revenue"]);?></th>
      <?php endwhile; ?>
    </tr>
    <tr>
        <th scope="row" colspan="2"><h5>Total Revenue :</h5></th>
      <?php while ($row = mysqli_fetch_assoc($total)):?>
      <th scope="row"><?php echo 'Rp.',number_format($row["revenue"]);?></th>
      <?php endwhile; ?>
    </tr>
  </tbody>
</table>
  </div>

  </div>


</body>
</html>
