$(document).ready(function(){

	var user;
	var tickets;
	var jsonElements = [];
	var i;
	var ticket_details;

	$(function(){
		$.getJSON(
			"url api get user by email"+$("#uEmail").text(),
			function(result) {
				user = result.map(function(value) {
					return{
						'id' : value._id,
						'prenom' : value.prenom,
						'nom' : value.nom,
						'email' : value.email
					};
				});
				//si il y a le nom de l'utilisateur à ecrire
				//$("#idDuTexte").append("Phrase " + user[0].prenom + " " + user.[0].nom);
				getCommandes();
			}
		);
	});

	function getCommandes(){
		$.getJSON(
			"url api get commandes par id utilisateur "+user[0].id,
			function(result) {
				commandes = result.map(function(value) {
					return{
						'tickets' : value.tickets,
						'total' : value.total,
						'date' : value.date
					};
				});
				
				commandes.forEach(function(commande){
					displayTickets(commandes[i]);
				});
			}
		);
	}

	function displayTickets(commande){
		console.log(commande);
	}

});