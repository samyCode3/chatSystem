
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
        <section class="users">
            <header>
                <div class="content">
                <img id="user_img" src="../images/" alt="">
                    <div class="details">
                        <span  id="user_name"></span>
                        <p>Active Now</p>
                    </div>
                </div>
                <a href="#" class="logout">Logout</a>
            </header>
            <form> 
            <div class="search">
                
                <span class="text" >Select an user to start with</span>
                <input type="text" name="search_user" placeholder="Enter name to search..">
                <button name="search"> <i class="fas fa-search"></i> </button>
                
            </div>
            </form>
            <div class="users-list">
              
                    <a href='#'>
                        <div class='content'>
                            <img src="ayo.jpg">
                            <div class='details'>
                                <span id="activeUser"></span>
                                <p>Start Chating</p>
                            </div>
                        </div>
                       <div class='status-dot'> <i class='fas fa-circle'></i> </div>
                      
                    </a>
            </div>
        </section>
        
    </div>
    <script src="../javascript/users.js"></script>
    
</body>

</html>