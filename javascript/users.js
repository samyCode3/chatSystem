const url = "http://localhost/chatbot/php/Connection/auth_users.php?";
const UserUrl = "http://localhost/chatbot/php/Connection/getUser.php?";
var user_name = document.getElementById("user_name");
var user_img = document.getElementById("user_img");
let activeUser = document.getElementById("activeUser")
let options = {
    method : "GET",
    headers : {
        "user_key" : localStorage.auth_key
    }
}
fetch(url, options)
.then((res) => 
{
    res.json().then((json) => {
        let data = json.fname + ' ' + json.lname;
        let img = json.profile
        user_name.innerHTML = data;
        console.log(img)
        user_img.innerHTML = `<img src="../images/${img}">`;
    })
});

fetch(UserUrl, options).then((res) => {
   res.json().then((datas) => 
   {
    let users = datas;
    console.log(users)
     activeUser.innerHTML += users.fname
   }).catch(err => {
    alert(err)
   })
})
.catch(err => console.log(err))
