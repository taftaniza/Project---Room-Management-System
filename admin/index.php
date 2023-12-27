<?php
include "conn.php";
$user = mysqli_query($conn, "SELECT * FROM login");
$roomAv = mysqli_query($conn, "SELECT COUNT(room_label) as roomAv FROM room WHERE room_availability = 0");
$roomOc = mysqli_query($conn, "SELECT COUNT(room_label) as roomOc FROM room WHERE room_availability = 1");
$tenantMa = mysqli_query($conn, "SELECT COUNT(tenant_name) as tenantMa FROM Tenant WHERE gender = 'male'");
$tenantFe = mysqli_query($conn, "SELECT COUNT(tenant_name) as tenantFe FROM Tenant WHERE gender = 'female'");
$rev = mysqli_query($conn, "SELECT SUM( payment_total)as rev from payment");

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Dashboard</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/index.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                    <a href="index.php" class="nav-item nav-link active">Dashboard</a>
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
                    <a href="revenue.php" class="nav-item nav-link" tabindex="-1">Revenue</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="logout.php" class="nav-item nav-link text-danger" tabindex="-1">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="row">
  <div class="column">
    <div class="content">
      <?php while ($admin = mysqli_fetch_assoc($user)):?>
      <h1>Welcome Back <?php echo $admin["username"];?>!</h1>
      <?php endwhile; ?>
        </div>

    <section class="main">
      <div class="data">
        <div class="card">
          <img src="images/room.jpeg">
          <h4>Room</h4>
          <p></p>
          <div class="per">
            <table>
              <tr>
                <?php while ($row = mysqli_fetch_assoc($roomAv)):?>
                <td><span><?php echo $row["roomAv"];?></span></td>
                  <?php endwhile; ?>
                <?php while ($row = mysqli_fetch_assoc($roomOc)):?>
                <td><span><?php echo $row["roomOc"];?></span></td>
                <?php endwhile; ?>
              </tr>
              <tr>
                <td>Available</td>
                <td>Occupied</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="card">
          <img src="images/tenant.png">
          <h4>Tenant</h4>
          <p></p>
          <div class="per">
            <table>
              <tr>
                <?php while ($row = mysqli_fetch_assoc($tenantMa)):?>
                <td><span><?php echo $row["tenantMa"];?></span></td>
                <?php endwhile; ?>
                <?php while ($row = mysqli_fetch_assoc($tenantFe)):?>
                <td><span><?php echo $row["tenantFe"];?></span></td>
                <?php endwhile; ?>
              </tr>
              <tr>
                <td>Male</td>
                <td>Female</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="card">
          <img src="images/money.jpeg">
          <h4>Revenue</h4>
          <p></p>
          <div class="per">
            <table>
              <?php while ($row = mysqli_fetch_assoc($rev)):?>
              <tr>
                <td style="padding-bottom: 15px;"><span><?php echo 'Rp.',number_format($row["rev"]);?></span></td>
              </tr>
                <?php endwhile; ?>
              <tr>
                <td></td>
              </tr>
            </table>
          </div>
        </div>
          </section>

  </div>
</div>
</div>


</body>
</html>
