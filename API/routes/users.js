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
		{password: req.body.password})

	if(user){
				return res.json({token: user.generateJWT()});
			}else{
				return res.status(401).json(info);
			}
		(req, res, next);
	});

//REGISTER
	app.post('/register', function(req, res, next){
		//INSERT DB
		db.User.insert(
		{name : req.body.name},
		{firstname : req.body.firstname},
		{mail : req.body.mail},
		{password : req.body.password})
		})