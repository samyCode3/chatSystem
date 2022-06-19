
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message App</title>
    <link rel="stylesheet" href="index.css">
</head>    <link rel="stylesheet" href="./css/all.css"> 
<link rel="stylesheet" href="./css/all.min.css"> 
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Messaging App</header>
            <form onsubmit="return false" id="formData" action="" enctype = "multipart/form-data">
             
              
                <div id="error" style ="color: #721c24; background: #f8d7da; padding: 8px 10px; text-align: center; border-radius: 5px; margin-bottom: 10px; border: 1px solid #f5c6cb;"></div>
           
                <div class="name-details">
                    <div class="field input">
                        <label for="">First Name</label>
                        <input type="text" name="fname" id="fname" placeholder="First Name"  >
                    </div>
                    <div class="field input">
                        <label for="">Last Name</label>
                        <input type="text" name="lname" id="lname" placeholder="Last Name">
                    </div>
                </div>
                <div class="field input">
                    <label for="">Email Address</label>
                    <input type="text" name="email" id="email" placeholder="Enter your email" >
                </div>
                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter a password" >
                    <i id="password_icon"  class="fas fa-eye"></i>
                </div>
                <div class="field input">
                    <label for="">Confirm password</label>
                    <input type="password" name="confirmPass" id="confirmPass" placeholder="Retype password" >
                    <i id="password_icons" class="fas fa-eye"></i>
                </div>
                <!-- <div class="image">
                    <label for="">Upload your Image</label>
                    <input type="file" name="images">
                </div> -->
                <div class="button input">
                    <input type="submit" name="register" id="btn" value="Continue to chat">
                </div>
            </form>
            <div class="link">Already signed up? <a href="login.php">Login now</a> </div>
        </section>
    </div>
    <script src="../javascript/password.hide.js"></script>
    <script src="../javascript/signup.js"></script>
</body>
</html>