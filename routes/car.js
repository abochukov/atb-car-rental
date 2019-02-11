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

router.use(bodyParser.json()).post('/', upload.single('avatar'), (req, res) => {
   // const car = new CarModel(req.body);
   let car = new CarModel ({
     make: req.body.make,
     model: req.body.model,
     avatar: req.body.avatar
     // file: req.body.file
   });
   car.save();
   res.status(201).send(car);
});



// router.post('/', (req, res, next) => {
//   const car = new CarModel({
//     make: req.body.make,
//     model: req.body.model
//   });
//   car.save();
//   res.status(201).json({
//     message: 'HandlingPOST request',
//     createdCar: car
//   })
// })

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


router.get('/', (req, res) => {
  CarModel.find({}, (err, cars) => {
    res.json(cars);
  })
});

// router.use(bodyParser.raw({ type: 'image' })).post('/image', (req, res) => {
//   console.log(req.files);
//   res.sendStatus(200);
// });

// router.post('/', (req, res) => {
// let car = new CarModel(req.body);
//   car.save();
//   rest.status(201).send(car);
//
// })

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
