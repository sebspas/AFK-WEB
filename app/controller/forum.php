<?php
require_once(Config::$path['model'].'Forum.class.php');
require_once(Config::$path['model'].'forum.php');

$categories = $Forum->recupCategories();
$lastTopics = $Forum->recupSujet();

require_once(Config::$path['views'].'forum.php');
?>