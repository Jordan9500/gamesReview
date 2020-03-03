/* var fs = require('fs');
*/

// Handle if the user connecting is new or not.

/* // Handle the head response.
function handler (req, res) {
    fs.readFile(__dirname + '/index.html',
    function (err, data) {
        if (err) {
            res.writeHead(500);
            return res.end('Error loading index.html');
        }
        res.writeHead(200);
        res.end(data);
    });
}
*/
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
