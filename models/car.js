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

const BookingModel = mongoose.model('booking', new Schema({
  carid: { type: String },
  customerName: { type: String },
  customerFamily:{ type: String },
  customerEmail: { type: String },
  customerCountry: { type: String },
  customerAddress: { type: String },
  from_date: { type: String },
  to_date: { type: String }
}))

module.exports = CarModel;
module.export = BookingModel;
