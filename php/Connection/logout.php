<?php 

if(isset($_GET['unique_id']))
{
    $unique_id = $_GET['unique_id'];
    $change_status = $conn->prepare("UPDATE users SET status = 0 WHERE unique_id = ?");
    if($change_status->execute([$unique_id]))
    {
        session_unset();
        session_destroy();
        header("Location: ../views/login.php");
        exit();
    }
    
}

?>