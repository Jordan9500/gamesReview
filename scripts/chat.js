$(document).ready(function() {
    var socket = io.connect("http://localhost:8000");

    $("#sendbutton").submit(function(e) {
        e.preventDefault();
        
        socket.emit("Client Message", $("#message").get(0).value);

        $("#message").get(0).value = "";
    });

    socket.on("Server Message", function(data) {
        $("#chatspace").append(data + "<br>");

    });

});
