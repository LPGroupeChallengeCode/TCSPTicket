<?php
session_start();
/*if(empty($_SESSION['session'])){
    echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";
    exit();
}*/
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
    <div class="container wrapper" style="padding-top: 2%;padding-right: 5%; padding-left: 5%;">

        <div class="page-header">   
            <h1>Billetterie en ligne</h1>
        </div>

        <div class="row" style="padding-right: 5%; padding-left: 5%;">

            <form role="form" method="post" action="http://localhost:8080/paypal/paynow">

                <div class="form-group col-md-7">
                    <img src="../assets/JambeDlo.png" style="height: 100px; border-radius: 15px;">
                    <label for="jambedlo">Jambé Dlo (Aller simple) - 1.80 &euro;</label>
                    <input type="number" id="jambedlo" value="0" min="0" style="width: 5%; text-align: center;">
                </div>

                <div class="form-group col-md-offset-2">
                    <img src="../assets/Boomrang.png" style="height: 100px; border-radius: 15px;">
                    <label for="boomrang">Boomrang (Aller - Retour) - 3 &euro;</label>
                    <input type="number" id="boomrang" value="0" min="0" style="width: 5%; text-align: center;">
                </div>

                <div class="form-group col-md-7">
                    <img src="../assets/BelJounin.png" style="height: 100px; border-radius: 15px;">
                    <label for="beljounin">Bèl Jounin (Journée) - 3.80 &euro;</label>
                    <input type="number" id="beljounin" value="0" min="0" style="width: 5%; text-align: center;">
                </div>

                <div class="form-group col-md-offset-2">
                    <img src="../assets/Soleil.png" style="height: 100px; border-radius: 15px;">
                    <label for="soleil">Soleil (Semaine) - 25 &euro;</label>
                    <input type="number" id="soleil" value="0" min="0" style="width: 5%; text-align: center;">
                </div>

                <div class="form-group col-md-7">
                    <img src="../assets/Makadam.png" style="height: 100px; border-radius: 15px;">
                    <label for="makadam">Makadam (Mois) - 85 &euro;</label>
                    <input type="number" id="makadam" value="0" min="0" style="width: 5%; text-align: center;">
                </div>

                <div class="form-group col-md-offset-2">
                    
                    <label for="total">Total : </label>
                    <input type="number" id="total" value="0" min="0" style="width: 10%; text-align: center;" readonly="">
                </div>

                <div class="form-group">
                    <input type="hidden" class="form-control" name="userId" id="userId">
                </div>

                <button type="submit" class="btn btn-success" id="submitBuy"><span class="glyphicon glyphicon-shopping-cart"></span> Acheter</button>
            </form>

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