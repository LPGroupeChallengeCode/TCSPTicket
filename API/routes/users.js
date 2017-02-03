module.exports = function(app) {
	//test
	app.get('/user', function(req, res) {
	        res.write("User routes")
	        res.end();
	});
}

//LOGIN
	app.post('/login', function(req, res, next){
		if(!req.body.mail || !req.body.password){
			return res.status(400).json({message: 'Veuillez remplir tous les champs'});
		}

	db.User.findOne(
		{mail: req.body.mail},
		{password: req.body.password}, function(err, user, info){
			if(err){return next(err);}
			if(user){
				return res.json({token: user.generateJWT()});
			}else{
				return res.status(401).json(info);
			}
		})(res,res, next);
	});

//REGISTER
	app.post('/register', function(req, res, next){
		if(!req.body.mail || !req.body.password){
	    return res.status(400).json({message: 'Veuillez remplir tous les champs'});
	  }
	  var user = new User();

	  user.nom = req.body.nom;
	  user.prenom = req.body.prenom;
	  user.mail = req.body.mail;
	  user.password = md5(req.body.password);
	  
	  user.save(function (err){
	    if(err){ return next(err); }

	    return res.json({token: user.generateJWT()})
	  });
	});
