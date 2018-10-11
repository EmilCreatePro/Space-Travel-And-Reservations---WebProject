var http = require('http');
var url = require('url');
var fs = require('fs');
//var express = require('express');
//var app = express();
var path = require('path');

http.createServer(function (req, res) {

  if(req.url === "/") {
    fs.readFile("index.html", "UTF-8", function(err,data) {
    res.writeHead(200, {"Content-Type": "text/html"});
    res.end(data);
    });
  }
  else if(req.url.match("\.css$")) {
    var cssPath = path.join(__dirname, '', req.url);
    console.log(cssPath);
    var filecss = fs.createReadStream(cssPath, "UTF-8");
    res.writeHead(200, {"Content-Type": "text/css"});
    filecss.pipe(res);
  }

}).listen(8080);