var express = require('express');
var bodyParser = require('body-parser');
const BookingModel = require('../models/booking');
var multer = require('multer');
var url = require('url');

const router = express.Router();

// SAVE FROM RESERVATION FORM
router.use(bodyParser.json()).post('/', (req, res) => {
  let booking = new BookingModel({
    firstname: req.body.firstname,
    lastname: req.body.lastname,
    email: req.body.email,
    carId: req.body.carId,
    bookedDates: req.body.bookedDates
  });
  booking.save()
    .then(booking => {
      res.status(200).json({'booking': 'Booked successfully'})
    })
    .catch(err => {
      res.status(400).send('Failed to create new booking')
    })
  res.status(201).send(booking);
});

// GET ALL BOOKINGS
router.get('/', (req, res) => {
  // let ci = req.protocol + '://' + req.get('host') + req.originalUrl;
  BookingModel.find({
    // carId: 'ci'
  })
  .select('firstname lastname carId')
  // .where('make', 'Honda')
  .exec()
    .then(docs => {
      const response = {
        // count: docs.length,
        cars: docs.map(doc => {
          return {
            firstname: doc.firstname,
            lastname: doc.lastname,
            carId: doc.carId
          };
        })
      };
      res.status(200).json(response);
    }).catch(err => {
      console.log(err);
      res.status(500).json({
        error: err
      });
    });
});


router.get('/:id', (req, res, next) => {
  const id = req.params.id;
  // let id = req.originalUrl.split('/')[3];
  BookingModel.find({ carId: id })
  .select('firstname lastname carId bookedDates')
  .exec()
  .then(doc => {
    res.status(200).json(doc);
  })
  .catch(err => {
    console.log(err);
    res.status(500).json({error: err});
  })
});

module.exports = router;
