var mongoose = require('mongoose');
const Schema = mongoose.Schema;

const CarModel = mongoose.model('astras', new Schema({
  make: { type: String },
  model: { type: String },
  year: { type: String },
  miliage: { type: String }
}))

module.exports = CarModel;
