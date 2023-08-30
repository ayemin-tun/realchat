<?php
    while($row = mysqli_fetch_assoc($sql)){
        $selectsql = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']}) AND (incoming_msg_id = {$outgoing_id} OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn,$selectsql);
        $row2 = mysqli_fetch_assoc($query2);
        
        if(mysqli_num_rows($query2) > 0){
            $result = $row2['msg'];
        }else{
            $result = "No message available";
        }
        // trimming message if word are more than 28
        (strlen($result) >28)? $msg = substr($result,0,28).'...':$msg = $result;
        //adding you if the message is send by you
        ($outgoing_id == $row2['outgoing_msg_id'])?$you = "You: ":$you = "";
        //check user is online or offline
        ($row['status'] == "Offline now")? $offline = "offline":$offline = "";
        
        $output .= '
            <a href="talk.php?user_id='.$row['unique_id'].'">
                <div class="content">
                    <img src="php/img/'.$row['img'].'" alt="">
                    <div class="details">
                        <span>'.$row['fname'].' '.$row['lname'].'</span>
                        <p>'.$you.$msg.'</p>
                    </div> 
                </div>
                <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
            </a>';
    }
?>