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
		tickets : [
			type : mongoose.Schema.Types.ObjectId,
			ref : 'Tickets'
		],
		total : String,
		date : {
			type : Date,
			default : Date.now
		}
	}]
});

UserSchema.virtual('id').get(function(){
	return this._id;
});

var User = mongoose.model('User', UserSchema);