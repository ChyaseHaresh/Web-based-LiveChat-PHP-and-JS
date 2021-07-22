<?php 
  session_start();
  require_once "header.php";
  require_once "php/config.php";
  $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}'");
    if(mysqli_num_rows($sql) > 0){
    $rslt= mysqli_fetch_assoc($sql);
    $fn=$rslt['fname'];
    $ln= $rslt['lname'];
    $em= $rslt['email'];
    $pw= $rslt['password'];
    }
?>
<html>
<head>
<link rel="icon" href="php/images/ico.png">

</head>
<style>
  body{
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-image: url(bground.jpg);
    background-size: 100%;
    width: 100%;
    height: 100%;
  }
  .wrapper{
    background: #c5c5c5;
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
  .arw{
    font-size: 30px;
    color: black;
  }
</style>

<body>
  <div class="wrapper">
    <section class="form signup">
    
      <header style="font-size: 42px;"><a href="users.php" class="back-icon arw"><i class="fas fa-arrow-left"></i></a>   Account Settings</header>
      <form action="php/update_handler.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" value="<?php echo $fn;?>" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" value="<?php echo $ln;?>" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" value="<?php echo $em;?>" disabled>
        </div>
        <div class="input">
          <label>Password</label><a href="change_pass.php">
          <input style="font-size: 20px; background:gray;border-radius:5px; color:cyan; width:200px;"
        type="button" value="Change Password"></a>
        </div>
        <div class="field image">
          <label>Change Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
        </div>
        <a style="font-size: 20px; padding-bottom:10px;" href="recover.php">Password Recovery Setting</a>
        <div class="field">
          <input type="submit" name="submit" value="Save">
        </div>
      </form>
      <div class="foot" style=" float:right;">
      
      <button style="font-size: 15px; background:crimson;border-radius:5px; color:cyan;"
       onclick="myFunction()">Delete Account</button>
       </div>
    </section>
  </div>
  <script>
function myFunction() {
  var txt;
  if (confirm("Are you sure you want to delete your account ?? The account will be permanently deleted.")) {
    window.open('delete.php', '_self');
  } else {
    txt = "You pressed Cancel!";
  }
}
</script>

</body>
</html>
