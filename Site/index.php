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
    <link rel="shortcut icon" href="assets/logo50.png">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600italic,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/modal.css">

    <!-- jQuery -->
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
    <script src="js/jquery.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="js/modal.js"></script>

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
        $_SESSION['page'] = false;
        include 'include/navbar.php';
    ?>

    <!-- Full Width Image Header -->
    <header class="header-image">
        <div class="headline">
            <div class="container" id="h">
                <h1>Billetterie TCSP</h1>
                <h2>Martinique</h2>
                <?php
                if (empty($_SESSION['session']))
                {?>
                    <button type="button" class="btn btn-success btn-lg" role="button" id="signIn">Se connecter</button> <?php
                }
                ?>
            </div>
        </div>
    </header>

    <!-- Modal Sign In -->
    <div class="modal fade" id="signInModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-lock"></span> Connexion</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" method="post" action="http://localhost:8080/login">
                        <div class="form-group">
                            <label for="mail"><span class="glyphicon glyphicon-user"></span> Email</label>
                            <input type="email" class="form-control" name="mail" id="mail" placeholder="Adresse email" required>
                        </div>
                        <div class="form-group">
                            <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-block" id="submit"><span class="glyphicon glyphicon-off"></span> Connexion</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <p><a href="#" id="signUp">S'inscrire</a></p>
                    <p><a href="#" id="mdpOub">Mot de passe oublié ?</a></p>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Error Sign In -->
    <div class="modal fade" id="errorLogin" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-lock"></span> Connexion</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <p>Echec de connexion ! L'email ou le mot de passe est erroné.</p>
                </div>
            </div>

        </div>
    </div>
    <script>
        <?php
         if(isset($_GET['errorLogin']) && $_GET['errorLogin'] = 'true' )
         {?>
        $("#errorLogin").modal();
        <?php
        }
        ?>
    </script>

    <!-- Modal Mdp oublié -->
    <div class="modal fade" id="mdpModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-lock"></span> Mot de passe oublié ?</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <p>Pas de panic, entrez votre adresse mail et nous vous enverrons un lien pour le réinitialiser.</p>
                    <form role="form" method="post" action="http://localhost:8080/resetMdp">
                        <div class="form-group">
                            <label for="email"><span class="glyphicon glyphicon-user"></span> Adresse email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Adresse email" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block" id="submit"><span class="glyphicon glyphicon-lock"></span> Réinitialiser mon mot de passe</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Mdp envoyé -->
    <div class="modal fade" id="mailMdp" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-lock"></span> Mot de passe oublié</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <p>Un email a éte envoyé pour réinitialiser votre mot de passe</p>
                </div>
            </div>

        </div>
    </div>

    <script>
        <?php
         if(isset($_GET['resetMdp']) && $_GET['resetMdp'] = 'true' )
         {?>
        $("#mailMdp").modal();
        <?php
        }
        ?>
    </script>

    <!-- Modal Sign Up -->
    <div class="modal fade" id="signUpModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-pencil"></span> Inscription</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" method="post" action="http://localhost:8080/inscription">
                        <div class="form-group">
                            <label for="prenom"><span class="glyphicon glyphicon-user"></span> Prenom</label>
                            <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Entrer votre prénom" required>
                        </div>
                        <div class="form-group">
                            <label for="nom"><span class="glyphicon glyphicon-user"></span> Nom</label>
                            <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer votre nom" required>
                        </div>
                        <div class="form-group">
                            <label for="email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Entrer votre email" required>
                        </div>
                        <div class="form-group">
                            <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Entrer votre mot de passe" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block" id="submitSignUp"><span class="glyphicon glyphicon-check"></span> Inscription</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script>
        
    </script>
    <!-- Modal Payement -->
    <div class="modal fade" id="paymentModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-send"></span> Bienvenue à bord !</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <p> Votre paiement à été accepté.<br> Vous allez recevoir un email contenant le code vous permettant de retirer vos tickets en station, ou directement à bord.</p>
                </div>
            </div>

        </div>
    </div>
    <script>
        <?php
         if(isset($_GET['payment']) && $_GET['payment'] = 'true' )
         {?>
        $("#paymentModal").modal();
        <?php
        }
        ?>
    </script>

    <!-- Page Content -->
    <div class="container wrapper">

        <br>

        <div class="container">
            <div class="col-md-5">
                <img src="assets/logo130.png" style="margin-top: 5%; margin-left: 15%;">
                <img src="assets/logoCACEM.png" style="margin-top: 5%;">
            </div>

            <div class="col-md-7" style="padding-right: 5%">
                <h2>Le TCSP</h2>
                <p>Le TCSP ou Transport Collectif en Site Propre est un système de transport public qui circule, en totalité ou en partie sur une voie qui lui est réservée.</p>
                
                <p>Avec la billeterie en ligne, achetez vos titres de transport partout et à tout moment.</p>
            </div>
        </div>

        <hr class="featurette-divider">

        <!-- First Featurette -->
        <div class="featurette" >
            <img class="featurette-image img-responsive pull-right" style="height: 250px; border-radius: 50px 15px;" src="assets/tickets.png">
            <h2 class="featurette-heading">Juste un aller ou plutôt un mois...
                <span class="text-muted">Des tickets pour tous les besoins</span>
            </h2>
            <p class="lead">Retrouvez dans la billetterie les tickets disponibles. De l'aller simple au pass pour un mois, profitez de prix plus avantageux que ceux proposés en station.</p>
            <a class="btn btn-success" href="pages/boutique.php">Voir les tickets</a>
        </div>

        <hr class="featurette-divider">

        <!-- Second Featurette -->
        <div class="featurette" >
            <img class="featurette-image img-responsive pull-left" style="height: 250px; border-radius: 15px 50px;" src="assets/Station-Pointe-Simon-TCSP.jpg">
            <h2 class="featurette-heading">Besoin de prévoir votre trajet...
                <span class="text-muted">Retrouvez les horaires et stations du TCSP</span>
            </h2>
            <p class="lead">Plus besoin d'aller en station pour connaître les horaires et lignes, consulter les plages horraires à tout moment.</p>
            <a class="btn btn-success pull-right" href="pages/lignesEtHoraires.php">Lignes et Horaires</a>
        </div>

        <hr class="featurette-divider">

        <!-- Third Featurette -->
        <div class="featurette" >
            <img class="featurette-image img-responsive pull-right" style="height: 250px;" src="assets/phone.jpg">
            <h2 class="featurette-heading">La billeterie accessible partout...
                <span class="text-muted">Et même sur mobile.</span>
            </h2>
            <p class="lead">La Billetterie TCSP Martinique est également disponible sur iOS et Android.<br>
                <img src="assets/google-play-badge.png" style="height: 90px">
                <img src="assets/app-store-logo.png" style="height: 60px">
            </p>
        </div>

        <hr class="featurette-divider" id="contact">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="well well-sm">
                    <form class="form-horizontal" method="post" action="http://localhost:8080/contact">
                        <fieldset>
                            <legend class="text-center header">Contact</legend>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="prenom" name="prenom" type="text" placeholder="Prénom" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="nom" name="nom" type="text" placeholder="Nom" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="email" name="email" type="email" placeholder="Adresse Email" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-commenting-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="mailObject" name="mailObject" type="text" placeholder="Objet" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <textarea class="form-control" style="resize: none;" id="mailContent" name="mailContent" placeholder="Tapez votre message ici., nous reviendrons vers vous aussi vite que possible." rows="7" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" id="send" class="btn btn-success btn-lg">Envoyer</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="mailSended" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:35px 50px;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4><span class="glyphicon glyphicon-envelope"></span> Contact</h4>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <p>VOtre mail a été envoyé, nous reviendrons vers vous dans les plus brefs delais !</p>
                    </div>
                </div>

            </div>
        </div>
        <script>
            <?php
             if(isset($_GET['mailSended']) && $_GET['mailSended'] = 'true' )
             {?>
            $("#mailSended").modal();
            <?php
            }
            ?>
        </script>

        <style>
            .header {
                color: #e26700;
                font-size: 27px;
                padding: 10px;
            }

            .bigicon {
                font-size: 35px;
                color: #e26700;
            }
        </style>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Tropic404Dev 2017 - Billetterie TCSP Martinique <a href="pages/mentionsLegales.php">Mentions Legales</a></p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

</body>

</html>
