var express = require('express');
var mongoose = require('mongoose');
var cors = require('cors');
const app = express();

const carRouter = require('./routes/car.js');

const db = mongoose.connect('mongodb://localhost:27017/rental', { useNewUrlParser: true });

app.use(cors());
app.use('/api/cars', carRouter);

// app.get('*', function(req, res) {
//   res.sendfile('./public/index.html');
// })

app.listen(5656, () => {
  console.log('http://localhost:5656')
})
