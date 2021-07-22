<?php
session_start();
require_once "header.php";
require_once "php/config.php";

$sql= mysqli_query($conn, "DELETE FROM users WHERE unique_id = '{$_SESSION['unique_id']}'");
if ($sql) {
    echo "<script>alert('Your account has been successfully deleted...😁')</script>";
    session_unset();
    session_destroy();
    header("location: index.php");
}
else{
    echo "Deletion Failed !!";
}
?>