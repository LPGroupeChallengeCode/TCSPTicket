var express       = require('express');        // call express
var bodyParser    = require('body-parser');
var md5           = require('md5');
var nodemailer    = require('nodemailer');
var smtpTransport = require('nodemailer-smtp-transport');
var paypal        = require('paypal-rest-sdk');
var qr            = require('qr-image');
var mongoose      = require('mongoose');
var Ticket        = mongoose.model('Ticket');

module.exports = function(app) {
	
	//Récupérer les informations de tous les tickets
	app.get('/tickets', function(req, res, next){
		Ticket.find(function(err, tickets){
			if(err){console.log(err); return next(err);}
			res.json(tickets);
		});
	});

	//ajouter ticket

	//ticket par id 

	//ticket par nom
	
}