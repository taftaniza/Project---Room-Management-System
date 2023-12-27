<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
   include('conn.php');
   $sql = "DELETE FROM room WHERE room_id= ". $_GET["room_id"]. "";
   if (mysqli_query($conn, $sql)) {
       echo "Record deleted successfully";
           header("location:room.php");
   } else {
       echo "Error deleting record: " . mysqli_error($conn);
   }
   mysqli_close($conn);
   ?>


  </body>
</html>
