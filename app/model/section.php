<?php
	$Model = new Model();
	
	function recupUser($idevent) {
		$BD = new BD('participant');
		$listeUser = array();
		$listeIdUser = $BD->selectMult('idevent',$idevent);
		$BD->setUsedTable('user');
		foreach ($listeIdUser as $user) {
			if (!empty($user)) {
				$listeUser[] = $BD->select('iduser',$user->iduser);
			}
		}
		return $listeUser;
	}

	function recupJeu($idjeux) {
		$BD = new BD('section');
		return $BD->select('idjeux',$idjeux);
	}

	function recupNewsJeu($idjeux) {
		$BD = new BD('news');
		return $BD->selectMult('idjeux',$idjeux);
	}

	function recupEventJeu($idjeux) {
		$BD = new BD('event');
		return $BD->selectMult('idjeux',$idjeux);
	}

	function addJoueur($idjeux,$iduser) {
		$BD = new BD('joueur');
		$BD->addJoueur($idjeux,$iduser);
	}

	function recupListeJoueur($idjeux) {
		$BD = new BD('joueur');
		return $BD->selectMult('idjeux',$idjeux);
	}

	function recupNews($idNews) {
		$BD = new BD('news');
		return $BD->select('idnews', $idNews);
	}

	function recupCommentaires($Number,$last,$idnews) {
		$BD = new BD('commentaire');
		//return $BD->selectNumber('idcommentaire',$last,$Number,'ASC');
		return $BD->selectNumberWhere('idcommentaire',$last,$Number, 'idnews', $idnews, 'ASC');
	}

	function recupNbCom($idnews) {
		$BD = new BD('commentaire');
		return $BD->count('idnews',$idnews);
	}

	function addCom($texte,$idnews) {
		$BD = new BD('commentaire');
		$BD->addCom($texte,$idnews);
	}

	function removeCom($idcom) {
		$BD = new BD('commentaire');
		$BD->delete('idcommentaire',$idcom);
	}

	function recupEvent($idevent) {
		$BD = new BD('event');
		return $BD->select('idevent',$idevent);
	}

	function addParticipant($idevent) {
		$BD = new BD('participant');
		$user = $BD->selectTwoParam('iduser',$_SESSION['iduser'],'idevent',$idevent);
		if (!empty($user->iduser))
			return false;
		else {
			$BD->addParticipant($idevent,$_SESSION['iduser']);
			return true;
		}
	}

	function removeParticipant($idevent,$iduser) {
		$BD = new BD('participant');
		$BD->deleteTwoParam('iduser',$iduser,'idevent',$idevent);
	}
?>