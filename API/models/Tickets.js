var mongoose = require('mongoose');

var TicketSchema = new mongoose.Schema({
	nom : String,
	prix : String,
	description : String,
	
});

TicketSchema.virtual('id').get(function(){
	return this._id;
});

var Ticket = mongoose.model('Ticket', TicketSchema);