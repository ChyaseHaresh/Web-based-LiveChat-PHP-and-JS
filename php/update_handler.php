<?php
session_start();
require_once "config.php";
if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    if(!empty($fname) && !empty($lname)){

        if(isset($_FILES['image'])){
            $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];
            
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if(in_array($img_ext, $extensions) === true){
                $types = ["image/jpeg", "image/jpg", "image/png"];
                if(in_array($img_type, $types) === true){
                    $time = time();
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                        $uquery="UPDATE users SET fname='{$fname}', lname='{$lname}', img= '{$new_img_name}' WHERE unique_id = '{$_SESSION['unique_id']}'";
                        $update_query = mysqli_query($conn, $uquery);
                        if($update_query){
                            echo "<script>alert('Your profile has been successfully updated...')</script>";
                            echo "<script>window.open('../users.php', '_self')</script>";
                            
                        }else{
                            echo "Something went wrong. Please try again!";
                        }
                    }
                }else{
                    echo "Please upload an image file - jpeg, png, jpg";
                }
            }else{
                $uquery="UPDATE users SET fname='{$fname}', lname='{$lname}' WHERE unique_id = '{$_SESSION['unique_id']}'";
                $update_query = mysqli_query($conn, $uquery);
                if($update_query){
                    echo "<script>alert('Your profile has been successfully updated...')</script>";
                    echo "<script>window.open('../users.php', '_self')</script>";
                    
                }else{
                    echo "Something went wrong. Please try again!";
                }
            }
        }
    }
    else{
        echo "All input fields are required!";
    }
}
