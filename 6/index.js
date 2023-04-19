const http = require('http');

function GetCredentials(session) {
    
    const userObj = {
        "id": 2,
        "username": "student",
        "email": "student@y.ru",
        "session" : "9b13252f346c2073e0c9ed39aad87ba9e9a59dd925606c6cdb12eec0d7368b5b"
     };

    return userObj;
}

const requestListener = function (req, res) {

    origin = req.headers["origin"];
    if ( origin == undefined || origin == "" ) {
        origin = "*";
    }
  
    const headers = {
        "Access-Control-Allow-Origin": origin,
        "Access-Control-Allow-Credentials": "true",
        "Content-Type": "application/json",
    };
    res.writeHead(200, headers);

    console.log(`[${Date()}][LOG]`, req.headers["referer"], "=>", req.headers["host"]);

    sess = GetCredentials(req.session)

    userCred = {
        "id": sess.id,
        "username": sess.username,
        "email": sess.email,
        "session": sess.session,
    };

    res.end(JSON.stringify(userCred));
}

//Start HTTP server:
const server = http.createServer(requestListener);
console.log("Vsnippet started at: http://127.0.0.1:5100/");
server.listen(5100);