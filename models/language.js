var mongoose = require('mongoose');
const Schema = mongoose.Schema;

const LanguageModel = mongoose.model('languages', new Schema({
  language: { type: String }
  // english: { type: String },
  // deutch: { type: String },
}));

module.exports = LanguageModel;
