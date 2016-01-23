<?php
require_once(Config::$path['model'].'Messagerie.class.php');
require_once(Config::$path['model'].'messagerie.php');

header('Location : index.php');

$conversations = $Messagerie->recupConversation();

require_once(Config::$path['views'].'messagerie.php');
?>