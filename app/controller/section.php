<?php
require_once(Config::$path['model'].'Model.class.php');
require_once(Config::$path['model'].'section.php');

if (isset($_GET['unset'])) {
	removeCom($_GET['unset']);
	header('Location : index.php?page=section&jeu=' . $jeu->nom . '&post=' . $_GET['post']);
}

if(isset($_GET['post'])) {
	$news = recupNews($_GET['post']);
	$nomJeu = $Model->recupNomJeu($news->idjeux);
	$auteur = $Model->recupAuteur($news->idauteur);
	$nbCom = recupNbCom($news->idnews);
}
else if(isset($_GET['jeu'])) {
	if(isset($_GET['id'])) {
		if (!isset($_SESSION['iduser'])) {
			$_SESSION['msg'][0] = 'error';
			$_SESSION['msg'][1] = "Vous devez être connecté pour acceder à cette page !";
			header('Location : index.php?page=login');
		}
		$event = recupEvent($_GET['id']);
		$auteur = $Model->recupAuteur($event->idorganisateur);
		$nomJeu = $Model->recupNomJeu($event->idjeux);
		$listeParticipant = recupUser($event->idevent);
	}
	else {
		$jeu = recupJeu($_GET['jeu']);

		$listeJoueur = recupListeJoueur($jeu->idjeux);

		$listeNewsJeu = recupNewsJeu($jeu->idjeux);

		$listeEventJeu = recupEventJeu($jeu->idjeux);
	}
}
else {
	header("Location : index.php");
}	

function isPlayer($listeJoueur) {
	if (isset($_SESSION['iduser']) && !empty($listeJoueur)) {
		foreach ($listeJoueur as $joueur) {
			if (!empty($joueur) && $joueur->iduser == $_SESSION['iduser']) return true; 
		}
	}
	return false;
}

if (isset($_GET['post'])) {
	if (isset($_GET['numero'])) {
		$prec = $_GET['numero'] - 5;
	if ($prec < 0) $prec = 0;
		$next = $_GET['numero'];
	if ($prec == 0) $next = 5;
		$commentaires = recupCommentaires(5,$_GET['numero'],$news->idnews);
	}
	else {
		$prec = 0;
		$next = 3;
		$commentaires = recupCommentaires(5,0,$news->idnews);
	}
}

if (isset($_GET['rejoindre'])) {
	if (!isset($_SESSION['iduser'])) {
		$_SESSION['msg'][0] = 'error';
		$_SESSION['msg'][1] = "Vous devez être connecté pour rejoindre une section !";
		header('Location : index.php?page=login');
	}
	addJoueur($jeu->idjeux,$_SESSION['iduser']);
	header('Location : index.php?page=section&jeu=' . $jeu->idjeux);
}

if (isset($_GET['participer'])){
	if (!addParticipant($_GET['id']))
		echo '<div class=error>Vous etes déjà inscrit !</div>';
	else
		header('Location : index.php?page=section&jeu=' . $jeu->idjeux . '&id=' . $_GET['id']);
}

if (isset($_POST['creerCom'])) {
	addCom($_POST['com'], $news->idnews);
	header('Location : index.php?page=section&jeu=' . $jeu->idjeux . '&post=' . $_GET['post']);
}

if (isset($_GET['delete'])) {
	removeParticipant($event->idevent,$_GET['delete']);
	header('Location : index.php?page=section&jeu=' . $jeu->idjeux . '&id=' . $_GET['id']);	
}

require_once(Config::$path['views'].'HTML.class.php');
if (isset($_GET['post']))
	require_once(Config::$path['views'].'news.php');
else if (isset($_GET['id']))
	require_once(Config::$path['views'].'event.php');
else
	require_once(Config::$path['views'].'section.php');
?>