
<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['MaSV']}
                OR outgoing_msg_id = {$row['MaSV']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['Status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['MaSV']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="messenger.php?masv='. $row['MaSV'] .'">
                    <div class="content">
                    <img src="../images/avt.png" alt="">
                    <div class="details">
                        <span>'. $row['HoTen'].'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
    
?>