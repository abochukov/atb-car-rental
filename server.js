var express = require('express');
var app = express();
var mongoose = require('mongoose');
// var morgan = require('morgan');
// var bodyParser = require('body-parser');
// var methodOverride = require('method-override');

mongoose.connect("mongodb://localhost:27017/rental", { useNewUrlParser: true });

app.use(express.static(__dirname + '/public'));
// app.use(morgan('dev'));
// app.use(bodyParser.urlencoded({'extended':'true'}));
// app.use(bodyParser.json());
// app.use(bodyParser.json({ type: 'application/vnd.api+json' }));
// app.use(methodOverride());

app.listen(8080);
console.log('App is now listening port 8080');

// app.get('/', function(req, res) {
//   res.send('Hello World');
// });
//
// var server = app.listen(3000, function(){
//   console.log('just test port 3000');
// })
