module.exports = function(app) {
	//test
	app.get('/ticket', function(req, res) {
	        res.write("tickets routes")
	        res.end();
	});
}

//COMMANDE TICKET *** EN COURS *****
app.put('/ticket/:id/user', auth, function(req, res, next){
	Ticket.findById(req.params.id, function(err, liste){
		if(err){console.log(err);
			return next(err);}
	});
});


//LISTE TICKET
	app.get('/liste/:id', function(req, res, next){
		//recup info
		Liste.findById({'user.ticket.id': req.params.id}, function(err, listes){
			if(err){console.log(err); return next(err);}
		//Envoie rep
		res.json(listes);
		});
	});