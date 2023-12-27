<?php
include "conn.php";
$result = mysqli_query($conn, "SELECT * FROM Tenant");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>TENANT</title>
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
table{
  width: 50px;
  height:200px;
  font-size: 12px;
}
.column {
  width: 80%;
  height: 85vh;
  margin-left:auto;
  margin-right:auto;
  overflow-y: auto;
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
                    <a href="tenant.php" class="nav-item nav-link active">Tenant</a>
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
                    <a href="logout.php" class="nav-item nav-link " tabindex="-1">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="row">
  <div class="column">
    <button class="buttonAd" ><a style="text-decoration:none; color:white" href="tenantadd.php">+ New Tenant</a></button></td>



  <div class="column1">
    <table class="table table-hover bg-light">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Tenant Name</th>
      <th scope="col">Tenant Adress</th>
      <th scope="col">Tenant ID Card</th>
      <th scope="col">Tenant Phone</th>
      <th scope="col">Tenant Email</th>
      <th scope="col">Tenant Emergency CP</th>
      <th scope="col">Tenant Emergency CP phone</th>
      <th scope="col">Tenant Emergency CP Email</th>
      <th scope="col">Tenant Bank Account</th>
      <th scope="col">Tenant Bank Account No</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
    <?php while ($row = mysqli_fetch_assoc($result)):?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row["tenant_id"];?></th>

      <td><?php echo $row["tenant_name"];?></td>
      <td><?php echo $row["tenant_address"];?></td>
      <td><?php echo $row["tenant_ktp_no"];?></td>
      <td><?php echo $row["tenant_phone"];?></td>
      <td><?php echo $row["tenant_email"];?></td>
      <td><?php echo $row["tenant_emergcp"];?></td>
      <td><?php echo $row["tenant_emergcp_phone"];?></td>
      <td><?php echo $row["tenant_emergcp_email"];?></td>
      <td><?php echo $row["tenant_bankaccount"];?></td>
      <td><?php echo $row["tenant_bankaccount_no"];?></td>

      <td><button class="button1"><a style="text-decoration:none"href="tenant.up.php?tenant_id=<?php echo $row["tenant_id"]; ?>">Update</a></button>
      <button class="button2"><a style="text-decoration:none"href="tenant.del.php?tenant_id=<?php echo $row["tenant_id"];?>">Delete</a></button></td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>
  </div>

  </div>


</body>
</html>
