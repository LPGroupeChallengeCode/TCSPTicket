module.exports = function(app) {
	//test
	app.get('/user', function(req, res) {
	        res.write("User routes")
	        res.end();
	});
}