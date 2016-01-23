<?php
require_once(Config::$path['model'].'Model.class.php');
require_once(Config::$path['model'].'accueil.php');

/*************************************/
/*				Pagination News		 */
/*************************************/
$nextButton = true;
if (isset($_GET['numero'])) {
	$prec = $_GET['numero'] - 3;
	if ($prec < 0) $prec = 0;
	$next = $_GET['numero'] + 3;
	$listeNext = recupNews(3,$next);
	if (empty($listeNext)) {
		$nextButton = false;
	}
	$listeNews = recupNews(3,$_GET['numero']);
}
else {
	$prec = 0;
	$next = 3;
	$listeNews = recupNews(3,0);
}

/*************************************/
/*				Pagination Event	 */
/*************************************/
$nextButtonE = true;
if (isset($_GET['event'])) {
	$precE = $_GET['event'] - 3;
	if ($precE < 0) $prec = 0;
	$nextE = $_GET['event'] + 3;
	if ($precE == 0) $next = 3;
	$listeNext = recupEvent(3,$nextE);
	if (empty($listeNext)) {
		$nextButtonE = false;
	}
	$listeEvent = recupEvent(3,$_GET['event']);
}
else {
	$precE = 0;
	$nextE = 3;
	$listeEvent = recupEvent(3,0);
}

$listeJeux = $Model->recupJeux();

require_once(Config::$path['views'].'HTML.class.php');
require_once(Config::$path['views'].'accueil.php');
?>