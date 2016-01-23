<?php 	/* Forum-Model */

	if(empty($_GET['id']) || !is_numeric($_GET['id']) || !isset($_SESSION['login']))
		header('Location : index.php');

	function addTopic($nom, $texte, $idforum) {
		$BD = new BD('topic');
		$BD->addTopic($nom, $texte, $idforum);
	}

	$Forum = new Forum();

?>
