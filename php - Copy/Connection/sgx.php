  <?php 
  require_once "core.php";
      $user_key = $body['user_key'];
      $other_user_id = $body['other_user_id'];
      $message = $conn->prepare("SELECT * FROM messages LEFT JOIN users ON 
      users.unique_id = messages.incoming_msg_id WHERE (outgoing_msg_id = :outgoing_msg_id  AND incoming_msg_id = :incoming_msg_id) 
      OR (outgoing_msg_id = :incoming_msg_id  AND incoming_msg_id = :outgoing_msg_id)  ORDER BY msg_id DESC");
      $message->bindParam('outgoing_msg_id', $other_user_id);
      $message->bindParam('incoming_msg_id', $user_key);
      $message->execute();
      $message_fetch = $message->fetchAll(PDO::FETCH_ASSOC);
          echo json_encode(['status' => true, 'users_message' => $message_fetch]);
    
