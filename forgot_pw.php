<?php 
require_once "header.php";
include "php/pass_forgot.php";
?>
<html>
<head>
<link rel="icon" href="php/images/ico.png">
<title>Password Recovery</title>
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
    
      <header style="font-size: 42px;">
      <a href="login.php" class="back-icon arw">
          <i class="fas fa-arrow-left"></i></a>   Password Recovery</header>
          <span>Please Enter your childhood best friends name that you set and the email you registered.</span>
      <form action="php/pass_forgot.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"><?php echo $er ?></div>
        <div class="field input">
          <label>Registered email</label>
          <input type="text" name="email" placeholder="Enter the email" required>
        </div>
        <div class="field input">
          <label>Childhood Friend</label>
          <input type="text" name="bname" placeholder="Enter your childhood friend name" required>
        </div>
        
        <div class="field">
          <input type="submit" name="recover" value="Submit">
        </div>
      </form>
      
    </section>
  </div>
</body>
</html>
