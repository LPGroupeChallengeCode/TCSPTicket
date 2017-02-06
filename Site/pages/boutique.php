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

    <!-- Navigation -->
    <?php
        $_SESSION['page'] = true;
        include '../include/navbar.php';
    ?>

    <!-- Page Content -->
    <div class="container wrapper" style="padding-top: 2%; padding-left: 5%; padding-right: 5%">

        <div class="page-header">   
            <h1>Les différents titres de transport</h1>
        </div>

        <div class="row" style="padding-right: 5%; padding-left: 5%;">
        <?php
            if(empty($_SESSION['session'])){
                ?>
                <h3>Connectez vous pour avoir accès à la boutique en ligne</h3>
                <?php
            }
            else{
                ?>
                <h3>Achetez vos titres de transport en ligne</h3>
                <a href="boutique-achat.php" class="btn btn-success">Accès Boutique</a>
                <?php
            }
            ?>
            
            <hr class="featurette-divider">

            <div class="featurette" >
                <img class="featurette-image img-responsive pull-right" style="height: 150px; border-radius: 15px;" src="../assets/JambeDlo.png">
                <h2 class="featurette-heading">Jambé Dlo
                    <span class="text-muted">Aller simple</span>
                </h2>
                <p class="lead">Ticket valable pour un voyage. Possibilité d'éffectuer une correspondance dans l'heure sur une ligne différente.
                <br>
                Prix : 1.80 &euro; 
                </p>
            </div>

            <hr class="featurette-divider">

            <div class="featurette" >
                <img class="featurette-image img-responsive pull-left" style="height: 150px; border-radius: 15px;" src="../assets/Boomrang.png">
                <h2 class="featurette-heading">Boomrang
                    <span class="text-muted">Aller - Retour</span>
                </h2>
                <p class="lead">Ticket valable pour deux voyage sur la même ligne.
                <br>
                Prix : 3 &euro; 
                </p>
            </div>

            <hr class="featurette-divider">

            <div class="featurette" >
                <img class="featurette-image img-responsive pull-right" style="height: 150px; border-radius: 15px;" src="../assets/BelJounin.png">
                <h2 class="featurette-heading">Bèl Jounin
                    <span class="text-muted">Journée</span>
                </h2>
                <p class="lead">Ticket valable pour la journée de 5h à 22h30.
                <br>
                Prix : 3.80 &euro; 
                </p>
            </div>


            <hr class="featurette-divider">

            <div class="featurette" >
                <img class="featurette-image img-responsive pull-left" style="height: 150px; border-radius: 15px;" src="../assets/Soleil.png">
                <h2 class="featurette-heading">Soleil
                    <span class="text-muted">Semaine</span>
                </h2>
                <p class="lead">Ticket valable pour 7 jours consécutifs de 5h pour le premier jour à 22h30 pour le dernier jour.
                <br>
                Prix : 25 &euro; 
                </p>
            </div>

            <hr class="featurette-divider">

            <div class="featurette" >
                <img class="featurette-image img-responsive pull-right" style="height: 150px; border-radius: 15px;" src="../assets/Makadam.png">
                <h2 class="featurette-heading">Makadam
                    <span class="text-muted">Mois</span>
                </h2>
                <p class="lead">Ticket valable pour le mois de l'achat.
                <br>
                Prix : 85 &euro; 
                </p>
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