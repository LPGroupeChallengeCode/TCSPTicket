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
    <div class="container wrapper" style="padding-right: 5%; padding-left: 5%;">

    	<img src="../assets/logo130.png" style="height: 100px; margin-top: 5%;">

    	<h2>Informations légales</h2>
    	<h3>1. Présentation du site.</h3>
    	<p>En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il est précisé aux utilisateurs du site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a> l'identité des différents intervenants dans le cadre de sa réalisation et de son suivi :</p>
    	<p><strong>Propriétaire</strong> : Tropic404Dev –  – 123 rue Fictive 97200 Fort-de-France<br />
    		<strong>Créateur</strong>  : <a href="www.Tropic404Dev.mq">Tropic404Dev</a><br />
    		<strong>Responsable publication</strong> : Tropic404Dev – contact.dev@tropic404.com<br />
    		Le responsable publication est une personne physique ou une personne morale.<br />
    		<strong>Webmaster</strong> : Tropic404Dev – contact.dev@tropic404.com<br />
    		<strong>Hébergeur</strong> : localhost – 123 localhost 8888<br />
    		Crédits : les mentions légales ont été générées et offertes par Subdelirium <a target="_blank" href="http://www.subdelirium.com/generateur-de-mentions-legales/" alt="rédaction des mentions légales">Générateur de mentions légales</a></p>

    		<h3>2. Conditions générales d’utilisation du site et des services proposés.</h3>
    		<p>L’utilisation du site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a> implique l’acceptation pleine et entière des conditions générales d’utilisation ci-après décrites. Ces conditions d’utilisation sont susceptibles d’être modifiées ou complétées à tout moment, les utilisateurs du site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a> sont donc invités à les consulter de manière régulière.</p>
    		<p>Ce site est normalement accessible à tout moment aux utilisateurs. Une interruption pour raison de maintenance technique peut être toutefois décidée par Tropic404Dev, qui s’efforcera alors de communiquer préalablement aux utilisateurs les dates et heures de l’intervention.</p>
    		<p>Le site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a> est mis à jour régulièrement par Tropic404Dev. De la même façon, les mentions légales peuvent être modifiées à tout moment : elles s’imposent néanmoins à l’utilisateur qui est invité à s’y référer le plus souvent possible afin d’en prendre connaissance.</p>
    		<h3>3. Description des services fournis.</h3>
    		<p>Le site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a> a pour objet de fournir une information concernant l’ensemble des activités de la société.</p>
    		<p>Tropic404Dev s’efforce de fournir sur le site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a> des informations aussi précises que possible. Toutefois, il ne pourra être tenue responsable des omissions, des inexactitudes et des carences dans la mise à jour, qu’elles soient de son fait ou du fait des tiers partenaires qui lui fournissent ces informations.</p>
    		<p>Tous les informations indiquées sur le site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a> sont données à titre indicatif, et sont susceptibles d’évoluer. Par ailleurs, les renseignements figurant sur le site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a> ne sont pas exhaustifs. Ils sont donnés sous réserve de modifications ayant été apportées depuis leur mise en ligne.</p>
    		<h3>4. Limitations contractuelles sur les données techniques.</h3>
    		<p>Le site utilise la technologie JavaScript.</p>
    		<p>Le site Internet ne pourra être tenu responsable de dommages matériels liés à l’utilisation du site. De plus, l’utilisateur du site s’engage à accéder au site en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mis-à-jour</p>
    		<h3>5. Propriété intellectuelle et contrefaçons.</h3>
    		<p>Tropic404Dev est propriétaire des droits de propriété intellectuelle ou détient les droits d’usage sur tous les éléments accessibles sur le site, notamment les textes, images, graphismes, logo, icônes, sons, logiciels.</p>
    		<p>Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de : Tropic404Dev.</p>
    		<p>Toute exploitation non autorisée du site ou de l’un quelconque des éléments qu’il contient sera considérée comme constitutive d’une contrefaçon et poursuivie conformément aux dispositions des articles L.335-2 et suivants du Code de Propriété Intellectuelle.</p>
    		<h3>6. Limitations de responsabilité.</h3>
    		<p>Tropic404Dev ne pourra être tenue responsable des dommages directs et indirects causés au matériel de l’utilisateur, lors de l’accès au site www.BilletterieTCSP.mq, et résultant soit de l’utilisation d’un matériel ne répondant pas aux spécifications indiquées au point 4, soit de l’apparition d’un bug ou d’une incompatibilité.</p>
    		<p>Tropic404Dev ne pourra également être tenue responsable des dommages indirects (tels par exemple qu’une perte de marché ou perte d’une chance) consécutifs à l’utilisation du site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a>.</p>
    		<p>Des espaces interactifs (possibilité de poser des questions dans l’espace contact) sont à la disposition des utilisateurs. Tropic404Dev se réserve le droit de supprimer, sans mise en demeure préalable, tout contenu déposé dans cet espace qui contreviendrait à la législation applicable en France, en particulier aux dispositions relatives à la protection des données. Le cas échéant, Tropic404Dev se réserve également la possibilité de mettre en cause la responsabilité civile et/ou pénale de l’utilisateur, notamment en cas de message à caractère raciste, injurieux, diffamant, ou pornographique, quel que soit le support utilisé (texte, photographie…).</p>
    		<h3>7. Gestion des données personnelles.</h3>
    		<p>En France, les données personnelles sont notamment protégées par la loi n° 78-87 du 6 janvier 1978, la loi n° 2004-801 du 6 août 2004, l'article L. 226-13 du Code pénal et la Directive Européenne du 24 octobre 1995.</p>
    		<p>A l'occasion de l'utilisation du site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a>, peuvent êtres recueillies : l'URL des liens par l'intermédiaire desquels l'utilisateur a accédé au site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a>, le fournisseur d'accès de l'utilisateur, l'adresse de protocole Internet (IP) de l'utilisateur.</p>
    		<p> En tout état de cause Tropic404Dev ne collecte des informations personnelles relatives à l'utilisateur que pour le besoin de certains services proposés par le site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a>. L'utilisateur fournit ces informations en toute connaissance de cause, notamment lorsqu'il procède par lui-même à leur saisie. Il est alors précisé à l'utilisateur du site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a> l’obligation ou non de fournir ces informations.</p>
    		<p>Conformément aux dispositions des articles 38 et suivants de la loi 78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés, tout utilisateur dispose d’un droit d’accès, de rectification et d’opposition aux données personnelles le concernant, en effectuant sa demande écrite et signée, accompagnée d’une copie du titre d’identité avec signature du titulaire de la pièce, en précisant l’adresse à laquelle la réponse doit être envoyée.</p>
    		<p>Aucune information personnelle de l'utilisateur du site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a> n'est publiée à l'insu de l'utilisateur, échangée, transférée, cédée ou vendue sur un support quelconque à des tiers. Seule l'hypothèse du rachat de Tropic404Dev et de ses droits permettrait la transmission des dites informations à l'éventuel acquéreur qui serait à son tour tenu de la même obligation de conservation et de modification des données vis à vis de l'utilisateur du site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a>.</p>
    		<p>Le site susnommé est déclaré à la CNIL sous le numéro 000123000.</p>
    		<p>Les bases de données sont protégées par les dispositions de la loi du 1er juillet 1998 transposant la directive 96/9 du 11 mars 1996 relative à la protection juridique des bases de données.</p>
    		<h3>8. Liens hypertextes et cookies.</h3>
    		<p>Le site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a> contient un certain nombre de liens hypertextes vers d’autres sites, mis en place avec l’autorisation de Tropic404Dev. Cependant, Tropic404Dev n’a pas la possibilité de vérifier le contenu des sites ainsi visités, et n’assumera en conséquence aucune responsabilité de ce fait.</p>
    		<p>La navigation sur le site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a> est susceptible de provoquer l’installation de cookie(s) sur l’ordinateur de l’utilisateur. Un cookie est un fichier de petite taille, qui ne permet pas l’identification de l’utilisateur, mais qui enregistre des informations relatives à la navigation d’un ordinateur sur un site. Les données ainsi obtenues visent à faciliter la navigation ultérieure sur le site, et ont également vocation à permettre diverses mesures de fréquentation.</p>
    		<p>Le refus d’installation d’un cookie peut entraîner l’impossibilité d’accéder à certains services. L’utilisateur peut toutefois configurer son ordinateur de la manière suivante, pour refuser l’installation des cookies :</p>
    		<p>Sous Internet Explorer : onglet outil (pictogramme en forme de rouage en haut a droite) / options internet. Cliquez sur Confidentialité et choisissez Bloquer tous les cookies. Validez sur Ok.</p>
    		<p>Sous Firefox : en haut de la fenêtre du navigateur, cliquez sur le bouton Firefox, puis aller dans l'onglet Options. Cliquer sur l'onglet Vie privée.
    			Paramétrez les Règles de conservation sur :  utiliser les paramètres personnalisés pour l'historique. Enfin décochez-la pour  désactiver les cookies.</p>
    			<p>Sous Safari : Cliquez en haut à droite du navigateur sur le pictogramme de menu (symbolisé par un rouage). Sélectionnez Paramètres. Cliquez sur Afficher les paramètres avancés. Dans la section "Confidentialité", cliquez sur Paramètres de contenu. Dans la section "Cookies", vous pouvez bloquer les cookies.</p>
    			<p>Sous Chrome : Cliquez en haut à droite du navigateur sur le pictogramme de menu (symbolisé par trois lignes horizontales). Sélectionnez Paramètres. Cliquez sur Afficher les paramètres avancés. Dans la section "Confidentialité", cliquez sur préférences.  Dans l'onglet "Confidentialité", vous pouvez bloquer les cookies.</p>

    			<h3>9. Droit applicable et attribution de juridiction.</h3>
    			<p>Tout litige en relation avec l’utilisation du site <a href="http://www.BilletterieTCSP.mq/" title="Tropic404Dev - www.BilletterieTCSP.mq">www.BilletterieTCSP.mq</a> est soumis au droit français. Il est fait attribution exclusive de juridiction aux tribunaux compétents de Paris.</p>
    			<h3>10. Les principales lois concernées.</h3>
    			<p>Loi n° 78-17 du 6 janvier 1978, notamment modifiée par la loi n° 2004-801 du 6 août 2004 relative à l'informatique, aux fichiers et aux libertés.</p>
    			<p> Loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique.</p>
    			<h3>11. Lexique.</h3>
    			<p>Utilisateur : Internaute se connectant, utilisant le site susnommé.</p>
    			<p>Informations personnelles : « les informations qui permettent, sous quelque forme que ce soit, directement ou non, l'identification des personnes physiques auxquelles elles s'appliquent » (article 4 de la loi n° 78-17 du 6 janvier 1978).</p>

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