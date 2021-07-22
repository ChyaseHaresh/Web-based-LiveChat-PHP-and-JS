<?php 
require_once "header.php";
?>
<html>
<head>
<link rel="icon" href="php/images/ico.png">
<title>Password Recovery</title>
</head>
<style>
    .wrapper{
    background: #a7d0e0;
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
      color: red;
  }
</style>

<body>
  <div class="wrapper">
    <section class="form signup">
    
      <header style="font-size: 42px;">
      <a href="users.php" class="back-icon arw">
          <i class="fas fa-arrow-left"></i></a>   Password Recovery</header>
          <span>Note: Please Enter the name that you can remember. This name will be asked if you forget your password.</span>
      <form action="php/password_recovery.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        
        <div class="field input">
          <label>Childhood Friend</label>
          <input type="text" name="bname" placeholder="Enter your childhood friend name">
        </div>
        
        <div class="field">
          <input type="submit" name="recover" value="Submit">
        </div>
      </form>
      
    </section>
  </div>
</body>
</html>
