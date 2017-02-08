<?php
session_start();
if(isset($_SESSION['session'])){
    $session = $_SESSION['session'];
}
elseif(isset($_GET['user'])){
    $session = $_GET['user'];
    $_SESSION['session'] = $session;
}
if(empty($_SESSION['session'])){
    echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";
    exit();
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

    <title>Mon Espace - Billetterie TCSP Martinique</title>
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
    <script src="../js/profile.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="layout-boxed">
<p id="uId" style="display: none"><?php echo $session; ?></p>
    <!-- Navigation -->
    <?php
        $_SESSION['page'] = true;
        include '../include/navbar.php';
    ?>

	<!-- Modal after first sign up-->
	<div class="modal fade" id="successSignUp" role="dialog">
	    <div class="modal-dialog">

	        <!-- Modal content-->
	        <div class="modal-content">
	            <div class="modal-header" style="padding:35px 50px;">
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	                <h4><span class="glyphicon glyphicon-pencil"></span> Inscription</h4>
	            </div>
	            <div class="modal-body" style="padding:40px 50px;">
	                <p>Bienvenue sur votre espace personnel ! <br> Un email de confirmation à été envoyé à votre adresse.</p>
	            </div>
	        </div>

	    </div>
	</div>
	<script>
	    <?php
	     if(isset($_GET['firstLogin']) && $_GET['firstLogin'] = 'true' )
	     {?>
	        $("#successSignUp").modal();
	    <?php
	    }
	    ?>
	</script>

    <!-- Page Content -->
    <div class="container wrapper" style="padding-top: 2%;padding-right: 5%; padding-left: 5%;">

    	<h2 id="welcome"></h2>

    	<div class="alert alert-info">
    		Dans votre espace personnel vous pouvez voir l'ensemble de vos commandes passées. <br>
    		Nous travaillons sur la possibillité de renouveler vos achats, sans repasser par la boutique.
    	</div>
 
 		<table class="table table-hover col-md-offset-2" style="width: 70%">
 			<thead>
 				<tr>
 					<th>
 						N° de Commande
 					</th>
 					<th>
 						Date
 					</th>
 					<th>
 						Tickets
 					</th>
 					<th>
 						Total
 					</th>
 				</tr>
 			</thead>
 			<tbody id="history">
 				
 			</tbody>
 			
 		</table>

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