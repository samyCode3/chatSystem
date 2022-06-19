<?php

  session_start();

     $host = "localhost";
     $dbname = "chatbot";
     $user = "root";
     $pass = "";
     $dbh;

 
        
    try {

        $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }
    catch (PDOException $e) {

        echo "Connection Failed".$e->getMessage();
    }