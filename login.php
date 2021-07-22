<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper" style="background: #46865ad4;">
    <section class="form login">
      <header>Login</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="link" style="text-align: left;"><a href="forgot_pw.php">Forgot Password</a></div>
        <div class="field button" style="background-color: #33333394; height:46px; border-radius:10px;">
          <input type="submit" name="submit" value="Login">
        </div>
      </form>
      <div class="link">Don't have account? <a href="index.php">Create now</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
