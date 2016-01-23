<?php
require_once(Config::$path['model'].'Model.class.php');
require_once(Config::$path['model'].'profil.php');

if(!isset($_SESSION['login'])) {
	header('Location : index.php');
}

if (isset($_GET['supprimer'])) {
	deleteJeu($_GET['supprimer']);
	header('Location : index.php?page=profil');
}

if (isset($_GET['unset'])) {
	$listeAmis = $Model->recupAmis($_SESSION['iduser']);
	$isAmis = false;
	foreach ($listeAmis as $ami) {
		if ($ami->iduser == $_GET['unset']) {
			$isAmis = true;
			break;
		}
	}
	if ($isAmis) {
		deleteAmis($_GET['unset']);
		header('Location : index.php?page=profil');
	}
	else {
		echo "<div class='error' >Vous n'êtes pas amis ...</div>";
	}	
}

if (isset($_GET['ajouter'])) {
	$listeAmis = $Model->recupAmis($_SESSION['iduser']);
	$isAmis = false;
	foreach ($listeAmis as $ami) {
		if ($ami->iduser == $_GET['ajouter']) {
			$isAmis = true;
			break;
		}
	}
	if (!$isAmis) {
		addAmis($_GET['ajouter']);
		header('Location : index.php?page=profil');
	}
	else {
		echo "<div class='error' >Vous êtes déja amis ...</div>";
	}	
}


if (isset($_GET['nom'])) {
	if (!isset($_SESSION['iduser'])) {
			$_SESSION['msg'][0] = 'error';
			$_SESSION['msg'][1] = "Vous devez être connecté pour consulter un profil !";
			header('Location : index.php?page=login');
	}
	$User = recupUserByNom($_GET['nom']);
	if (empty($User)) header('Location : index.php');
	$listeAmis = $Model->recupAmis($User->iduser);
	$listeJeuxInscrit = recupJeuInscrit($User->iduser);
	$listeEvent = recupEvent($User->iduser);
}
else {
	$User = $Model->recupUser($_SESSION['iduser']);
	$listeAmis = $Model->recupAmis($_SESSION['iduser']);
	$listeJeuxInscrit = recupJeuInscrit($_SESSION['iduser']);
	$listeEvent = recupEvent($_SESSION['iduser']);
}

require_once(Config::$path['views'].'HTML.class.php');
require_once(Config::$path['views'].'profil.php');
?>