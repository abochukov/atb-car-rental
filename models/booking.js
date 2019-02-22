var mongoose = require('mongoose');
const Schema = mongoose.Schema;

const BookingModel = mongoose.model('bookings', new Schema({
  firstname: { type: String },
  lastname: { type: String },
  email: { type: String }
}));

module.exports = BookingModel;
