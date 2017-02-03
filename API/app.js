/*
 * Author: Oriane Ruster
 * Date: 2016
 * App Name: "TCSPTicket"
 * Website: TCSPTicket
 * Description: Api de gestion du projet TCSP Ticket (utilisateur, ticket, mail, payement...)
 */
// BASE SETUP
// =============================================================================

// call the packages we need
var express       = require('express');        // call express
var bodyParser    = require('body-parser');
var md5           = require('md5');
var nodemailer    = require('nodemailer');
var smtpTransport = require('nodemailer-smtp-transport');
var paypal        = require('paypal-rest-sdk');
var qr            = require('qr-image');
var mongoose      = require('mongoose');
require('./models/Users');
require('./models/Tickets');
require('./models/Commandes');
var app           = express();                 // define our app using express

//mongoose.connect('mongodb://localhost/billetterietcspdb');

// configure app to use bodyParser()
// this will let us get the data from a POST
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

//passport
//app.use(passport.initialize());

var port = process.env.PORT || 8080;        // set our port

// ROUTES FOR OUR API
// =============================================================================
var router = express.Router();              // get an instance of the express Router

// middleware to use for all requests
router.use(function(req, res, next) {
    // do logging
    console.log('Something is happening.');
    next(); // make sure we go to the next routes and don't stop here
});

// test route to make sure everything is working (accessed at GET http://localhost:8080/api)
/*router.get('/', function(req, res) {
    res.json({ message: 'api working' });   
});*/

// more routes for our API will happen here
require('./routes')(app); //va chercher les routes dans le dossier routes


// REGISTER OUR ROUTES -------------------------------
// all of our routes will be prefixed with /api
//app.use('/api', router);

// START THE SERVER
// =============================================================================
app.listen(port);
console.log('Api working on port ' + port);