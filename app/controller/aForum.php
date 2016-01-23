<?php
require_once(Config::$path['model'].'Forum.class.php');
require_once(Config::$path['model'].'aForum.php');

$sousForums = $Forum->recupSousForumOnForum($_GET['id']);
$topics = $Forum->recupTopicOnForum($_GET['id']);
$lastTopics = $Forum->recupSujetOnForumLimit($_GET['id']);

require_once(Config::$path['views'].'aForum.php');
?>