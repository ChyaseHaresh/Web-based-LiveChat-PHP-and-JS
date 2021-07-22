<?php 
  session_start();
  require_once "config.php";
  if (isset($_POST['recover'])) {
    $bname = mysqli_real_escape_string($conn, $_POST['bname']);
    $query= mysqli_query($conn,"UPDATE users SET recover= '{$bname}' WHERE unique_id = '{$_SESSION['unique_id']}'");
    if ($query) {
        echo "<script>alert('The name has been submitted successfully.')</script>";
        echo "<script>window.open('../users.php', '_self')</script>";
    }
    else{
        echo "<script>alert('There was something wrong with submitting name..')</script>";
        echo "<script>window.open('../recover.php', '_self')</script>";
    }
  }

?>