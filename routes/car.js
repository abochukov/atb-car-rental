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

const router = express.Router();

router.use(bodyParser.json()).post('/', upload.single('imgSrc'), (req, res) => {
   // const car = new CarModel(req.body);
   let car = new CarModel ({
     make: req.body.make,
     model: req.body.model,
     year: req.body.year,
     doors: req.body.doors,
     aircondition: req.body.aircondition,
     imgSrc: req.file.path,
   });
   car.save();
   res.status(201).send(car);
});


// router.get('/', (req, res, next) => {
//   CarModel.find()
//     .select('make model year doors aircondition imgSrc')
//   .exec()
//   .then(docs => {
//     const response = {
//       // count: docs.length,
//       cars: docs.map(doc => {
//           return {
//             make: doc.make,
//             model: doc.model,
//             year: doc.year,
//             doors: doc.doors,
//             aircondition: doc.aircondition,
//             imgSrc: doc.imgSrc,
//             _id: doc._id
//           };
//       })
//     };
//     res.status(200).json(response);
//   }).catch(err => {
//     console.log(err);
//     res.status(500).json({
//       error: err
//     });
//   });
// });

router.get('/:id', (req, res, next) => {
  const id = req.params.id;
  CarModel.findById(id)
  .select('make model year doors aircondition imgSrc')
  .exec()
  .then(doc => {
    res.status(200).json(doc);
  })
  .catch(err => {
    console.log(err);
    res.status(500).json({error: err});
  })
});

router.get('/', (req, res) => {
  CarModel.find({
    make: 'Opel'
  })
  .select('make model year doors aircondition imgSrc')
  // .where('make', 'Honda')
  .limit(10)
  .exec()
    .then(docs => {
      const response = {
        // count: docs.length,
        cars: docs.map(doc => {
          return {
            make: doc.make,
            model: doc.model,
            year: doc.year,
            doors: doc.doors,
            aircondition: doc.aircondition,
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

// WORKS
// router.get('/:id', (req, res) => {
//   CarModel.findById(req.params.id).then(car => {
//     res.send(car);
//   })
// })


module.exports = router;
