var express = require('express');
var bodyParser = require('body-parser');
const LanguageModel = require('../models/language');
var multer = require('multer');

const router = express.Router();

/* tuk shte e update, a ne post */
router.put('/', (req, res) => {
  const language = req.body;
  // let lang = new LanguageModel ({
  //   language: req.body.language,
  // });

  //
  // console.log(language);

  /* DON"T REMOVE */

  // if(language.language == 'bg') {
  //   console.log('bulgarian is active');
  // } else if(language.language == 'en') {
  //   console.log('english is active');
  // } else if(language.language == 'de'){
  //   console.log('german is active');
  // }

  // console.log(language.language);
  LanguageModel.findOneAndUpdate({"language": "123" }, {$set: {home : "111"}});
  // console.log(language.language);
  // lang.save();
  // res.status(201).send(lang);
});

router.get('/', (req, res) => {
  LanguageModel.find(err, lang => {})
    if(err) {
      console.log(err);
    } else {
      res.json(lang);
    }
});

module.exports = router;
