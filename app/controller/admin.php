<?php
require_once(Config::$path['model'].'Model.class.php');
require_once(Config::$path['model'].'admin.php');

if ($_SESSION['rang'] <= 1) {
	header('Location : index.php');
}

/******************************************************/
/*					Validation 			     		  */
/******************************************************/
/************/
/* Section  */
/************/
function checkSection() {

	if (!isset($_POST['nom']) || !preg_match('/^.{4,50}$/',$_POST['nom'])) {
		return "Pseudo invalide, il ne doit être composé que de lettres.";
	}
	if (isSectionInDb($_POST['nom'])) {
		return "Section déjà utilisé, merci d'en choisir un autre.";
	}

	if (!isset($_POST['image']) || !preg_match('/^http[s]?:\/\/[-a-zA-Z0-9_.]*\/[-a-zA-Z0-9\/_.]*\.(jp[e]?g|png|gif)$/',$_POST['image'])) {
		return "Url invalide";
	}

	$img = get_headers($_POST['image'], 1);

	if($img['Content-Length'] > 374000) {
		return "Image trop lourde... 300ko max";
	}

	return "NoError";
}

function checkSectionEdition($jeu) {

	if (!isset($_POST['nom']) || !preg_match('/^.{4,50}$/',$_POST['nom'])) {
		return "Pseudo invalide, il ne doit être composé que de lettres.";
	}
	if (isSectionInDb($_POST['nom']) && $jeu->nom != $_POST['nom']) {
		return "Section déjà utilisé, merci d'en choisir un autre.";
	}

	if (!isset($_POST['image']) || !preg_match('/^http[s]?:\/\/[-a-zA-Z0-9_.]*\/[-a-zA-Z0-9\/_.]*\.(jp[e]?g|png|gif)$/',$_POST['image'])) {
		return "Url invalide";
	}

	$img = get_headers($_POST['image'], 1);

	if($img['Content-Length'] > 374000) {
		return "Image trop lourde... 300ko max";
	}

	return "NoError";
}
/************/
/* News     */
/************/
function checkNews() {

	if (!isset($_POST['nom']) || !preg_match('/^.{4,60}$/',$_POST['nom'])) {
		return "Nom invalide, il ne doit être composé que de lettres.";
	}
	if (isNewsInDb($_POST['nom'])) {
		return "Noms déjà utilisé, merci d'en choisir un autre.";
	}
	if (!isset($_POST['image']) || !preg_match('/^http[s]?:\/\/[-a-zA-Z0-9_.]*\/[-a-zA-Z0-9\/_.]*\.(jp[e]?g|png|gif)$/',$_POST['image'])) {
		return "Url invalide";
	}
	$img = get_headers($_POST['image'], 1);
	if($img['Content-Length'] > 374000) {
		return "Image trop lourde...300ko max";
	}

	return "NoError";
}

function checkNewsEdition($news) {

	if (!isset($_POST['nom']) || !preg_match('/^.{4,60}$/',$_POST['nom'])) {
		return "Nom invalide, il ne doit être composé que de lettres.";
	}
	if (isNewsInDb($_POST['nom']) && $_POST['nom'] != $news->titre) {
		return "Noms déjà utilisé, merci d'en choisir un autre.";
	}
	if (!isset($_POST['image']) || !preg_match('/^http[s]?:\/\/[-a-zA-Z0-9_.]*\/[-a-zA-Z0-9\/_.]*\.(jp[e]?g|png|gif)$/',$_POST['image'])) {
		return "Url invalide";
	}
	$img = get_headers($_POST['image'], 1);
	if($img['Content-Length'] > 374000) {
		return "Image trop lourde...300ko max";
	}

	return "NoError";
}
/************/
/* Event    */
/************/
function checkEvent() {

	if (!isset($_POST['nom']) || !preg_match('/^.{4,60}$/',$_POST['nom'])) {
		return "Nom invalide, il ne doit être composé que de lettres.";
	}
	if (isEventInDb($_POST['nom'])) {
		return "Section déjà utilisé, merci d'en choisir un autre.";
	}
	if (!isset($_POST['type']) || !preg_match('/^[a-zA-Z0-9-_ ]{4,25}$/',$_POST['type'])) {
		return "Type invalide, il ne doit être composé que de lettres.";
	}
	if (!isset($_POST['image']) || !preg_match('/^http[s]?:\/\/[-a-zA-Z0-9_.]*\/[-a-zA-Z0-9\/_.]*\.(jp[e]?g|png|gif)$/',$_POST['image'])) {
		return "Url invalide";
	}
	$img = get_headers($_POST['image'], 1);
	if($img['Content-Length'] > 374000) {
		return "Image trop lourde...";
	}
	list($dd,$mm,$yyyy) = explode('/',$_POST['date']);
	if (!checkdate($mm,$dd,$yyyy)) {
		return "Date invalide, il doit être au format dd/mm/yyyy (ex : 22/11/1995).";
	}
	$_POST['date2'] = $dd . "/"  . $mm . "/" . $yyyy;
	$_POST['date'] = $yyyy . "/" . $mm . "/" . $dd;
	if ($yyyy < date('Y') || ($mm == date('m') && $dd < date('j'))) {
		return "Date invalide, elle doit être supérieure à la date d’aujourd’hui";
	}
	list($gg,$ii) = explode(':',$_POST['heure']);
	if (!$gg > 23 || $ii > 59) {
		return "Heure invalide, format 24:00.";
	}
	$_POST['heure'] = $gg . ":" . $ii ;

	return "NoError";
}

function checkEventEdition($event) {

	if (!isset($_POST['nom']) || !preg_match('/^.{4,60}$/',$_POST['nom'])) {
		return "Nom invalide, il ne doit être composé que de lettres.";
	}
	if (isEventInDb($_POST['nom']) && $event->nom != $_POST['nom']) {
		return "Section déjà utilisé, merci d'en choisir un autre.";
	}
	if (!isset($_POST['type']) || !preg_match('/^[a-zA-Z0-9-_ ]{4,25}$/',$_POST['type'])) {
		return "Type invalide, il ne doit être composé que de lettres.";
	}
	if (!isset($_POST['image']) || !preg_match('/^http[s]?:\/\/[-a-zA-Z0-9_.]*\/[-a-zA-Z0-9\/_.]*\.(jp[e]?g|png|gif)$/',$_POST['image'])) {
		return "Url invalide";
	}
	$img = get_headers($_POST['image'], 1);
	if($img['Content-Length'] > 374000) {
		return "Image trop lourde...";
	}
	list($dd,$mm,$yyyy) = explode('/',$_POST['date']);
	if (!checkdate($mm,$dd,$yyyy)) {
		return "Date invalide, il doit être au format dd/mm/yyyy (ex : 22/11/1995).";
	}
	$_POST['date2'] = $dd . "/"  . $mm . "/" . $yyyy;
	$_POST['date'] = $yyyy . "/" . $mm . "/" . $dd;
	if ($yyyy < date('Y') || ($mm == date('m') && $dd < date('j'))) {
		return "Date invalide, elle doit être supérieure à la date d’aujourd’hui";
	}
	list($gg,$ii) = explode(':',$_POST['heure']);
	if (!$gg > 23 || $ii > 59) {
		return "Heure invalide, format 24:00.";
	}
	$_POST['heure'] = $gg . ":" . $ii ;

	return "NoError";
}


/******************************************************/
/*					Creation 			     		  */
/******************************************************/
	$listeSection = recupSection();

	if (isset($_POST['creerSection']) && !empty($_POST['creerSection'])) {
		$error = checkSection();
		$_POST['error'] = $error;
		if ($error == "NoError") {
			echo "<div class='succes' >Section crée !!!</div>";
			creerSection($_POST['nom'],$_POST['couleur'],$_POST['image'],$_POST['desc']);
		}
		else {
			echo "<div class='error' >" . $error . "</div>";
		}
	}

	if (isset($_POST['creerNews'])) {
		$error = checkNews();
		$_POST['error'] = $error;
		if ($error == "NoError") {
			creerNews($_POST['nom'],$_POST['image'],$_POST['jeux'], $_POST['desc']);
		}
		else {
			echo "<div class='error' >" . $error . "</div>";
		}
	}

	if (isset($_POST['creerEvent']) && !empty($_POST['creerEvent'])) {
		$error = checkEvent();
		$_POST['error'] = $error;
		if ($error == "NoError") {
			creerEvent($_POST['nom'],$_POST['type'],$_POST['date'],$_POST['heure'],$_POST['localisation'],$_POST['image'],$_POST['jeux'],$_POST['desc']);
			echo "<div class='success' >Event ajoutée !</div>";
		}
		else {
			echo "<div class='error' >" . $error . "</div>";
		}
	}

/******************************************************/
/*					Edition 			     		  */
/******************************************************/
	if (isset($_GET['post'])) {
		$news = recupNews($_GET['post']);
	}

	if (isset($_POST['editerNews'])) {
		$error = checkNewsEdition($news);
		$_POST['error'] = $error;
		if ($error == "NoError") {
			updateNews($_POST['nom'],$_POST['image'],$_POST['jeux'], $_POST['desc'],$news->idnews);
			header('Location : index.php?page=admin');
		}
		else {
			echo "<div class='error' >" . $error . "</div>";
		}
	}

	if (isset($_GET['section'])) {
		$jeu = recupJeu($_GET['section']);
	}

	if (isset($_POST['editerSection'])) {
		$error = checkSectionEdition($jeu);
		$_POST['error'] = $error;
		if ($error == "NoError") {
			updateSection($_POST['nom'],$_POST['couleur'],$_POST['image'],$_POST['desc'], $jeu->idjeux);
			header('Location : index.php?page=admin');
		}
		else {
			echo "<div class='error' >" . $error . "</div>";
		}
	}

	if (isset($_GET['event'])) {
		$event = recupEvent($_GET['event']);
	}

	if (isset($_POST['editerEvent'])) {
		$error = checkEventEdition($event);
		$_POST['error'] = $error;
		if ($error == "NoError") {
			updateEvent($_POST['nom'],$_POST['type'],$_POST['date'],$_POST['heure'],$_POST['localisation'],$_POST['image'],$_POST['jeux'],$_POST['desc'], $event->idevent);
			header('Location : index.php?page=admin');
		}
		else {
			echo "<div class='error' >" . $error . "</div>";
		}
	}

/******************************************************/
/*					Suppression 			   		  */
/******************************************************/
	if(isset($_GET['supprimer'])) {
		switch ($_GET['supprimer']) {
			case 'User':
				$listeUser = recupListeUser();
				break;
			case 'News':
				$listeNews = recupListeNews();
				break;
			case 'Event':
				$listeEvent = recupListeEvent();
				break;
			default:
				break;
		}
	}

	if (isset($_GET['delete'])) {
		$User = $Model->recupUser($_GET['delete']);
		if ($_SESSION['rang'] <= $User->rang) {
			echo "<div class='error' >Suppression Impossible !</div>";
		}
		else {
			deleteUser($_GET['delete']);
			header('Location : index.php?page=admin&supprimer=User');	
		}
	}

	if (isset($_GET['deleteNews'])) {
		deleteNews($_GET['deleteNews']);
		header('Location : index.php?page=admin&supprimer=News');
	}

	if (isset($_GET['deleteEvent'])) {
		deleteEvent($_GET['deleteEvent']);
		header('Location : index.php?page=admin&supprimer=Event');
	}


/******************************************************/
/*				 Forum Gestion			     		  */
/******************************************************/
	$listeCategorie = recupCategories();
	$listeForum = recupForum();

	function checkCategorie() {
		if (isCategorieInDb($_POST['nom'])) {
			return "Categorie déjà utilisé, merci d'en choisir un autre.";
		}

		return "NoError";
	}

	if(isset($_POST['creerCat'])) {
		$error = checkCategorie();

		if ($error == "NoError") {
			addCategorie($_POST['nom']);
			echo "<div class='success' >Categorie ajoutée !</div>";
		}
		else {
			echo "<div class='error' >" . $error . "</div>";		
		}
	}

	function checkForum() {
		if (isForumInDb($_POST['nom'])) {
			return "Forum déjà utilisé, merci d'en choisir un autre.";
		}

		return "NoError";
	}

	if (isset($_POST['creerForum'])) {
		$error = checkForum();

		if ($error == "NoError") {
			addForum($_POST['nom'],$_POST['desc'],$_POST['Categorie']);
			echo "<div class='success' >Forum ajoutée !</div>";
		}
		else {
			echo "<div class='error' >" . $error . "</div>";		
		}	
	}

	function checkSousForum() {
		if (isForumInDb($_POST['nom'])) {
			return "Forum déjà utilisé, merci d'en choisir un autre.";
		}

		return "NoError";
	}

	if (isset($_POST['creerSousForum'])) {
		$error = checkSousForum();

		if ($error == "NoError") {
			addSousForum($_POST['nom'],$_POST['desc'],$_POST['Forum']);
			echo "<div class='success' >Sous Forum ajoutée !</div>";
		}
		else {
			echo "<div class='error' >" . $error . "</div>";		
		}	
	}


require_once(Config::$path['views'].'HTML.class.php');
require_once(Config::$path['views'].'PanelAdmin.class.php');
require_once(Config::$path['views'].'admin.php');
?>