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
            <h1>Horaires et lignes du TCSP</h1>
        </div>

        <div class="row" style="padding-right: 5%; padding-left: 5%;">
            <h3>Les horaires des lignes du T.C.S.P. seront affichés dans les différentes stations ainsi que les pôles d’échanges.</h3>
            <br>

            <table class="table table-hover col-md-offset-3" style="width: 50%">
                <thead>
                    <tr>
                        <th><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Horaires</th>
                        <th>Jours</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>5h30 / 19h</td>
                        <td>du lundi au jeudi</td>
                    </tr>
                    <tr>
                        <td>5h30 / 22h</td>
                        <td>vendredi et samedi</td>
                    </tr>
                    <tr>
                        <td>5h30h / 19h</td>
                        <td>dimanche et jours fériés</td>
                    </tr>
                    <tr>
                        <td>5h30 / 22h</td>
                        <td>veille de manifestation</td>
                    </tr>
                </tbody>
            </table>
        </div>
 <br>
        <div class="row" style="padding-right: 5%; padding-left: 5%;">
            <p>
                Le parcours est composé de 18 stations; de la gare multimodale de la Pointe-Simon aux pôles d’échanges de Carrère et Mahault.
                <br> 
                Elles sont positionnées sur les axes de circulations suivants :
               <br>
                <ul class="col-md-offset-3">
                    <li>Centre-ville : de la Pointe-Simon à la Place François Mitterrand</li>
                    <li>Avenue Maurice Bishop à Fort de France</li>
                    <li>L’échangeur de Dillon à l’échangeur de l’aéroport</li>
                    <li>RN1 : de l’échangeur du Canal du Lamentin à la Place Mahault</li>
                    <li>RN5 : de l’échangeur de l’aéroport à l’échangeur de Carrère</li>
                </ul>
                
            </p>
            <br>

            <img src="../assets/trajet.jpg" class="img-responsive col-md-offset-1">
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