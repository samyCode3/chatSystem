let email = document.getElementById("email");
let password = document.getElementById("password");
let loginBtn = document.getElementById("login");
let error = document.getElementById("error");

const url = "http://localhost/chatbot/php/Connection/login.php?";
loginBtn.addEventListener("click", () => {

   const LoginUser = () => {
      loadUser =
      {
         email: email.value,
         password: password.value
      }
      let auth_user =
      {
         method: "POST",
         body: JSON.stringify(loadUser)
      }
      fetch(url, auth_user).then((res) => {
         res.json().then((json) => {
            let UserAuth = json.message;
            error.innerHTML = UserAuth;
            if (json.status == true) {
               localStorage.auth_key = json.user_key;
               location.assign("http://localhost/chatbot/views/users.php");
            }
         }).catch(err => alert(err))
      }).catch(err => alert(err))
   }
   LoginUser()
})