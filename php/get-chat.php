<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $ciphering= "AES-128-CTR";
        $option=0;
        $encription_iv= 1234567891011121;
        $key= "thisisakeytoDecriptthem3554ge53nt2theuswer";
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $message= $row['msg'];
                $decmsg= openssl_decrypt($message, $ciphering, $key, $option, $encription_iv);
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '
                                <div class="chat outgoing">
                                <div class="details">
                               

                                    <p style="background: #001f0a82;">'.'<sub style="color:#e8e1e1; font-family:cnsolas; display:flex;"> '.$row['date']. '</sub>'. $decmsg .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="php/images/'.$row['img'].'" style="border: 1px solid black;" alt="">
                                <div class="details">

                                    <p>'.'<sub style="color:#4c4c4d; font-family:cnsolas; display:flex;">'.$row['date'].'</sub>'. $decmsg .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>