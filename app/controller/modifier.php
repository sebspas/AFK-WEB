<?php
require_once(Config::$path['model'].'Model.class.php');
require_once(Config::$path['model'].'modifier.php');

if(!isset($_SESSION['login'])) {
	header('Location : index.php');
}

$user = $Model->recupUser($_SESSION['iduser']);

function checkAvatar() {

	if (!isset($_POST['image']) || !preg_match('/^http[s]?:\/\/[-a-zA-Z0-9_.]*\/[-a-zA-Z0-9\/_.]*\.(jp[e]?g|png|gif)$/',$_POST['image'])) {
		return "Url invalide";
	}
	$img = get_headers($_POST['image'], 1);

	if($img['Content-Length'] > 256000) {
		return "Image trop lourde...200ko max";
	}

	return "NoError";
}
if (isset($_POST['change'])) {

	$error = checkAvatar();
	if ($error == "NoError") {

		$_SESSION['avatar'] = $_POST['image'];

		changeUrl($_SESSION['iduser'], $_POST['image']);

		header("Location : index.php?page=profil");	
	}
	else {
		echo $error;
	}
}

function checkDataUser($Model,$user) {

		if (!isset($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9-_ ]{4,25}$/',$_POST['pseudo'])) {
			return "Pseudo invalide, il ne doit être composé que de lettres.";
		}
		if ($Model->isPseudoInDb($_POST['pseudo']) && $user->pseudo != $_POST['pseudo']) {
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

		return "NoError";
}

if (isset($_POST['Modifier'])) {
	$error = checkDataUser($Model,$user);
	if ($error == "NoError") {
		updateUser($_POST['pseudo'],$_POST['nom'],$_POST['prenom'],$_POST['email']);
		header('Location : index.php?page=profil');
	}
	else {
		echo $error;
	}
}

require_once(Config::$path['views'].'HTML.class.php');
require_once(Config::$path['views'].'modifier.php');
?>