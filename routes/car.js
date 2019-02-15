var express = require('express');
var bodyParser = require('body-parser');
const CarModel = require('../models/car');
var multer = require('multer');

const storage = multer.diskStorage({
    destination: function(req, file, cb){
      cb(null, './uploads/');
    },
    filename: function(req, file, cb){
      // cb(null, new Date().toISOString() + file.originalname)
      cb(null, file.originalname);
    }
});

const fileFilter = (req, file, cb) => {
  if(file.mimetype === 'image/jpеg' || file.mimetype === 'image/png'){
    cb(null, true);
  } else {
   cb(null, false);
  }
}

const upload = multer({storage: storage,
  limits: {
    fileSize: 1024 * 1024 * 5
  },
  // fileFilter: fileFilter
})

// const upload = multer({storage: storage});
const router = express.Router();

router.use(bodyParser.json()).post('/', upload.single('imgSrc'), (req, res) => {
   // const car = new CarModel(req.body);
   let car = new CarModel ({
     make: req.body.make,
     model: req.body.model,
     imgSrc: req.file.path
     // file: req.body.file
   });
   car.save();
   res.status(201).send(car);
});


// router.get('/', (req, res) => {
//   CarModel.find({}, (err, cars) => {
//     res.json(cars);
//   })
// });

router.get('/', (req, res, next) => {
  CarModel.find()
  .select('make model imgSrc')
  .exec()
  .then(docs => {
    const response = {
      // count: docs.length,
      cars: docs.map(doc => {
          return {
            make: doc.make,
            model: doc.model,
            imgSrc: doc.imgSrc,
            _id: doc._id
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

router.get('/:carId', (req, res) => {
  CarModel.findById(req.params.carId).then(car => {
    res.send(car);
  })

})

// router.post('/', (req, res) => {
//   const car = new CarModel({
//       make: req.body.make,
//       model: req.body.model
//   });
//   car.save().then(result => {
//     res.status(201).json({
//       message: 'Creadet car successfully'
//     });
//   })
// });

module.exports = router;
