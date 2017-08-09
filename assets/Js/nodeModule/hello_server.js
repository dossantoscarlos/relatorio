var http = require('http');


var server = http.createServer(function(resquest,response){
    response.writeHead(200,{"Content-Type":"text/html"});
    response.write("<h1> Ola mundo via http protocolo node.js</h1>");
    response.write("<script>alert('ola')</script>");
    response.end();
});

function serverLigado(){
    console.log("servidor ligado...");
}


server.listen(3000 ,serverLigado);