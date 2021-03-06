var mongoose = require('mongoose');

var CommandeSchema = new mongoose.Schema({
	client : {
		type : mongoose.Schema.Types.ObjectId,
		ref : 'User'
	},
	tickets : [{
		nom : String,
		qty : String,
		pxUnite : String
	}],
	total : String,
	date : {
		type : Date,
		default : Date.now
	}
});

CommandeSchema.virtual('id').get(function(){
	return this._id;
});

var Commande = mongoose.model('Commande', CommandeSchema);