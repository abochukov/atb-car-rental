var express = require('express');
var path = require('path');
var mongoose = require('mongoose');
var cors = require('cors');
var bodyParser = require('body-parser');
var multer = require('multer');
const app = express();

const carRouter = require('./routes/car.js');

const db = mongoose.connect('mongodb://localhost:27017/rental', { useNewUrlParser: true });

// app.use('/api/*', cors());
app.use('/uploads', express.static('uploads'));
app.use('/api/cars', carRouter);
app.use('/', express.static(path.join(__dirname, '/client/dist')));

app.get('*', function(req, res) {
  res.sendFile(path.join(__dirname, '/client/dist/index.html'));
});

app.listen(5656, () => {
  console.log('http://localhost:5656')
});
