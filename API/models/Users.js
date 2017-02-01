var mongoose = require('mongoose');

var UserSchema = new mongoose.Schema({
	nom : String,
	prenom : String,
	email : {
		type: String, 
		unique: true
	},
	password: String,
	firstName: String,
	commandes : [{
		tickets : 
	}]
});

UserSchema.virtual('id').get(function(){
	return this._id;
});

var User = mongoose.model('User', UserSchema);