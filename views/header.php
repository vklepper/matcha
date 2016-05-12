<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>Matcha</title>
    <link href="<?= $this->base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= $this->base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->base_url();?>assets/img/favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Seaweed+Script' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="page">
    <div class="bloc-principal">
        <div class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a  href="<?= $this->base_url();?>welcome/index"><img src="<?= $this->base_url();?>assets/img/logo.png" alt="Icone du menu" id="logo"></a>
                </div>
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="nav navbar-nav">
                        <li><a href="<?= $this->base_url();?>welcome/index">Accueil</a></li>
                        <?php if(!isset($_SESSION['user']['id'])){ ?>
                            <li>
                                <a href="<?= $this->base_url();?>security/connexion">Connexion</a>
                            </li>
                        <?php }
                        else { ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <?php echo $_SESSION['user']['prenom']." ".$_SESSION['user']['nom']; ?>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">- Voir mon profil</a></li>
                                    <li><a href="#">- Me déconnecter</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                    <form method="post" action="" class="navbar-form navbar-right">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" id="search" placeholder="Recherche" onkeyup="" autocomplete="off">
                        <div id="suggestions">
                            <div id="autosuggestionslist">
                            </div>
                        </div>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">Go !</button>
                        </span>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if(isset($info)){
            echo "<p>".$info."</p>";
        } ?>
        <div class="container">