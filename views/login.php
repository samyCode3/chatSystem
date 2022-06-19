
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message App</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="./css/all.css"> 
    <link rel="stylesheet" href="./css/all.min.css"> 
</head>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Messaging App</header>
            <form action="" onsubmit="return false"> 
         
               
                <div id="error" style ="color: #721c24; background: #f8d7da; padding: 8px 10px; text-align: center; border-radius: 5px; margin-bottom: 10px; border: 1px solid #f5c6cb;"> </div>
           
                <div class="name-details">
                </div>
                <div class="field input">
                    <label for="">Email Address</label>
                    <input type="text" name="email" id="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter a password">
                 <i class="fas fa-eye"></i>
                </div>
                
                <div class="button input">
                    <input type="submit" name="login" id="login" value="Continue to chat">
                </div>
            </form>
            <div class="link">Don't have an account? <a href="index.php">Signup now</a> </div>
        </section>
    </div>
    <script src="../javascript/password.hide.js"></script>
    <script src="../javascript/login.js"></script>
</body>
</html>