
var app = require('http').createServer();
var io = require('socket.io')(app);
/*  Check Connection */
io.on('connection', function(socket){
    if (socket.connected) {
        console.log("Someone Has Connected!");
        io.emit("User Joined");
    
        socket.on("Client Message", function(data, user, chatName){
            console.log("Client Message Received: " + data + ": " + user);
    
            io.emit("Server Message", data, user, chatName);
        });
    }
    else {
        console.log("KILL ME");
        io.emit("Connection Failed");
    }
});

app.listen(8000, function (){
    console.log("Server Started.");
});
