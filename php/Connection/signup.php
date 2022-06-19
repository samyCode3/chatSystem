<?php 

require_once "core.php";

if(isset($_SERVER['REQUEST_METHOD'])== "POST")
{
  

  $fname = $body['fname'];
  $lname = $body['lname'];
  $email = $body['email'];
  $password = $body['password'];
  $confirmPass = $body['confirmPass'];

  $unique_id = rand(time(), 10000);
   
  //  $images = $body[$_FILES'images'];
  // $imageName = $body['images']['name'];
  // $imageTmp_Name = $body['images']['tmp_name'];
  // $imageError_Name = $body['images']['error'];
  // $imageSize_Name = $body['images']['size'];

 
  // $explode_file = explode('.', $imageName);
  // $strtolower =  strtolower(end($explode_file));
  // $allowed = ['jpg', 'png', 'jpeg', 'gif'];

 

  

  if(empty($fname ))
  {
    echo json_encode(['status' => false, 'message' => 'Firstname is empty please try again']);
  } else 
  {
    if(empty($lname ))
    {
      echo json_encode(['status' => false, 'message' => 'Lastname is empty please try again']);
     
    } else
    {
      if(!preg_match("/^[0-9a-zA-Z]*$/", $fname))
      {
        echo json_encode(['status' => false, 'message' => 'Firtname is Should not contain special characters $fname please try again...']);
      } else 
      {
        if(!preg_match("/^[0-9a-zA-Z]*$/", $lname))
      {
        echo json_encode(['status' => false, 'message' => 'Lastname is Should not contain special characters please try again...']);
      } else 
      {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
          echo json_encode(['status' => false, 'message' => 'Email is invalid  please try again']);  
        } else 
        {
          $check_Used_email = $conn->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
          $check_Used_email->execute([$email]);
          $fetch_email_from_db = $check_Used_email->fetch(PDO::FETCH_ASSOC);
          if($fetch_email_from_db > 0)
          {
            echo json_encode(['status' => false, 'message' => 'Email is already taken please try again']);
          } else 
          {
            if(strlen($password) < 8)
            {
              echo json_encode(['status' => false, 'message' => 'Password should be more than 8 characters;']);
            }  else 
            {
              if(preg_match("/^[0-9a-zA-Z]*$/", $password))
              {
                echo json_encode(['status' => false, 'message' => 'Password is too weak try adding /^[0-9a-zA-Z]*$/']);
              } else 
              {
                if($password !== $confirmPass)
                {
                  echo json_encode(['status' => false, 'message' => 'Password confirmation is not correct']);
                
                } else 
                {
                  // if(in_array($strtolower, $allowed))
                  // {
                  //     if($imageSize_Name < 1000000)
                  //     {
                  //       if($imageError_Name === 0)
                  //       {
                  //        $unique = uniqid('', true).".".$strtolower;
                  //        $store_image = '../images/'.$unique;
                  //        if(move_uploaded_file($imageTmp_Name, $store_image))
                  //        {
                          $hash_password = password_hash($password, PASSWORD_DEFAULT);
                          $insert_users = $conn->prepare("INSERT INTO users (unique_id, fname, lname, email, password, confirm)
                          VALUES (?,?,?,?,?,?)");
                          if($insert_users->execute([$unique_id, $fname, $lname, $email,$hash_password, $hash_password]))
                          {
                            echo json_encode(['status' => true, 'message' => 'Signup successfully', 'user_key' => $unique_id]);
                          } else 
                          {
                            echo json_encode(['status' => false, 'message' => 'Something went wrong please try again']);
        
                          }
      
                  //        }
                  //       } else 
                  //       {
                  //         $error['image'] = "Sorry an error occured trying to upload this file please try again";
                  //       }
                  //     } else
                  //     {
                  //       $error['image'] = "File is too big";
                  //     }
                  // }else 
                  // {
                  //   $error['image'] = "Sorry can't upload this file please try again";
                  // }
                  
                }
              }
            }
          }
        }
      
      }
      }
    }
  }

}


