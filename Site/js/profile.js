$(document).ready(function(){

	var user;
	var userCommandes;
	var ticket_details;

	$(function(){
		$.getJSON(
			"http://localhost:8080/user/"+$("#uId").text(),
			function(result) {
				user = result.map(function(value) {
					return{
						'id' : value._id,
						'prenom' : value.prenom,
						'nom' : value.nom,
						'email' : value.email,
						'commandes' : value.commandes
					};
				});

				$("#welcome").append("Bonjour " + user.prenom + " " + user.nom + ",");
				getTickets(user);
			}
		);
	});

	function getTickets(user){
		$.getJSON(
			"http://localhost:8080/commande/"+user[0].id,
			function(result) {
				userCommandes = result.map(function(value) {
					return{
						'id' : value._id,
						'tickets' : value.tickets,
						'total' : value.total,
						'date' : value.date
					};
				});
				
				userCommandes.forEach(function(commande){
					displayTickets(commande);
				});
			}
		);
	}

	function displayTickets(commande){
		$("#history").append("<tr>"+
			"<td>"+ commande._id +"</td>"+
			"<td>"+ commande.date +"</td>"+
			"<td>"+ commande.total +"</td>"+
			"<td>"+ commande.tickets.forEach(function(ticket){
				ticket.qty + " " + ticket.nom + " unité : " + ticket.pxUnite
			}) +"</td>"+
			"</tr>"
		);
	}

});