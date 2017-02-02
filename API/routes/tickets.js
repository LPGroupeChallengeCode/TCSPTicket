module.exports = function(app) {
	//test
	app.get('/ticket', function(req, res) {
	        res.write("tickets routes")
	        res.end();
	});
}