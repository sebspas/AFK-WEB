<?php
	class Messagerie {

		private $BD;

		function __construct() {
			$this->BD = new BD('messagerie');
		}

		function recupConversation() {
			$this->BD->setUsedTable('messagerie');
			return $this->BD->selectAllWithInfo("idauteur", $_SESSION['iduser'], "iddestinataire", $_SESSION['iduser'], "timestamp");
		}

		function recupUser($iduser) {
			$this->BD->setUsedTable('user');
			return $this->BD->select('iduser',$iduser);
		}

		function recupAllUser() {
			$this->BD->setUsedTable('user');
			return $this->BD->selectAllAsc("pseudo");
		}

		function infoConvers($id) {
			$this->BD->setUsedTable('messagerie');
			return $this->BD->select("idmessage", $id);
		}
	}
?>