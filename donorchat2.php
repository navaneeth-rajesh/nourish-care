<?php
session_start();
include "donorheader.php";
include "connection.php";

$id = $_SESSION['id'];
$cid = $_GET['cid'];

// Retrieve user information for the chat header
$chat_query = "SELECT * FROM `user` WHERE `id` = $cid";
$chat_result = mysqli_query($con, $chat_query);

if ($chat_result) {
    while ($row = mysqli_fetch_array($chat_result)) {
        echo '
        <center>
            
                <div class="card-header msg_head" >
                    <div class="img_cont">
                        <span class="online_icon"></span>
                    </div>
                    
                        <div class="user_info" >
                            <span>Chat with ' . $row[1] . '</span>
                            <p>' . $row[3] . '</p>
                        </div>
                   
                    <div class="video_cam">
                        <span><i style="margin-top: 20px;" class="fas fa-phone"></i></span>
                    </div>
                </div>
                <div class="card-body msg_card_body" style="height: 500px;">';

        // Retrieve chat messages between users
        $chat_query = "SELECT chat.*, 
       sender_login.type AS sender_type, 
       receiver_login.type AS receiver_type
FROM chat 
INNER JOIN login AS sender_login ON chat.sender = sender_login.uid
INNER JOIN login AS receiver_login ON chat.receiver = receiver_login.uid
WHERE (chat.sender = $id AND sender_login.type = 'Donor' AND chat.receiver = $cid AND receiver_login.type = 'User')
   OR (chat.sender = $cid AND sender_login.type = 'User' AND chat.receiver = $id AND receiver_login.type = 'Donor')
ORDER BY chat.date ASC;";
        $chat_result = mysqli_query($con, $chat_query);
       

        if ($chat_result) {
            while ($row = mysqli_fetch_array($chat_result)) {
                if ($row['receiver_type'] == "User" ) {
                    echo '
                    <br><br>
                    <div class="d-flex justify-content-end mb-4" style="text-align:right">
                        <div class="msg_cotainer_send" style="min-width:80px;width:250px">
                            ' . $row['message'] . '
                           
                        </div>
                    </div>';
                } else {
                    echo '
                    <br><br>
                    <div class="d-flex justify-content-start mb-4" style="text-align:right">
                        <div class="msg_cotainer" style="min-width:80px;width:250px">
                            ' . $row['message'] . '
                           
                        </div>
                    </div>';
                }
            }
        }

        echo '
                </div>
                <div class="card-footer">
                    <form method="post" class="msgform">	
                        <div class="input-group" style="width:100%">
                            <button class="btn btn-outline-secondary attach_btn" type="button" style="width:100%">
                                <i class="bi bi-chat-right-text"></i> 
                            </button>
                            <input type="text" class="form-control type_msg" placeholder="Type your message..." name="msg" aria-label="Type your message...">
                            <div class="input-group-append" style="width:100%" required>
                                <button class="btn btn-primary send_btn" style="height: 60px;width:100%" name="send" type="submit">
                                    <i class="fas fa-location-arrow"></i> Send
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </center>';
    }
}

if (isset($_POST['send'])) {
    $msg = $_POST['msg'];
    date_default_timezone_set('Asia/Kolkata');
    $currentDate = date('Y-m-d');
    $currentTime = date('H:i:s');
    
    // Insert message into the chat table
    $insert_query = "INSERT INTO `chat` (`sender`, `receiver`, `message`, `date`) 
                     VALUES ('$id', '$cid', '$msg', '$currentDate $currentTime')";
                     
                     

    $insert_result = mysqli_query($con, $insert_query);

    if ($insert_result) {
        echo "<script>location.href='donorchat2.php?cid=" . $cid . "';</script>";
        echo "<script>alert('Message sent successfully');</script>";
        
        
    } else {
        echo "<script>alert('Failed to send message');</script>";
    }
}

include "commonfooter.php";
?>
<style>
    body, html {
        height: 100%;
        margin: 0;
        background: #7F7FD5;
        background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
    }
    .msgform {
        background-color: transparent;
    }
    .chat {
        margin-top: auto;
        margin-bottom: auto;
    }
    .card {
        height: 500px;
        border-radius: 15px !important;
        background-color: transparent !important;
    }
    .contacts_body {
        padding: 0.75rem 0 !important;
        overflow-y: auto;
        white-space: nowrap;
    }
    .msg_card_body {
        overflow-y: auto;
    }
    .card-header {
        border-radius: 15px 15px 0 0 !important;
        border-bottom: 0 !important;
    }
    .card-footer {
        background-color: transparent;
        border-radius: 0 0 15px 15px !important;
        border-top: 0 !important;
    }
    .container {
        align-content: center;
    }
    .search {
        border-radius: 15px 0 0 15px !important;
        background-color: rgba(0,0,0,0.3) !important;
        border: 0 !important;
        color: white !important;
    }
    .search:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }
    .type_msg {
        background-color: rgba(0,0,0,0.3) !important;
        border: 0 !important;
        color: white !important;
        height: 60px !important;
        overflow-y: auto;
    }
    .type_msg:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }
    .attach_btn {
        border-radius: 15px 0 0 15px !important;
        background-color: rgba(0,0,0,0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }
    .send_btn {
        border-radius: 0 15px 15px 0 !important;
        background-color: rgba(0,0,0,0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }
    .search_btn {
        border-radius: 0 15px 15px 0 !important;
        background-color: rgba(0,0,0,0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }
    .contacts {
        list-style: none;
        padding: 0;
    }
    .active {
        background-color: rgba(0,0,0,0.3);
    }
    .user_img {
        height: 70px;
        width: 70px;
        border: 1.5px solid #f5f6fa;
    }
    .user_img_msg {
        height: 40px;
        width: 40px;
        border: 1.5px solid #f5f6fa;
    }
    .img_cont {
        position: relative;
        height: 70px;
        width: 70px;
    }
    .img_cont_msg {
        height: 40px;
        width: 40px;
    }
    .online_icon {
        position: absolute;
        height: 15px;
        width: 15px;
        background-color: #4cd137;
        border-radius: 50%;
        bottom: 0.2em;
        right: 0.4em;
        border: 1.5px solid white;
    }
    .offline {
        background-color: #c23616 !important;
    }
    .user_info {
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 15px;
    }
    .user_info span {
        font-size: 20px;
        color: white;
    }
    .user_info p {
        font-size: 10px;
        color: rgba(255,255,255,0.6);
    }
    .video_cam {
        margin-left: 50px;
        margin-top: 5px;
    }
    .video_cam span {
        color: white;
        font-size: 20px;
        cursor: pointer;
        margin-right: 20px;
    }
    .msg_cotainer {
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 10px;
        border-radius: 25px;
        background-color: #82ccdd;
        padding: 10px;
        position: relative;
    }
    .msg_cotainer_send {
        margin-top: auto;
        margin-bottom: auto;
        margin-right: 10px;
        border-radius: 25px;
        background-color: #78e08f;
        padding: 10px;
        position: relative;
    }
    .msg_time {
        position: absolute;
        left: 0;
        bottom: -15px;
        color: rgba(255,255,255,0.5);
        font-size: 10px;
    }
    .msg_time_send {
        position: absolute;
        right: 0;
        bottom: -15px;
        color: rgba(255,255,255,0.5);
        font-size: 10px;
    }
    .msg_head {
        position: relative;
    }
    #action_menu_btn {
        position: absolute;
        right: 10px;
        top: 10px;
        color: white;
        cursor: pointer;
        font-size: 20px;
    }
    .action_menu {
        z-index: 1;
        position: absolute;
        padding: 15px 0;
        background-color: rgba(0,0,0,0.5);
        color: white;
        border-radius: 15px;
        top: 30px;
        right: 15px;
        display: none;
    }
    .action_menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .action_menu ul li {
        width: 100%;
        padding: 10px 15px;
        margin-bottom: 5px;
    }
    .action_menu ul li i {
        padding-right: 10px;
    }
    .action_menu ul li:hover {
        cursor: pointer;
        background-color: rgba(0,0,0,0.2);
    }
    @media(max-width: 576px) {
        .contacts_card {
            margin-bottom: 15px !important;
        }
    }
</style>

<?php
include "commonfooter.php";
?>
