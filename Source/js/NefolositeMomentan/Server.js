var express = require('express');
var bodyParser = require('body-parser');
var app = express();


app.use(bodyParser.urlencoded({extended: true}));
app.use(express.static(__dirname + '/public'));
app.set('view engine', 'ejs')

app.get('/', function(req, res) {
    res.render('index');
});

app.post('/myaction' , function(req, res) {
    res.send(req.body.userid + '.');
  console.log(req.body.userid);
});

app.listen(8080, function() {
  console.log('Server opened on localhost at port 8080');
});