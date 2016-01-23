<?php

if(isset($_SESSION['login'])) {
	header('Location : index.php');
	exit();
}

require_once(Config::$path['model'].'Model.class.php');
require_once(Config::$path['model'].'inscription.php');

function checkDataUser($Model) {

		if (!isset($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9-_ ]{4,25}$/',$_POST['pseudo'])) {
			return "Pseudo invalide, il ne doit être composé que de lettres.";
		}
		if ($Model->isPseudoInDb($_POST['pseudo'])) {
			return "Pseudo déjà utilisé, merci d'en choisir un autre.";
		}
		if (!isset($_POST['nom']) || !preg_match('/^[a-zA-Z- ]{4,25}$/',$_POST['nom'])) {
			return "Nom invalide, il ne doit être composé que de lettres.";
		}
		if (!isset($_POST['prenom']) || !preg_match('/^[a-zA-Z- ]{4,25}$/',$_POST['prenom'])) {
			return "Prenom invalide, il ne doit être composé que de lettres.";
		}
		if (!isset($_POST['email']) || !preg_match('/^[a-zA-Z][-a-zA-Z0-9_]*@[a-zA-Z]*\.[a-z]{2,5}$/',$_POST['email'])) {
			return "Email invalide, merci de rentrer un mail valide de l'amu !";
		}
		if (!isset($_POST['email2']) || $_POST['email'] != $_POST['email2']) {
			return "Les deux emails ne correspondent pas.";
		}
		if ($Model->isMailInDb($_POST['email'])) {
			return "Email déjà utilisé !";
		}

		if (!isset($_POST['password']) || !preg_match('/^[a-zA-Z.-_*^!:;,&]{6,25}$/',$_POST['password'])) {
			return "Mot de passe invalide, il doit être composé de 6 à 25 caractères.";
		}
		if (!isset($_POST['password2']) || $_POST['password'] != $_POST['password2']) {
			return "Les deux mot de passe doivent être identique.";
		}

		return "NoError";
}

if (isset($_POST['send'])) {
	$error = checkDataUser($Model);
	if ($error == "NoError") {
		addUser($_POST['pseudo'],$_POST['nom'],$_POST['prenom'],$_POST['sexe'],$_POST['email'],$_POST['password']);
		$_SESSION['msg'][0] = 'success';
		$_SESSION['msg'][1] = "Vous devez validez votre compte via l'email qui vous à était envoyé !";
		header('Location: index.php?page=login');

	}
	else {
		echo "<div class='error' >" . $error  . "</div>";
	}
}

if (isset($_GET['pseudo']) & isset($_GET['tok'])) {
	if (checkToken($_GET['pseudo'],$_GET['tok'])) {
		validUser($_GET['pseudo']);
		$_SESSION['msg'][0] = 'success';
		$_SESSION['msg'][1] = "Vous êtes maintenant inscrit !";
		header('Location : index.php?page=login');
	}
	else {
		echo "<div class='error' >Validation du compte impossible...</div>";
	}
}

require_once(Config::$path['views'].'HTML.class.php');
require_once(Config::$path['views'].'inscription.php');
?>