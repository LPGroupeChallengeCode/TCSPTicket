module.exports = function(app) {
	//route de User
	require('./users')(app); //users.js
	//route Ticket
	require('./tickets')(app); //tickets.js
	//route Mail
	require('./mails')(app); //mails.js
	//route Paypal
	require('./paiements')(app); //paiements.js
}