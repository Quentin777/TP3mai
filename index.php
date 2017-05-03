<?php
// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

	$base = mysql_connect ('serveur', 'login', 'password');
	mysql_select_db ('nom_base', $base);

	// on teste si une entrée de la base contient ce couple login / pass
	$sql = 'SELECT count(*) FROM membre WHERE login="'.mysql_escape_string($_POST['login']).'" AND pass_md5="'.mysql_escape_string(md5($_POST['pass'])).'"';
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	$data = mysql_fetch_array($req);

	mysql_free_result($req);
	mysql_close();

	// si on obtient une réponse, alors l'utilisateur est un membre
	if ($data[0] == 1) {
		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: membre.php');
		exit();
	}
	// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
	elseif ($data[0] == 0) {
		$erreur = 'Compte non reconnu.';
	}
	// sinon, alors la, il y a un gros problème :)
	else {
		$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
	}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>tp3mai</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">TP3mai</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Accueil </a></li>
        <li><a href="galerie.php">Galerie</a></li>
        <li><a href="connexion.php">connexion</a></li>
        <li><a href="inscription.php">S'incrire</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
	<div class="row">
		<div class="jumbotron">
 	 		<h1>Hello, world!</h1>
 	 		<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in eros quis lorem convallis rhoncus ac a dolor. Pellentesque ultricies congue erat ut finibus. Integer in fringilla tortor. Donec hendrerit luctus velit ac pretium. Ut molestie gravida turpis, eget gravida lectus faucibus ac. Sed mollis lacus felis, id blandit ipsum convallis in. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
 	 		<p><a class="btn btn-primary btn-lg" href="page1.php" role="button">Learn more</a></p>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
  		<div class="col-sm-6 col-md-4">
   			<div class="thumbnail">
     			 <img src="http://www.parisinfo.com/var/otcp/sites/images/node_43/node_51/node_233/visuel-carrousel-dossier-ou-sortir-le-soir-a-paris-740x380-c-dr/16967596-1-fre-FR/Visuel-carrousel-dossier-Ou-sortir-le-soir-a-Paris-740x380-C-DR.jpg" alt="Responsive image">
      		<div class="caption">
        		<a href="page1.php"><h3>Thumbnail label</h3></a>
        			<p>coucou coucou coucou</p>
        			<p><a href="page1.php" class="btn btn-default" role="button">Lire</a></p>
      		</div>
    		</div>
  		</div>
	<section class="col-sm-6 col-md-4">
  			<div class="thumbnail">
     			 <img src="http://www.parisinfo.com/var/otcp/sites/images/node_43/node_51/node_233/visuel-carrousel-dossier-ou-sortir-le-soir-a-paris-740x380-c-dr/16967596-1-fre-FR/Visuel-carrousel-dossier-Ou-sortir-le-soir-a-Paris-740x380-C-DR.jpg" alt="Responsive image">
      		<div class="caption">
        		<a href="page1.php"><h3>Thumbnail label</h3></a>
        			<p>coucou coucou coucou</p>
        	<p><a href="page1.php" class="btn btn-default" role="button">Lire</a></p>
      		</div>
    		</div>
  		</section>
  	<section class="col-sm-6 col-md-4">
  			<div class="thumbnail">
     			 <img src="http://www.parisinfo.com/var/otcp/sites/images/node_43/node_51/node_233/visuel-carrousel-dossier-ou-sortir-le-soir-a-paris-740x380-c-dr/16967596-1-fre-FR/Visuel-carrousel-dossier-Ou-sortir-le-soir-a-Paris-740x380-C-DR.jpg" alt="Responsive image">
      		<div class="caption">
        		<a href="page1.php"><h3>Thumbnail label</h3></a>
        			<p>coucou coucou coucou</p>
              <p><a href="page1.php" class="btn btn-default" role="button">Lire</a></p>
      		</div>
    		</div>
  		</section>
  	<section class="col-sm-6 col-md-4">
  			<div class="thumbnail">
     			 <img src="http://www.parisinfo.com/var/otcp/sites/images/node_43/node_51/node_233/visuel-carrousel-dossier-ou-sortir-le-soir-a-paris-740x380-c-dr/16967596-1-fre-FR/Visuel-carrousel-dossier-Ou-sortir-le-soir-a-Paris-740x380-C-DR.jpg" alt="Responsive image">
      		<div class="caption">
        		<a href="page1.php"><h3>Thumbnail label</h3></a>
        			<p>coucou coucou coucou</p>
        		  <p><a href="page1.php" class="btn btn-default" role="button">Lire</a></p>
      		</div>
    		</div>
  		</section>
  		<section class="col-sm-6 col-md-4">
  			<div class="thumbnail">
     			 <img src="http://www.parisinfo.com/var/otcp/sites/images/node_43/node_51/node_233/visuel-carrousel-dossier-ou-sortir-le-soir-a-paris-740x380-c-dr/16967596-1-fre-FR/Visuel-carrousel-dossier-Ou-sortir-le-soir-a-Paris-740x380-C-DR.jpg" alt="Responsive image">
      		<div class="caption">
        		<a href="page1.php"><h3>Thumbnail label</h3></a>
        			<p>coucou coucou coucou</p>
        			<p><a href="page1.php" class="btn btn-default" role="button">Lire</a></p>
      		</div>
    		</div>
  		</section>
  		<section class="col-sm-6 col-md-4">
  			<div class="thumbnail">
     			 <img src="http://www.parisinfo.com/var/otcp/sites/images/node_43/node_51/node_233/visuel-carrousel-dossier-ou-sortir-le-soir-a-paris-740x380-c-dr/16967596-1-fre-FR/Visuel-carrousel-dossier-Ou-sortir-le-soir-a-Paris-740x380-C-DR.jpg" alt="Responsive image">
      		<div class="caption">
        		<a href="page1.php"><h3>Thumbnail label</h3></a>
        			<p>coucou coucou coucou</p>
        			<p><a href="page1.php" class="btn btn-default" role="button">Lire</a></p>
      		</div>
    		</div>
  		</section>
	</div>
</div>




</div>
</body>
</html>