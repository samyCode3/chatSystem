<?php 

require_once "core.php";

if(isset($_SERVER['REQUEST_METHOD']) == "POST")
{
    
    $user_key = $body['user_key'];
    $other_user_id = $body['other_user_id'];
    $message = $body['message'];
    
    
    if(empty($message))
    {
        echo json_encode(['status' => false, 'message' => "sorry can't send empty message"]);
    } else 
    {
        $insert_message = $conn->prepare("INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES (?,?,?)");
        $insert_message->execute([$user_key, $other_user_id, $message]);
        echo json_encode(['status' => true, 'message' => "message sent"]);
    }
}

