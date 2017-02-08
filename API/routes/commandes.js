var express       = require('express');        // call express
var bodyParser    = require('body-parser');
var md5           = require('md5');
var nodemailer    = require('nodemailer');
var smtpTransport = require('nodemailer-smtp-transport');
var paypal        = require('paypal-rest-sdk');
var qr            = require('qr-image');
var mongoose      = require('mongoose');
var Commande      = mongoose.model('Commande');

module.exports = function(app) {
	
	//Récupérer toutes les commandes d'un utilisateur
	app.get('/commande/:user', function(req, res, next){
		Commande.find({client : req.params.user}, function(err, commandes){
			if(err){console.log(err); return next(err);}
			res.json(commandes);
		});
	});

	//récupérer une commande par id
	app.get('/commande/:id', function(req, res, next){
		Commande.findById(req.params.id, function(err, commande){
			if(err){console.log(err); return next(err);}
			res.json(commande);
		});
	});

	//récupérer toutes les commandes
	app.get('/commandes', function(req, res, next){
		Commande.find(function(err, commandes){
			if(err){console.log(err); return next(err);}
			res.json(commandes);
		});
	});
}