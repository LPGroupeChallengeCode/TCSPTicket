<?php

if($_SESSION['page'] == true){
	//href = "../index.php"
	//href = "nom de la page.php"
	if(empty($_SESSION['session']))
	{
		//affichage de "login"
	}
	else
	{
		//affichage de "logout"
		/*
		<script>
			$(document).ready(function(){
				$(#logout).click(function(){
					window.location.href = "../include/logout.php"
				});
			});
		</script>
		*/
	}
}
else
{
	//href = "#""
	//href = "pages/nom de la page.php"

	if(empty($_SESSION['session']))
	{
		//affichage de "login"
	}
	else
	{
		//affichage de "logout"
		/*
		<script>
			$(document).ready(function(){
				$(#logout).click(function(){
					window.location.href = "include/logout.php"
				});
			});
		</script>
		*/
	}
}

?>