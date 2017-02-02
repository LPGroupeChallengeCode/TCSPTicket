module.exports = function(app) {
	//test
	app.get('/mail', function(req, res) {
	        res.write("mails routes")
	        res.end();
	});
}