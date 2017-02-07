$(document).ready(function(){

	var user;
	var userCommandes;
	var ticket_details;

	$(function(){
		$.getJSON(
			"http://localhost:8080/user/"+$("#uId").text(),
			function(user) { 
				/*user = result.map(function(value) {
					return{
						'id' : value._id,
						'prenom' : value.prenom,
						'nom' : value.nom,
						'email' : value.email,
						'commandes' : value.commandes
					};
				});*/

				$("#welcome").append("Bonjour " + user.prenom + " " + user.nom + ",");
				getTickets(user);
			}
		);
	});

	function getTickets(user){
		$.getJSON(
			"http://localhost:8080/commande/"+user._id,
			function(userCommandes) {
				/*userCommandes = result.map(function(value) {
					return{
						'id' : value._id,
						'tickets' : value.tickets,
						'total' : value.total,
						'date' : value.date
					};
				});*/
				
				userCommandes.forEach(function(commande){
					displayTickets(commande);
				});
			}
		);
	}

	function displayTickets(commande){
		var t = [];
		$.each(commande.tickets, function(key, value){
			t.push( JSON.stringify(value.qty) + " " + JSON.stringify(value.nom));
		});
		$("#history").append("<tr>"+
			"<td>"+ commande._id +"</td>"+
			"<td>"+ commande.date +"</td>"+
			"<td>"+	t +"</td>"+
			"<td>"+ commande.total +"</td>"+
			"</tr>"
		);
	}

});