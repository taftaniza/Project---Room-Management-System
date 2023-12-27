<?php
include 'conn.php';

$book_id= $_GET["book_id"];

$rows = mysqli_query($conn, "SELECT booking.book_id, booking.room_id, booking.book_date, Tenant.tenant_name,Tenant.tenant_id, room.room_label, room.room_monthly_price FROM booking JOIN room ON room.room_id = booking.room_id JOIN Tenant ON Tenant.tenant_id = booking.tenant_id WHERE booking.book_id= '".$_GET['book_id']."'");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/room.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <title>PAYMENT</title>
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

    <div class="wrapper">
      <div class="form-style-3">
        <form  class="label" action="" method="POST">
          <fieldset><legend>PAYMENT</legend>

            <label><span></span>
              <input type="hidden" class="input-field" name="pay_id"></label>

              <?php
                $i=0;
                while($row = mysqli_fetch_array($rows)){
              ?>

              <label><span></span>
                <input type="hidden" class="input-field" name="book_id" value="<?php echo $row['book_id']; ?>"></label>

            <label for="tenant_name"><span>Tenant Name</span>
              <input type="text" class="input-field" id="tenant_name" name="tenant_name" value="<?php echo $row['tenant_name']; ?>"/></label>

              <input type="hidden" class="input-field" name="tenant_id" value="<?php echo $row['tenant_id']; ?>"></label>

              <input type="hidden" class="input-field" name="room_id" value="<?php echo $row['room_id']; ?>"></label>

              <label for="room_label"><span>Room label</span>
                <input type="text" class="input-field" id="room_label" name="room_label" value="<?php echo $row['room_label']; ?>"/></label>

                <label for="pay_date"><span>Payment date</span>
                  <input type="date" class="input-field" id="pay_date" name="pay_date"/></label>

                  <label for="room_monthly_price"><span>Room Price</span>
                    <input type="text" class="input-field" id="room_monthly_price" name="room_monthly_price" value="<?php echo $row['room_monthly_price']; ?>"/></label>

                    <?php
                      $i++;
                    }
                    ?>

            <label for="pay_methode"><span>Payment Methode</span>
              <select name="pay_methode" id="pay_methode" class="select-field">
              <option value="cash">cash</option>
              <option value="transfer">transfer</option>
            </select></label>

          </fieldset>

          <div class="action">
            <button class="button"><span><a href="last_payment.php">BACK</span></a></button>

            <button name="submit" class="button"><span>PROCESS</span></button>
          </div>

        </form>

        <?php
        if(isset($_POST['submit'])) {
            $book_id = $_POST['book_id'];
            $tenant_name = $_POST['tenant_name'];
            $tenant_id = $_POST['tenant_id'];
            $room_id = $_POST['room_id'];
            $room_label = $_POST['room_label'];
            $pay_date = $_POST['pay_date'];
            $room_monthly_price = $_POST['room_monthly_price'];
            $pay_methode = $_POST['pay_methode'];


            $result = mysqli_query($conn, "INSERT INTO `payment` ( book_id,tenant_name,tenant_id,room_id,room_label,pay_date, payment_total,pay_methode)
            VALUES ('$book_id','$tenant_name','$tenant_id','$room_id','$room_label', '$pay_date', '$payment_total','$pay_methode')");

            $add = mysqli_query($conn, "UPDATE booking SET status = 'paid' WHERE book_id= '$book_id'");

          if(($_POST)>0){
          echo
          '<script>
          setTimeout(function() {
           swal({
             title: "Payment Successful",
             text: "Thank you!",
             type: "success"
           }, function() {
               window.location = "payment_data.php";
           });
       }, 1000);
          </script>';
        }
        else {
          echo '<script>
          setTimeout(function() {
           swal({
             title: "Payment Failed!",
             text: "Try again later",
             type: "warning"
           }, function() {
               window.location = "booking.php";
           });
       }, 1000);</script>';
        };
      }


      ?>

</div>
</div>
  </body>
</html>
