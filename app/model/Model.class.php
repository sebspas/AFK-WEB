<?php
	class Model {

		private $BD;

		function __construct() {
			$this->BD = new BD('user');
		}

		function recupUser($iduser) {
			$this->BD->setUsedTable('user');
			return $this->BD->select('iduser',$iduser);
		}

		function recupNews() {
			$this->BD->setUsedTable('news');
			return $this->BD->selectAll('date');
		}

		function recupEvent() {
			$this->BD->setUsedTable('event');
			return $this->BD->selectAll('date');
		}

		function recupJeux() {
			$this->BD->setUsedTable('section');
			return $this->BD->selectAll('idjeux');
		}

		function recupAuteur($idauteur) {
			$this->BD->setUsedTable('user');
			return $this->BD->select('iduser',$idauteur);
		}

		function recupNomJeu($idjeux) {
			$this->BD->setUsedTable('section');
			$res = $this->BD->select('idjeux',$idjeux);
			return $res->nom;
		}

		function isPseudoInDb($Pseudo) {
			$this->BD->setUsedTable('user');
			return $this->BD->isInDb('pseudo',$Pseudo);
		}

		function isMailInDb($Mail) {
			$this->BD->setUsedTable('user');
			return $this->BD->isInDb('mail',$Mail);
		}

		function recupAmis($iduser) {
			$this->BD->setUsedTable('amis');
			$listeAmis = array();
			$listeTemp = $this->BD->selectAmis($iduser);
			$this->BD->setUsedTable('user');
			if(!empty($listeTemp)) {
				foreach ($listeTemp as $value) {
					if (!empty($value->iduser2)) {
						$listeAmis[] = $this->BD->select('iduser',$value->iduser2);
					}
				}
			}
			return $listeAmis;
		}

		function recupJeu($idjeu) {
			$this->BD->setUsedTable('section');
			return $this->BD->select('idjeux',$idjeu);
		}
	}
?>