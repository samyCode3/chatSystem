const url = "http://localhost/chatbot/php/Connection/auth_users.php?";
const UserUrl = "http://localhost/chatbot/php/Connection/getUser.php?";


var header = document.getElementById("header");
var mega = document.getElementById("mega");
let activeUser = document.getElementById("users-list")
let options = {
    method: "GET",
    headers: {
        "user_key": localStorage.auth_key
    }
}
fetch(url, options)
    .then((res) => {
        res.json().then((json) => {
            let data = json;
            header.innerHTML = `
        <div class="content">
        <img id="user_img" src="../images/${data.profile}" alt="">
            <div class="details">
                <span  id="user_name">${data.fname} ${data.lname}</span>
                <p>Active Now</p>
            </div>
        </div>
        <a href="#" class="logout">Logout</a>
        `;

        }).catch(err => console.log(err))
    }).catch(err => console.log(err));

fetch(UserUrl, options).then((res) => {
    res.json().then((dataDb) => {
        userGet = dataDb
        for (let user of userGet) {
            activeUser.innerHTML += `
           <a href='http://localhost/chatbot/views/chat.php?user_keys=${user.unique_id}'>
           <div class='content'>
           <img id="user_img" src="../images/${user.profile}" alt="">
               <div class='details' id="details">
                   <span id="activeUser">${user.fname} ${user.lname}</span>
                   <p>Start Chating</p>
               </div>
           </div>
          <div class='status-dot'> <i class='fas fa-circle'></i> </div>
         
       </a>
           `

        }
       
       
        localStorage.setItem("chatUsers", JSON.stringify(userGet))
     
    }).catch(err => console.log(err))
}).catch(err => console.log(err))

