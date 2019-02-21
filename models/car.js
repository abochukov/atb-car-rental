var mongoose = require('mongoose');
const Schema = mongoose.Schema;

const CarModel = mongoose.model('astras', new Schema({
  make: { type: String },
  model: { type: String },
  year: { type: String },
  miliage: { type: String },
  doors: { type: String },
  aircondition: { type: String },
  imgSrc: { type: String },
  carid: { type: String },
  from_date: { type: String },
  to_date: { type: String }
}));

module.exports = CarModel;
