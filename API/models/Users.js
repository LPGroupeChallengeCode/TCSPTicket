var mongoose = require('mongoose');

var UserSchema = new mongoose.Schema({
	nom : String,
	prenom : String,
	email : {
		type: String, 
		unique: true
	},
	password: String,
	commandes : [{
		type : mongoose.Schema.Types.ObjectId,
		ref : 'Commande'
	}]
});

UserSchema.virtual('id').get(function(){
	return this._id;
});

var User = mongoose.model('User', UserSchema);