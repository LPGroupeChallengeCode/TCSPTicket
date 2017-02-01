var mongoose = require('mongoose');

var TicketSchema = new mongoose.Schema({
	
});

TicketSchema.virtual('id').get(function(){
	return this._id;
});

var Ticket = mongoose.model('Ticket', TicketSchema);