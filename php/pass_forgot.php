<?php 
  session_start();
  require_once "config.php";
  if (isset($_POST['recover'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $bname = mysqli_real_escape_string($conn, $_POST['bname']);

    $query= mysqli_query($conn, "SELECT * FROM users WHERE email= '{$email}' AND recover= '{$bname}'");
    if (mysqli_num_rows($query)>0) {
        $rslt= mysqli_fetch_assoc($query);
        $_SESSION['email']=$rslt['email'];
        header("Location: ../new_pass.php");

    }
    else;
    echo "<script>alert('The email or friends seems to be wrong...')</script>";
    echo "<script>window.open('../forgot_pw.php', '_self')</script>";
  }
?>