$(document).ready(function() {
    var socket = io.connect("http://localhost:8000");
    var user;
    /* Check if the general form has been submitted */
    $("#generalForm").submit(function(e) {
        user = document.cookie.replace("active_user=", "");
        e.preventDefault();
        socket.emit("Client Message", $("#generalMessage").get(0).value, user, "General");
        $("#generalMessage").get(0).value = "";
    });
    
    /* Check if the Gaming form has been submitted */
    $("#gamingForm").submit(function(e) {
        user = document.cookie.replace("active_user=", "");
        e.preventDefault();
        socket.emit("Client Message", $("#gamingMessage").get(0).value, user, "Gaming");
        $("#gamingMessage").get(0).value = "";
    });

    /* Check if the Advice form has been submitted */
    $("#adviceForm").submit(function(e) {
        user = document.cookie.replace("active_user=", "");
        e.preventDefault();
        socket.emit("Client Message", $("#adviceMessage").get(0).value, user, "Advice");
        $("#adviceMessage").get(0).value = "";
    });

    socket.on("Server Message", function(data, user, chatName) {
        if (data != "") {
            if (user === "Admin") {
                /* Admin check if which chat to send the message too */
                switch(chatName) {
                    case "Gaming":
                      // code block
                      /* Append it to the chat space */
                      $("#gamingChatspace").append("<span style='color:red'><b>" + user + ":</b></span> " + data + "<br>");
                      break;
                    case "Advice":
                      // code block
                      $("#adviceChatspace").append("<span style='color:red'><b>" + user + ":</b></span> " + data + "<br>");
                      break;
                    default:
                      // code block
                      $("#generalChatspace").append("<span style='color:red'><b>" + user + ":</b></span> " + data + "<br>");
                  }
            } else {
                switch(chatName) {
                    case "Gaming":
                      // code block
                      $("#gamingChatspace").append(user + ": " + data + "<br>");
                      break;
                    case "Advice":
                      // code block
                      $("#adviceChatspace").append(user + ": " + data + "<br>");
                      break;
                    default:
                      // code block
                      $("#generalChatspace").append(user + ": " + data + "<br>");
                }
            }
        }
    });


    socket.on("User Joined", function() {
        /* When the user joins append it to all the chats */
        $("#generalChatspace").append("Someone Has Joined A Chat" + "<br>");
        $("#gamingChatspace").append("Someone Has Joined A Chat" + "<br>");
        $("#adviceChatspace").append("Someone Has Joined A Chat" + "<br>");
    });

});
