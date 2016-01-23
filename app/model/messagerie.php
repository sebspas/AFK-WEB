<?php 	/* Forum-Model */

	if(!isset($_SESSION['login']))
		header('Location : index.php');

	$Messagerie = new Messagerie();

?>