<?php
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
  // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
  if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
  // on teste les deux mots de passe
  if ($_POST['pass'] != $_POST['pass_confirm']) {
    $erreur = 'Les 2 mots de passe sont différents.';
  }
  else {
    $base = mysql_connect ('localhost', 'root', '');
    mysql_select_db ('membre', $base);

    // on recherche si ce login est déjà utilisé par un autre membre
    $sql = 'SELECT count(*) FROM membre WHERE login="'.mysql_escape_string($_POST['login']).'"';
    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
    $data = mysql_fetch_array($req);

    if ($data[0] == 0) {
    $sql = 'INSERT INTO membre VALUES("", "'.mysql_escape_string($_POST['login']).'", "'.mysql_escape_string(md5($_POST['pass'])).'")';
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

    session_start();
    $_SESSION['login'] = $_POST['login'];
    header('Location: membre.php');
    exit();
    }
    else {
    $erreur = 'Un membre possède déjà ce login.';
    }
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
        <li><a href="index.php">Accueil </a></li>
        <li><a href="connexion.php">Connexion</a></li>
        <li class="active"><a href="inscription.php">S'incrire</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
  // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
  if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
  // on teste les deux mots de passe
  if ($_POST['pass'] != $_POST['pass_confirm']) {
    $erreur = 'Les 2 mots de passe sont différents.';
  }
  else {
    $base = mysql_connect ('serveur', 'login', 'password');
    mysql_select_db ('nom_base', $base);

    // on recherche si ce login est déjà utilisé par un autre membre
    $sql = 'SELECT * FROM tp3 WHERE membre="'.mysql_escape_string($_POST['username']).'"';
    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
    $data = mysql_fetch_array($req);

    if ($data[0] == 0) {
    $sql = 'INSERT INTO tp3 VALUES("", "'.mysql_escape_string($_POST['login']).'", "'.mysql_escape_string(md5($_POST['pass'])).'")';
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

    session_start();
    $_SESSION['login'] = $_POST['login'];
    header('Location: membre.php');
    exit();
    }
    else {
    $erreur = 'Un membre possède déjà ce login.';
    }
  }
  }
  else {
  $erreur = 'Au moins un des champs est vide.';
  }
}
?>
<html>
<head>
<title>Inscription</title>
</head>

<div class="row">
    <div class="col-lg-10 col-md-9">
        <h1 class="titre-contact">Inscription</h1>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">     
                    <div class="tableaudebord">
                        <div class="contact_container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <h2></h2>
                                    <div class="nb_com" style="display:none">9</div>
                                </div>
                            </div> 
                        </div>

                        <div class='container'>
                            <div class='row'>


                                
                                    <form class="form-horizontal" role="form">
                                        <div class='row'>
                                            <div class="col-lg-12">
                                                <div class="titleprghp">
                                                    <span class="prg">Remplir vos informations</span> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            
                                                <div class="col-lg-6">
                                                    <!--<form class="form-horizontal" role="form">-->
                                                    <div class="form-group">
                                                        <label for="pseudo" class="col-sm-2 control-label">Pseudo :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" lname="pseudo;" id="pseudo">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mail" class="col-sm-2 control-label">Email:</label>
                                                        <div class="col-sm-8">
                                                            <input type="email" class="form-control" name="email" id="email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password" class="col-sm-2 control-label">Password:</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" class="form-control" name="password" id="password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password" class="col-sm-2 control-label">Confirm Password:</label>
                                                        <div class="col-sm-8">
                                                            <input type="password" class="form-control" name="password" id="password">
                                                        </div>
                                                    </div>
                                                    <input class="btn btn-primary" type="submit">                                    
                                                    </form>
                                                </div>
</body>
</html>