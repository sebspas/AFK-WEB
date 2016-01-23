<?php
	$Model = new Model();
	
	function addUser($Pseudo,$Nom,$Prenom,$Sexe,$Mail,$Pass) {
		$BD = new BD('user');
		$BD->addUser($Pseudo,$Nom,$Prenom,$Sexe,$Mail,$Pass);

		$BD->update("rang",0,"pseudo",$Pseudo);

		$token = uniqid(rand(), true);
		$token = sha1($token);

		$BD->update("token",$token,"pseudo",$Pseudo);
		
		$info = "Pseudo : " . $Pseudo . "\n" . "Pour valider votre compte cliquer ici : ";
		$link = "http://www.holobox.fr/AFK/index.php?page=inscription&pseudo=" . $Pseudo . "&tok=" . $token;
		
		mail ($Mail,"AFK : Validation de votre compte !",$info . $link);
	}

	function checkToken($Pseudo, $tokens) {
		$BD = new BD('user');
		$user = $BD->select('pseudo',$Pseudo);
		if ($tokens == $user->token) {
			return true;
		}
		else {
			return false;
		}
	}

	function validUser($Pseudo) {
		$BD = new BD('user');
		$BD->update('rang',1,'pseudo',$Pseudo);
	}
?>