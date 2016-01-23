<?php

if(isset($_SESSION['login'])) {
	header('Location : index.php');
	exit();
}

require_once(Config::$path['model'].'login.php');

if (isset($_POST['login'])) {
	$BD = new BD('user');
	if (($BD->isInDb("pseudo",$_POST['pseudo'])) && (($User = $BD->select("pseudo",$_POST['pseudo'])) && $User->pass == sha1($_POST['password'])) && $User->rang != 0) {
		$BD->update("online",1,"pseudo",$_POST['pseudo']);
		$iduser = $BD->select("pseudo",$_POST['pseudo']);
		$_SESSION['rang'] = $iduser->rang;
		$_SESSION['iduser'] = $iduser->iduser;
		$_SESSION['avatar'] = $iduser->avatar;
		$_SESSION['pseudo'] = htmlentities($_POST['pseudo']);
		$_SESSION['login'] = 'ok';
		$_SESSION['msg'][0] = 'success';
		$_SESSION['msg'][1] = "Vous êtes connecté !";
		header('Location: index.php');
	}
	else 
		echo "<div class='error'>Echec de connexion !!! </div>";
}

require_once(Config::$path['views'].'login.php');
?>