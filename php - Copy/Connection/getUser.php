<?php 

require_once "core.php";

$header = getallheaders()['user_key'];
$getAllactiveUser = $conn->prepare("SELECT fname, lname, profile FROM users WHERE unique_id != ?");
$getAllactiveUser->execute([$header]);
$fetchUser = $getAllactiveUser->fetch(PDO::FETCH_ASSOC);

    echo json_encode($fetchUser);
