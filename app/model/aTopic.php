<?php 	/* Forum-Model */

	if(empty($_GET['id']) || !is_numeric($_GET['id']))
		header('Location : index.php');

	function addRep($texte,$idnews) {
		$BD = new BD('message');
		$BD->addRep($texte, $idnews);
	}

	$Forum = new Forum();

?>