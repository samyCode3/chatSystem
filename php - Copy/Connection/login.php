<?php 



require_once "core.php";

if(isset($_SERVER['REQUEST_METHOD'])== "POST")
{
   $email = $body['email'];
   $password = $body['password'];
   
   if(empty($email) || empty($password))
   {
       echo json_encode(['status' => false, 'message' => 'Invaild Login detail']);
       
   } else 
   {
    $check_for_valid_key = $conn->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
    $check_for_valid_key->execute([$email]);
    $fetch_valid_key_name = $check_for_valid_key->fetch(PDO::FETCH_ASSOC);
    if($fetch_valid_key_name < 1)
    {
        echo json_encode(['status' => false, 'message' => 'Email or password is incorrect please try again']);
    } else 
    {
        $verify_password = password_verify($password, $fetch_valid_key_name['password']);
        if($verify_password === false)
        {
            echo json_encode(['status' => false, 'message' => 'Email or password is incorrect please try again']);
        } else 
        {
            $user_auth_id = $fetch_valid_key_name['unique_id'];
            $rand_key = rand(time(), 1000000);
            $update_user_key = $conn->prepare("UPDATE users SET unique_id = ? WHERE unique_id = ?");
            $update_user_key->execute([$rand_key, $user_auth_id]);

            echo json_encode(['status' => true, 'message' => 'logged in', 'user_key' => $rand_key]);

        }
    }

   }
}   