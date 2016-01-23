<?php
require_once(Config::$path['model'].'Messagerie.class.php');
require_once(Config::$path['model'].'writeMessage.php');

if (isset($_POST['creerMessage']) && isset($_POST['nom']) && isset($_POST['com'])) {
	addMessage($_POST['nom'], $_POST['com']);
	header('Location : index.php?page=messagerie');
}

$listeUsers = $Messagerie->recupAllUser();

require_once(Config::$path['views'].'writeMessage.php');
?>