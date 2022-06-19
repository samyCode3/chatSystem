let fname = document.getElementById("fname");
let lname = document.getElementById("lname");
let email = document.getElementById("email");
let password = document.getElementById("password");
let confirmPass = document.getElementById("confirmPass");
let error = document.getElementById("error");
const btn = document.getElementById("btn");


const url = "http://localhost/chatbot/php/Connection/signup.php?";
btn.addEventListener("click", () => {
        const signuser = () => 
    {
        payload = {
            fname : fname.value,
            lname : lname.value,
            email : email.value,
            password : password.value,
            confirmPass : confirmPass.value,
        }
        let authSignin = 
        {
            method : "POST",
            body: JSON.stringify(payload)
        }
        fetch(url, authSignin).then((res) => 
        {
            res.json().then((json) => 
            {
                let data = json.message;
                error.innerHTML = data;
                if(json.status == true)
                {
                    error.setAttribute("style", "background-color: green; padding: 8px 10px; text-align: center; border-radius: 5px; margin-bottom: 10px; border: 1px solid #f5c6cb;" )
                    location.assign("http://localhost/chatbot/views/login.php")
                }
            }).catch(err => { })
        }).catch(err=>alert(err))
    }
    signuser();

})

