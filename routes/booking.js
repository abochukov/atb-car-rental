var express = require('express');
var bodyParser = require('body-parser');
const BookingModel = require('../models/booking');
var multer = require('multer');

const router = express.Router();

// SAVE FROM RESERVATION FORM
router.use(bodyParser.json()).post('/', (req, res) => {
  console.log(req.body);
  let booking = new BookingModel({
    firstname: req.body.firstname,
    lastname: req.body.lastname,
    email: req.body.email
  });
  booking.save();
  res.status(201).send(booking);
});

module.exports = router;
