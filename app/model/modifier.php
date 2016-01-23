<?php
	$Model = new Model();
	
	function changeUrl($id,$url) {
		$BD = new BD('user');
		$BD->update('avatar',$url,'iduser',$id);
	}

	function updateUser($pseudo,$nom,$prenom,$email) {
		$BD = new BD('user');
		$BD->update('pseudo',$pseudo,'iduser',$_SESSION['iduser']);
		$BD->update('nom',$nom,'iduser',$_SESSION['iduser']);
		$BD->update('prenom',$prenom,'iduser',$_SESSION['iduser']);
		$BD->update('mail',$email,'iduser',$_SESSION['iduser']);
	}

?>