var mongoose = require('mongoose');
const Schema = mongoose.Schema;

const CarModel = mongoose.model('cars', new Schema({
  make: { type: String },
  model: { type: String },
  year: { type: String },
  miliage: { type: String },
  doors: { type: String },
  aircondition: { type: String },
  imgSrc: { type: String },
}));

module.exports = CarModel;
