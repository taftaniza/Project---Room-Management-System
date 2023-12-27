<?php
include "conn.php";
$result = mysqli_query($conn, "SELECT tt.* FROM payment tt INNER JOIN (SELECT book_id, MAX(pay_date) AS MaxDateTime FROM payment GROUP BY book_id) groupedtt ON tt.book_id = groupedtt.book_id AND tt.pay_date = groupedtt.MaxDateTime
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>LATEST PAYMENT</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/button.css">
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


/* Create equal columns */
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
.date{
  width: 20%;
  height: 40px;
  margin: 15px;
  padding: 10px;
  background:plum;
  text-align: center;
  border-radius: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
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
                        <a href="payment_data.php" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Payment</a>
                        <div class="dropdown-menu">
                            <a href="last_payment.php" class="dropdown-item bg-primary">Last Payment </a>
                            <a href="payment_data.php" class="dropdown-item">Payment Data</a>
                        </div>
                    </div>
                      <a href="revenue.php" class="nav-item nav-link" tabindex="-1">Revenue</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="logout.php" class="nav-item nav-link " tabindex="-1">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="row">
  <div class="column">
      <div class="date">
        <p> Today : <?php echo date("Y/m/d"); ?></p>
      </div>
  <div class="column1">
    <table class="table table-hover bg-light">
  <thead>
    <tr>
      <th scope="col">#Pay ID</th>
      <th scope="col">Book ID</th>
      <th scope="col">Tenant Name</th>
      <th scope="col">Room Label</th>
      <th scope="col">Latest Payment</th>
      <th scope="col">Room Price</th>
      <th scope="col">Process</th>
    </tr>
  </thead>
    <?php while ($row = mysqli_fetch_assoc($result)):?>
  <tbody>
    <tr>
      <th scope="row">#<?php echo $row["pay_id"];?></th>
      <td><?php echo $row["book_id"];?></td>
      <td><?php echo $row["tenant_name"];?></td>
      <td><?php echo $row["room_label"];?></td>
      <td><?php echo $row["pay_date"];?></td>
      <td><?php echo 'Rp.',number_format($row["payment_total"]);?></td>
      <td><button class="button" id="button1"><a href="payment.php?book_id=<?php echo $row["book_id"]; ?>">process</a></button></td>

    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
  </div>

  </div>


</body>
</html>
