var express = require('express');
const CarModel = require('../models/car');
const router = express.Router();

router.get('/', (req, res) => {
  CarModel.find({}, (err, cars) => {
    res.json(cars);
  })
});

router.get('/:id', (req, re) => {
  CarModel.findById(req.params.id, (err, cars) => {
    res.json(cars);
  })
})

module.exports = router;
