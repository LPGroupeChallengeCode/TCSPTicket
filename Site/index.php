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
    <meta name="description" content="">
    <meta name="author" content="Tropic404Dev">

    <title>Billetterie TCSP Martinique</title>
    <link rel="shortcut icon" href="assets/logo50.png">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600italic,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/modal.css">
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
            <div class="container">
                <h1>Billetterie TCSP Martinique</h1>
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
                    <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" method="post" action="http://192.168.84.160:3000/api/login">
                        <div class="form-group">
                            <label for="emailSignIn"><span class="glyphicon glyphicon-user"></span> Username</label>
                            <input type="email" class="form-control" name="emailSignIn" id="emailSignIn" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="passwordSignIn"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                            <input type="password" class="form-control" name="passwordSignIn" id="passwordSignIn" placeholder="Enter password" required>
                        </div>
                        <div>
                            <a class="btn btn-social-icon btn-facebook">
                                <span class="fa fa-facebook"></span>
                            </a>
                            <a class="btn btn-social-icon btn-google">
                                <span class="fa fa-google"></span>
                            </a>
                        </div>
                        <button type="submit" class="btn btn-success btn-block" id="submit"><span class="glyphicon glyphicon-off"></span> Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <p>Not a member? <a href="#" id="signUp">Sign Up</a></p>
                    <p>Forgot <a href="#" id="mdpOub">Password?</a></p>
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
                    <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <p>Connection failed ! Wrong password or email.</p>
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
                    <h4><span class="glyphicon glyphicon-lock"></span> Forgot Password ?</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <p>Don't worry, enter your email address and we will send you a link to reset it.</p>
                    <form role="form" method="post" action="http://192.168.84.160:3000/api/resetMdp">
                        <div class="form-group">
                            <label for="emailMdp"><span class="glyphicon glyphicon-user"></span> Username</label>
                            <input type="email" class="form-control" name="emailMdp" id="emailMdp" placeholder="Enter email" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block" id="submit"><span class="glyphicon glyphicon-lock"></span> Send My Password</button>
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
                    <h4><span class="glyphicon glyphicon-lock"></span> Reset Password</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <p>An email have been send to reset your password.</p>
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
                    <h4><span class="glyphicon glyphicon-pencil"></span> Sign Up</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" method="post" action="http://192.168.84.160:3000/api/signUp">
                        <div class="form-group">
                            <label for="first_name"><span class="glyphicon glyphicon-user"></span> First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter your first name" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name"><span class="glyphicon glyphicon-user"></span> Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter your last name" required>
                        </div>
                        <div class="form-group">
                            <label for="emailSignUp"><span class="glyphicon glyphicon-envelope"></span> Email</label>
                            <input type="email" class="form-control" name="emailSignUp" id="emailSignUp" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block" id="submitSignUp"><span class="glyphicon glyphicon-check"></span> Sign Up</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Payement -->
    <div class="modal fade" id="paymentModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-send"></span> Have a nive trip !</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <p> Your payment have been recorded.<br> You will receive an email with your ticket, or you can print it directly from your profile page.</p>
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
            <div class="col-md-3">
                <img src="assets/logo130.png" style="margin-top: 5%; margin-left: 25%;">
            </div>

            <div class="col-md-8">
                <h2>Le TCSP</h2>
                <p>Le TCSP ou Transport Collectif en Site Propre est un système de transport public qui circule, en totalité ou en partie sur une voie qui lui est réservée.</p>
                
                <p>Avec la billeterie en ligne, achetez vos titres de transport partout et à tout moment.</p>
            </div>

        </div>

        <hr class="featurette-divider">

        <!-- First Featurette -->
        <div class="featurette" >
            <img class="featurette-image img-responsive pull-right" style="height: 250px" src="assets/tickets.png">
            <h2 class="featurette-heading">Juste un aller ? Ou plutôt un mois...
                <span class="text-muted">Des tickets pour tous les besoins</span>
            </h2>
            <p class="lead">Retrouvez dans la billetterie des tickets pour un simple aller, de même que des pass au mois. Profitez de prix plus avantageux que ceux proposés en station.</p>
            <button class="btn btn-success"><a href=""></a> Détails</button>
        </div>

        <hr class="featurette-divider" id="services">

        <!-- Second Featurette -->
        <div class="featurette" >
            <img class="featurette-image img-circle img-responsive pull-left" src="assets/480985941.jpg">
            <h2 class="featurette-heading">What do we do ?
                <span class="text-muted">How does it work ?</span>
            </h2>
            <p class="lead">Choose a destination and let's go. Rail Commander lets you choose your time range. Choice done ? now let's pay. Security first! Pay with Paypal and get your ticket.</p>
        </div>

        <hr class="featurette-divider" id="app">

        <!-- Third Featurette -->
        <div class="featurette" >
            <img class="featurette-image img-circle img-responsive pull-right" src="assets/505474709.jpg">
            <h2 class="featurette-heading">Always with you,
                <span class="text-muted">book everywhere.</span>
            </h2>
            <p class="lead">Have to book on the way ? Don't worry, Rail Commander is also on your phone. <br>
                <img src="assets/google-play-badge.png" style="height: 90px">
                <img src="assets/app-store-logo.png" style="height: 60px">
            </p>
        </div>

        <hr class="featurette-divider" id="contact">

        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form class="form-horizontal" method="post" action="http://192.168.84.160:3000/api/contact">
                        <fieldset>
                            <legend class="text-center header">Contact us</legend>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="fname" name="fname" type="text" placeholder="First Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="lname" name="lname" type="text" placeholder="Last Name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="emailUser" name="emailUser" type="email" placeholder="Email Address" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-commenting-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="mailObject" name="mailObject" type="text" placeholder="Object" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" id="send" class="btn btn-primary btn-lg">Send</button>
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
                        <p>Thank you for contacting us. We will get back to you as soon as possible !</p>
                    </div>
                </div>

            </div>
        </div>

        <style>
            .header {
                color: #36A0FF;
                font-size: 27px;
                padding: 10px;
            }

            .bigicon {
                font-size: 35px;
                color: #36A0FF;
            }
        </style>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Rail Commander 2016  <a href="pages/mentionsLegales.php">Mentions Legales</a></p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

</body>

</html>
