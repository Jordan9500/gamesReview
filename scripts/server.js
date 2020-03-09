var app = require('http').createServer();
var io = require('socket.io')(app);

io.on('connection', function(socket){
    console.log("Someone Has Connected!");

    socket.on("Client Message", function(data) {
        console.log("Client Message Received: " + data);

        io.emit("Server Message", data);
    });
});

app.listen(8000, function () {
    console.log("Server Started.");
});
