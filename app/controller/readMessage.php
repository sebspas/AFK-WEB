<?php
require_once(Config::$path['model'].'Messagerie.class.php');
require_once(Config::$path['model'].'readMessage.php');

if (isset($_POST['repMessage']) && isset($_POST['com'])) {
	addRepMessage($_POST['com'], $_GET['id']);
	header('Location : index.php?page=readMessage&id='.$_GET['id']);
}

$message = $Messagerie->infoConvers($_GET['id']);

if($message->idauteur != $_SESSION['iduser'] && $message->iddestinataire != $_SESSION['iduser']) {
	header('Location : index.php');
	exit();
}

if($message->idauteur == $_SESSION['iduser'])
	updateVueA($_GET['id']);

if($message->iddestinataire == $_SESSION['iduser'])
	updateVueD($_GET['id']);

require_once(Config::$path['views'].'readMessage.php');
?>