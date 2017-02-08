<?php
session_start();

if(isset($_SESSION['session'])){
    $session = $_SESSION['session'];
}
?>
<!DOCTYPE html>
<html lang="fr" class="no-js">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Application web qui permet l'achat de titre de transport pour le TCSP Martinique">
    <meta name="author" content="Tropic404Dev">

    <title>Billetterie TCSP Martinique</title>
    <link rel="shortcut icon" href="../assets/logo50.png">

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600italic,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/modal.css">

    <!-- jQuery -->
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
    <script src="../js/jquery.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="../js/modal.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="layout-boxed">

    

    <!-- Page Content -->
    <div class="container wrapper" style="padding-right: 5%; padding-left: 5%;">

    	<div class="row" style="text-align: center;">
    			<h1>Billetterie TCSP Matinique</h1>
    		<span class="col-md-2 text-center"></span>
    		<div class="col-md-8">
    			<div class="well well-sm">
    			<form class="form-horizontal" method="post" action="http://localhost:8080/user/password">
    					<fieldset>
    						<legend class="text-center header">Réinitialiser votre mot de passe</legend>

    						<div class="form-group">
    							<span class="col-md-2 text-center"></span>
    							<div class="col-md-8">
    								<input id="email" name="email" type="email" value="<?php echo $_GET['email']; ?>" class="form-control" required readonly="readonly">
    							</div>
    						</div>

    						<div class="form-group">
    							<span class="col-md-2 text-center"></span>
    							<div class="col-md-8">
    								<input id="newPassword" name="newPassword" type="password" placeholder="New password" class="form-control" required>
    							</div>
    						</div>

    						<div class="form-group">
    							<span class="col-md-2 text-center"></span>
    							<div class="col-md-8 text-center">
    								<button type="submit" id="resetMdp" class="btn btn-primary btn-lg">Reset</button>
    							</div>
    						</div>
    					</fieldset>
    				</form>
    			</div>
    		</div>
    	</div>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Tropic404Dev 2017 - Billetterie TCSP Martinique <a href="mentionsLegales.php">Mentions Legales</a></p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

</body>

</html>