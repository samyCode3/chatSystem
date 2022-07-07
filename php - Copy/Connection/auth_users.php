<?php 


require_once "core.php";
  
    $unique_id = getallheaders()['user_key'];
     if(isset($unique_id))
     {
        $auth_users = $conn->prepare("SELECT fname, lname, email, unique_id, profile FROM users WHERE unique_id = ?");
        $auth_users->execute([$unique_id]);
        $fetch_auth_users = $auth_users->fetch(PDO::FETCH_ASSOC);
       
        if($fetch_auth_users)
        {
           echo json_encode($fetch_auth_users);
        } else 
        {
            echo "You are not authorize";
            http_response_code(401);
        }
   
     }
  
    
    