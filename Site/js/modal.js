$(document).ready(function(){
	//modal de connexion
	$("#signIn").click(function(){
		$("#signInModal").modal();
	});

	//modal d'inscription
	$("#signUp").click(function(){
		$("#signInModal").modal('hide');
		$("#signUpModal").modal();
	});

	//message apres envoi mail
	$("#send").click(function(){
		$("#mailSended").modal();
	});

	//fenêtre de saisie mdp oublié
	$("#mdpOub").click(function(){
		$("#signInModal").modal('hide');
		$("#mdpModal").modal();
	});
});