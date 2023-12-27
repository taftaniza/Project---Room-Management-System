<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/tenant.css">
    <title>NEW TENANT</title>
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
        padding: 30px;
        height: 100vh;
        width: 100vh;
      }
</style>

    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="form-style-3">
        <form  class="label" action="" method="POST">
          <fieldset><legend>Tenant Information</legend>

            <label for="tenant_name"><span>Name <span class="required">*</span></span><input type="text" class="input-field" name="tenant_name" value="" /></label>
            <label for="tenant_ktp_no"><span>ID Num<span class="required">*</span></span><input type="text" class="input-field" name="tenant_ktp_no" value="" /></label>
            <label for="tenant_address"><span>Address<span class="required">*</span></span><input type="text" class="input-field" name="tenant_address" value="" /></label>
            <label for="gender"><span>Gender</span><select name="gender" class="select-field">
              <option value="male">male</option>
              <option value="female">female</option>
              <option value="other">other</option>
            </select></label>
            <label for="tenant_phone"><span>Phone Num <span class="required">*</span></span><input type="text" class="input-field" name="tenant_phone" value="" /></label>
            <label for="tenant_email"><span>Email<span class="required">*</span></span><input type="text" class="input-field" name="tenant_email" value="" /></label>
            <label for="tenant_bankaccount"><span>Bank Account<span class="required">*</span></span><input type="text" class="input-field" name="tenant_bankaccount" value="" /></label>
            <label for="tenant_bankaccount_no"><span>Bank Num<span class="required">*</span></span><input type="text" class="input-field" name="tenant_bankaccount_no" value="" /></label>

          </fieldset>

          <fieldset class="tes"><legend>Emergency Contact</legend>
            <label for="tenant_emergcp"><span>Person<span class="required">*</span></span><input type="text" class="input-field" name="tenant_emergcp" value="" /></label>
            <label for="tenant_emergcp_phone"><span>Contact Person<span class="required">*</span></span><input type="text" class="input-field" name="tenant_emergcp_phone" value="" /></label>
            <label for="tenant_emergcp_email"><span>Person Email<span class="required">*</span></span><input type="text" class="input-field" name="tenant_emergcp_email" value="" /></label>
          </fieldset>

          <div class="action">
            <button class="button"><span><a href="tenant.php">Back</span></a></button>
            <button name="Submit" value="Submit" class="button"><span>Submit</span></button>
          </div>

        </form>
</div>


        <?php
        include "conn.php";

        if(isset($_POST['Submit'])) {
          mysqli_query($conn, "INSERT INTO Tenant set
            tenant_name = '$_POST[tenant_name]',
            tenant_ktp_no = '$_POST[tenant_ktp_no]',
            tenant_address = '$_POST[tenant_address]',
            gender = '$_POST[gender]',
            tenant_phone = '$_POST[tenant_phone]',
            tenant_email = '$_POST[tenant_email]',
            tenant_bankaccount = '$_POST[tenant_bankaccount]',
            tenant_bankaccount_no = '$_POST[tenant_bankaccount_no]',
            tenant_emergcp = '$_POST[tenant_emergcp]',
            tenant_emergcp_phone = '$_POST[tenant_emergcp_phone]',
            tenant_emergcp_email = '$_POST[tenant_emergcp_email]'");

            if(($_POST)>0){
            echo
            "<script>
                alert('DATA SUCCESSFULLY ADDED!');
                document.location.href= 'tenant.php';
            </script>";
        }else{
            echo
            "<script>
                alert('DATA WASN'T SUCCESSFULLY ADDED!');
                document.location.href= 'tenant.php';
            </script>";
        }
      }

        ?>
</div>

  </body>
</html>
