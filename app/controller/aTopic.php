<?php
require_once(Config::$path['model'].'Forum.class.php');
require_once(Config::$path['model'].'aTopic.php');

if (isset($_POST['creerRep']) && isset($_POST['com'])) {
	addRep($_POST['com'], $_GET['id']);
}

$topic = $Forum->recupTopicDef($_GET['id']);
$usertopic = $Forum->recupUser($topic->iduser);
$listMessages = $Forum->recupMessageOnTopic($_GET['id']);

require_once(Config::$path['views'].'aTopic.php');
?>