<?php 
session_start();
require_once "header.php";
require_once "php/config.php";

if (isset($_POST['recover'])) {
  $cpass= md5(mysqli_real_escape_string($conn, $_POST['cpass']));
  $pass1 = mysqli_real_escape_string($conn, $_POST['pass']);
  $pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);
  $sql= mysqli_query($conn,"SELECT * FROM users WHERE unique_id='{$_SESSION['unique_id']}' AND password= '{$cpass}'");
  if (mysqli_num_rows($sql)>0) {
    if ($pass1==$pass2) {
        $pass_enc=md5($pass1);
        $query= mysqli_query($conn, "UPDATE users SET password= '{$pass_enc}' WHERE unique_id='{$_SESSION['unique_id']}'");
        if ($query) {
            echo "<script>alert('Your password has been successfully changed...')</script>";
            
            echo "<script>window.open('update.php', '_self')</script>";
        }
        else{
            echo "<script>alert('Something went wrong...')</script>";
            echo "<script>window.open('change_pass.php', '_self')</script>";
        }
    }
    else{
        $err= "The password must be same";
    }
  }
  else{
    echo "<script>alert('Current password is incorrect...')</script>";
    echo "<script>window.open('change_pass.php', '_self')</script>";
  }
}
?>
<html>
<head>
<link rel="icon" href="php/images/ico.png">
<title>Change Password</title>
</head>
<style>
    .wrapper{
    background: #87969c;
    max-height: 800px;
    max-width: 550px;
    width: 100%;
    border-radius: 10px;
    font-size: 25px;
    padding: 13px;
  }
  input[type="text"], input[type="password"], input[type="file"], input[type="submit"]{
    display: inline;
    font-size: 25px;
    margin-top: 0px;
  }
  input[type="submit"]{
    background: darkgrey;
    border-radius: 5px;
  }
  .form{
    color: #3a0505;
  }
  span{
      font-size: 25px;
      color: white;
  }
</style>

<body>
  <div class="wrapper">
    <section class="form signup">
    
      <header style="font-size: 42px;"><a href="users.php" class="back-icon arw"><i class="fas fa-arrow-left"></i></a>  Create Password</header>
          <span>Create new password.</span>
      <form action="change_pass.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"><?php echo $err ?></div>
        <div class="field input">
          <label>Current Password</label>
          <input type="password" name="cpass" placeholder="Enter the current password" required>
        </div>
        <div class="field input">
          <label>New Password</label>
          <input type="password" name="pass" placeholder="Enter the new password" required>
        </div>
        <div class="field input">
          <label>Confirm Password</label>
          <input type="password" name="pass2" placeholder="Confirm Password" required>
        </div>
        
        <div class="field">
          <input type="submit" name="recover" value="Change">
        </div>
      </form>
      
    </section>
  </div>
</body>
</html>
