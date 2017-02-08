<?php
session_start();

if(isset($_SESSION['session'])){
    $session = $_SESSION['session'];
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

        <div class="row" style="padding-top: 5%;padding-right: 5%; padding-left: 5%;">

            <div class="col-md-7" style="padding-bottom: 5%">
                <img src="../assets/JambeDlo.png" style="height: 80px; border-radius: 15px;">
                <label for="jambedlo">Jambé Dlo (Aller simple) - 1.80 &euro;</label>
                <input type="number" id="jambedlo" value="0" min="0" style="width: 6%; text-align: center;">
            </div>

            <div class="col-md-offset-2" style="padding-bottom: 5%">
                <img src="../assets/Boomrang.png" style="height: 80px; border-radius: 15px;">
                <label for="boomrang">Boomrang (Aller - Retour) - 3 &euro;</label>
                <input type="number" id="boomrang" value="0" min="0" style="width: 6%; text-align: center;">
            </div>

            <div class=" col-md-7" style="padding-bottom: 5%">
                <img src="../assets/BelJounin.png" style="height: 80px; border-radius: 15px;">
                <label for="beljounin">Bèl Jounin (Journée) - 3.80 &euro;</label>
                <input type="number" id="beljounin" value="0" min="0" style="width: 6%; text-align: center;">
            </div>

            <div class=" col-md-offset-2" style="padding-bottom: 5%">
                <img src="../assets/Soleil.png" style="height: 80px; border-radius: 15px;">
                <label for="soleil">Soleil (Semaine) - 25 &euro;</label>
                <input type="number" id="soleil" value="0" min="0" style="width: 6%; text-align: center;">
            </div>

            <div class=" col-md-7" style="padding-bottom: 5%">
                <img src="../assets/Makadam.png" style="height: 80px; border-radius: 15px;">
                <label for="makadam">Makadam (Mois) - 85 &euro;</label>
                <input type="number" id="makadam" value="0" min="0" style="width: 6%; text-align: center;">
            </div>

            <button class="btn btn-success" id="submitBuy" onclick="buyMod()"><span class="glyphicon glyphicon-shopping-cart"></span> Acheter</button>
        </div>

        <!-- Modal Buy -->
        <div class="modal fade" id="buyModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:35px 50px;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4><span class="glyphicon glyphicon-shopping-cart"></span> Acheter</h4>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <form role="form" method="post" action="http://localhost:8080/paypal/paynow">
                            <div class="form-group">
                                <label for="jambedloQty"><span></span> Jambé Dlo</label>
                                <input type="text" class="form-control" name="jambedloQty" id="jambedloQty" readonly="readonly"/>
                            </div>

                            <div class="form-group">
                                <label for="boomrangQty"><span></span> Boomrang</label>
                                <input type="text" class="form-control" name="boomrangQty" id="boomrangQty" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="departure" id="departure">
                            </div>

                            <div class="form-group">
                                <label for="beljouninQty"><span></span> Bèl Jounin</label>
                                <input type="text" class="form-control" name="beljouninQty" id="beljouninQty" readonly="readonly">
                            </div>

                            <div class="form-group">
                                <label for="soleilQty"><span></span> Soleil</label>
                                <input type="text" class="form-control" name="soleilQty" id="soleilQty" readonly="readonly">
                            </div>

                            <div class="form-group">
                                <label for="makadamQty"><span></span> Makadam</label>
                                <input type="text" class="form-control" name="makadamQty" id="makadamQty" readonly="readonly">
                            </div>

                            <div class="form-group">
                                <label for="total"><span></span> Total</label>
                                <input type="text" class="form-control" name="total" id="total" readonly="readonly">
                            </div>

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="userId" id="userId">
                            </div>

                            <hr>

                            <!-- Name -->
                            <div class="form-group">
                                <label class="control-label"  for="username">Nom du propriétaire de la carte</label>
                                <div class="controls">
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>

                            <!-- Card Number -->
                            <div class="form-group">
                                <label class="control-label" for="email">Numéro de carte</label>
                                <div class="controls">
                                  <input type="text" class="form-control" required>
                                </div>
                            </div>

                            <!-- Expiry-->
                            <div class="form-group">
                                <label class="control-label" for="password">Date d'expiration</label>
                                <div class="controls">
                                    <select class="input-small">
                                        <option value="01">Jan (01)</option>
                                        <option value="02">Fev (02)</option>
                                        <option value="03">Mar (03)</option>
                                        <option value="04">Avr (04)</option>
                                        <option value="05">Mai (05)</option>
                                        <option value="06">Juin (06)</option>
                                        <option value="07">Juil (07)</option>
                                        <option value="08">Aout (08)</option>
                                        <option value="09">Sep (09)</option>
                                        <option value="10">Oct (10)</option>
                                        <option value="11">Nov (11)</option>
                                        <option value="12">Dec (12)</option>
                                    </select>
                                    <select class="input-small">
                                        <option value="17">2017</option>
                                        <option value="18">2018</option>
                                        <option value="19">2019</option>
                                        <option value="20">2020</option>
                                        <option value="21">2021</option>
                                        <option value="22">2022</option>
                                        <option value="23">2023</option>
                                        <option value="23">2024</option>
                                        <option value="23">2025</option>
                                        <option value="23">2026</option>
                                        <option value="23">2027</option>
                                    </select>
                                </div>
                            </div>

                            <!-- CVV -->
                            <div class="form-group">
                                <label class="control-label"  for="password_confirm">Cryptogramme</label>
                                <div class="controls">
                                  <input type="password" class="form-control" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-block" id="submitBuy"><span class="glyphicon glyphicon-shopping-cart"></span> Acheter</button>
                        </form>
                    </div>
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

    <script type="text/javascript">
        function buyMod(){
            setModal();
            $("#buyModal").modal();
        }

        function setModal(){
            $("#jambedloQty").val($("#jambedlo").val());
            $("#boomrangQty").val($("#boomrang").val());
            $("#beljouninQty").val($("#beljounin").val());
            $("#soleilQty").val($("#soleil").val());
            $("#makadamQty").val($("#makadam").val());
            $("#userId").val("<?php echo $_SESSION['session']?>");
            setTotal();
        }

        function setTotal(){
            $("#total").val((1.80 * $("#jambedloQty").val()) + (3 * $("#boomrangQty").val()) + (3.80 * $("#beljouninQty").val()) + (25 * $("#soleilQty").val()) + (85 * $("#makadamQty").val()));
        }
    </script>

</body>

</html>