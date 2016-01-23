<?php
	$Model = new Model();
	
	function recupUserByNom($pseudo) {
		$BD = new BD('user');
		return $BD->select('pseudo',$pseudo);
	}

	function recupEvent($iduser) {
		$BD = new BD('participant');
		$listeIdEvent = $BD->selectMult('iduser',$iduser);
		$BD->setUsedTable('event');
		$listeEvent = array();
		foreach ($listeIdEvent as $idevent) {
			$listeEvent[] = $BD->select('idevent', $idevent->idevent);
		}
		return $listeEvent;
	}

	function recupJeuInscrit($iduser) {
		$BD = new BD('joueur');
		$listeJoueur = $BD->selectMult('iduser',$iduser);
		$listeJeux = array();
		$BD->setUsedTable('section');
		foreach ($listeJoueur as $joueur) {
			if (!empty($joueur)) {
				$listeJeux[] = $BD->select('idjeux',$joueur->idjeux);
			}
		}
		return $listeJeux;
	}

	function deleteJeu($idjeux) {
		$BD = new BD('joueur');
		$BD->deleteTwoParam('iduser',$_SESSION['iduser'],'idjeux',$idjeux);
	}

	function addAmis($idami) {
		$BD = new BD('amis');
		$BD->addAmis($_SESSION['iduser'],$idami);
	}

	function deleteAmis($idamis) {
		$BD = new BD('amis');
		$BD->deleteTwoParam('iduser1',$_SESSION['iduser'],'iduser2',$idamis);
	}
?>
