<?php
require_once(Config::$path['model'].'Forum.class.php');
require_once(Config::$path['model'].'addTopic.php');

if (isset($_POST['creerTopic']) && isset($_POST['nom']) && isset($_POST['com'])) {
	addTopic($_POST['nom'], $_POST['com'], $_GET['id']);
	header('Location : index.php?page=aForum&id='.$_GET['id']);
}

require_once(Config::$path['views'].'addTopic.php');
?>