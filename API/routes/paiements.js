module.exports = function(app) {
	//test
	app.get('/paiement', function(req, res) {
	        res.write("paiement routes")
	        res.end();
	});
}