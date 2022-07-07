let myUrl = "http://localhost/chatbot/php/Connection/chatUser.php?"
const url = "http://localhost/chatbot/php/Connection/auth_users.php?";
const Chaturl = "http://localhost/chatbot/php/Connection/sgx.php?";

// let other_user_id = document.getElementById("other_user_id");
let message = document.getElementById("message");
let mega = document.getElementById("mega");
let sendBtn = document.getElementById("sendBtn");
let messages = document.getElementById("out-in-message");
// let incomin_msg = document.getElementById("incoming");


let link = document.URL
link = link.split("?");
let query = link[1];
query = query.split("&");
let formattedLink = {}
var chatLinker = []
query.forEach((eachLink) => {
    let LinkSolitted = eachLink.split("=");
    formattedLink[`${LinkSolitted[0]}`] = LinkSolitted[1]
    chatlinker = formattedLink;

})

let chatUsers = JSON.parse(localStorage.getItem("chatUsers") || '{}');
window.onload = () => {
    if (chatLinker) {
        for (var i = 0; i < chatUsers.length; i++) {
            if (chatUsers[i].unique_id == chatlinker.user_keys) {
                let randomUser = chatUsers[i];
                mega.innerHTML = `
                     <img id="user_img" src="../images/${randomUser.profile}" alt="">
                     <div class='details' id="details">
                         <span id="activeUser">${randomUser.fname} ${randomUser.lname}</span>
                         <p>Start Chating</p>
                         </div>
                     `;
                let options = {
                    method: "GET",
                    headers: {
                        "user_key": localStorage.auth_key
                    }
                }

                const para = document.createElement("input");
                para.type = "hidden",
                    para.value = `${randomUser.unique_id}`
                para.name = 'other_user_id'
                para.id = 'other_user_id'
                let other_user_id = document.getElementById('myText').appendChild(para);
                fetch(url, options)
                    .then((res) => {
                        res.json().then((json) => {
                            let data = json;
                            const user = document.createElement("input");
                            user.type = "hidden",
                                user.value = `${data.unique_id}`
                            user.name = 'user_key'
                            user.id = 'user_key'
                            let user_key = document.getElementById('myText-1').appendChild(user);
                            const renderMsg = () => {
                                let text_msg = {
                                    other_user_id: other_user_id.value,
                                    user_key: user_key.value
                                }
                                let Help =
                                {
                                    method: "POST",
                                    body: JSON.stringify(text_msg)
                                }
                                fetch(Chaturl, Help).then((res) => {
                                    res.json().then((fetchMsg) => {
                                        let incoming = fetchMsg
                                        let ReadMessage = incoming.users_message


                                        for (const Message of ReadMessage) {
                                            let outer = Message.outgoing_msg_id
                                            let text_outer = text_msg.user_key

                                            if (outer == text_outer) {
                                          
                                                messages.innerHTML +=
                                                `
              <div class="chat incoming">
              <img src="../images/${Message.profile}" alt="">
              <div class="details" id="incoming">
                  <p><p>${Message.msg}</p></p>
              </div>
          </div>
              
      `

                                            } else {

                                                messages.innerHTML +=
                                                `
                                            <div class="chat outgoing">
                                            <div class="details" >
                                            <p>${Message.msg}</p>
                                            </div>
                                            </div>


                                            `
                                            }
                                        }

                                    })
                                })

                            }
                            renderMsg()


                        }).catch(err => console.log(err))
                    }).catch(err => console.log(err));


                const getMsg = () => {
                    chatText =
                    {

                        other_user_id: other_user_id.value,
                        user_key: user_key.value
                    }
                    msgData =
                    {
                        method: "POST",
                        body: JSON.stringify(chatText)
                    }

                }

                sendBtn.addEventListener("click", () => {

                    const chating = () => {

                        chatBox =
                        {

                            other_user_id: other_user_id.value,
                            message: message.value,
                            user_key: user_key.value
                        }


                        optionsData = {
                            method: "POST",
                            body: JSON.stringify(chatBox)
                        }

                        fetch(myUrl, optionsData).then((res) => {
                            res.json().then((datasMsg) => {
                                let sent = datasMsg

                                setTimeout(() => {
                                    location.assign(`http://localhost/chatbot/views/chat.php?user_keys=${randomUser.unique_id}`)
                                }, 1000)

                            }).catch(err => console.log(err))
                        }).catch(err => console.log(err))
                    }
                    chating()
                })


            }
        }
    }
}




