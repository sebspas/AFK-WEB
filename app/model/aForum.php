<?php 	/* Forum-Model */

	if(empty($_GET['id']) || !is_numeric($_GET['id']))
		header('Location : index.php');

	$Forum = new Forum();

?>