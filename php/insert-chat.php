<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $ciphering= "AES-128-CTR";
        $option=0;
        $encription_iv= 1234567891011121;
        $key= "thisisakeytoDecriptthem3554ge53nt2theuswer";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $encmsg= openssl_encrypt($message, $ciphering, $key, $option, $encription_iv);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, date)
                VALUES ({$incoming_id}, {$outgoing_id}, '{$encmsg}', NOW())") or die();
        }
    }else{
        header("location: ../login.php");
    }


    
?>