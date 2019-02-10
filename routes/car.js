var express = require('express');
var bodyParser = require('body-parser');
const CarModel = require('../models/car');
const router = express.Router();

router.use(bodyParser.json()).post('/', (req, res) => {
   const car = new CarModel(req.body);
   car.save();
   res.status(201).send(car);
});

router.get('/', (req, res) => {
  CarModel.find({}, (err, cars) => {
    res.json(cars);
  })
});

router.use(bodyParser.raw({ type: 'image' })).post('/image', (req, res) => {
  console.log(req.files);
  res.sendStatus(200);
});

// router.post('/save', (req, res) => {
//   res.json('create new record');
//   // let newCar = new CarModel({
//   //   make: 'Audi',
//   //   model: 'A2'
//   // });
//   // newCar.save()
//   //   .then(newCar => {
//   //     res.status(200).json({'newCar': 'Added successfully'});
//   //   })
//   //   .catch(err => {
//   //     res.status(400).send('Failed creating new record');
//   //   })
// });

// router.get('/:id', (req, res) => {
//   CarModel.findById(req.params.id, (err, cars) => {
//     res.json(cars);
//   })
// });

// router.post('/save', (req, res) => {
//   CarModel.create({
//     make: 'Audi',
//     model: 'A1',
//     year: '2000',
//     miliage: '2000'
//   }, (err, cars) => {
//     res.json(cars);
//   })
// });



module.exports = router;
