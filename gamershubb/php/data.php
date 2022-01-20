<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        if($row['game'] == "Valorant")
        {
          $image = "images/valorant.jpg";
        }
        if($row['game'] == "Dota 2")
        {
          $image = "images/dota2.png";
        }
        if($row['game'] == "League of Legends")
        {
          $image = "images/lol.png";
        }
        if($row['game'] == "CSGO")
        {
          $image = "images/csgo.png";
        }
        if($row['game'] == "Mobile Legends")
        {
          $image = "images/ml.png";
        }
        if($row['game'] == "Axie Infinity")
        {
          $image = "images/axie.png";
        }
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                    <div class="content">
                    <img src="php/images/'. $row['img'] .'" alt="">
                    <div class="details">
                        <span style="color: white; font-size: 20px">'. $row['uname'].'</span> <span style="color: #ccc; font-size: 15px">' . $row['game'] . "  <img src=$image style='border-radius: 0px; width:15px; height:15px;'>"  .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>