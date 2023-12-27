<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
		<link rel="stylesheet" href="css/tenant.css">
    <title>UPDATE TENANT</title>
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

		<?php
		require 'conn2.php';

		$tenant_id= $_GET["tenant_id"];

		$row= query("SELECT * FROM Tenant WHERE tenant_id= '$tenant_id'")[0];

		if(isset($_POST["submit"])){

		if(edit($_POST)>0){
			echo
			"<script>
					alert('DATA SUCCESSFULLY UPDATE!');
					document.location.href= 'tenant.php';
			</script>";
		}else{
			echo
			"<script>
					alert('DATA WASN'T SUCCESSFULLY UPDATE!');
					document.location.href= 'tenant.php';
			</script>";
		}
		}
		?>
    <div class="wrapper">
      <div class="form-style-3">
        <form  class="label" action="" method="POST">
          <fieldset><legend>Tenant Information</legend>

						<label><span><span class="required"></span></span>
							<input type="hidden" class="input-field" name="tenant_id" value="<?php echo $row['tenant_id']; ?>"></label>

            <label><span>Name <span class="required">*</span></span>
							<input type="text" class="input-field" name="tenant_name" value="<?php echo $row['tenant_name']; ?>"></label>

            <label><span>Address<span class="required">*</span></span>
							<input type="text" class="input-field" name="tenant_address" value="<?php echo $row['tenant_address']; ?>"/></label>

            <label><span>ID number<span class="required">*</span></span>
							<input type="text" class="input-field" name="tenant_ktp_no" value="<?php echo $row['tenant_ktp_no']; ?>"></label>

            <label><span>Phone Number <span class="required">*</span></span>
							<input type="text" class="input-field" name="tenant_phone" value="<?php echo $row['tenant_phone']; ?>"></label>

						<label><span>Email<span class="required">*</span></span>
							<input type="text" class="input-field" name="tenant_email" value="<?php echo $row['tenant_email']; ?>"></label>

            <label><span>Bank Account<span class="required">*</span></span>
							<input type="text" class="input-field" name="tenant_bankaccount" value="<?php echo $row['tenant_bankaccount']; ?>"></label>

            <label><span>Bank Number<span class="required">*</span></span>
							<input type="text" class="input-field" name="tenant_bankaccount_no" value="<?php echo $row['tenant_bankaccount_no']; ?>"></label>

          </fieldset>

          <fieldset class="tes"><legend>Emergency Contact</legend>
            <label><span>Person<span class="required">*</span></span>
							<input type="text" class="input-field" name="tenant_emergcp" value="<?php echo $row['tenant_emergcp']; ?>"></label>

            <label><span>Contact Person<span class="required">*</span></span>
							<input type="text" class="input-field" name="tenant_emergcp_phone" value="<?php echo $row['tenant_emergcp_phone']; ?>"></label>

            <label><span>Person Email<span class="required">*</span></span>
							<input type="text" class="input-field" name="tenant_emergcp_email" value="<?php echo $row['tenant_emergcp_email']; ?>"/></label>
          </fieldset>

          <div class="action">
            <button class="button"><span><a href="tenant.php">Back</span></a></button>

						<button class="button" type="submit" name="submit">Save</button>
          </div>

        </form>
</div>

</div>

  </body>
</html>
