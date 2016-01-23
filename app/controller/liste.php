<?php
require_once(Config::$path['model'].'Model.class.php');
require_once(Config::$path['model'].'liste.php');

if(!isset($_SESSION['login'])) {
	$_SESSION['msg'][0] = 'error';
	$_SESSION['msg'][1] = "Vous devez être connecté pour voir la liste des inscrits !";
	header('Location : index.php?page=login');
}

$listeUser = recupAllUser();
$listeAmis = $Model->recupAmis($_SESSION['iduser']);

require_once(Config::$path['views'].'HTML.class.php');
require_once(Config::$path['views'].'liste.php');
?>