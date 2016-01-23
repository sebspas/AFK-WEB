<?php
	class Forum {

		private $BD;

		function __construct() {
			$this->BD = new BD('categorie');
		}

		function recupCategories() {
			$this->BD->setUsedTable('categorie');
			return $this->BD->selectAllAsc("idCategorie");
		}

		function recupSujet() {
			$this->BD->setUsedTable('topic');
			return $this->BD->selectNumber("idtopic", 0, 4);
		}

		function recupForumOnCat($idCategorie) {
			$this->BD->setUsedTable('forum');
			return $this->BD->selectMult("idcategorie",$idCategorie);
		}

		function countSousForumOnForum($idForum) {
			$this->BD->setUsedTable('forum');
			return $this->BD->count("idpere",$idForum);
		}

		function recupSousForumOnForum($idForum) {
			$this->BD->setUsedTable('forum');
			return $this->BD->selectMult("idpere",$idForum);
		}

		function countTopicOnForum($idForum) {
			$this->BD->setUsedTable('topic');
			return $this->BD->count("forum_idForum",$idForum);
		}

		function returnSousForumOnForum($idForum) {
			$sousForum = "";
			if($this->countSousForumOnForum($idForum) > 0) {
				$sousForum = "Sous-Forum : ";
				$sForums = $this->recupSousForumOnForum($idForum);
				foreach ($sForums as $sForum) {
					if (empty($sForum->idForum) || empty($sForum->nom))
						continue;
					$sousForum .= ' <a href="index.php?page=aForum&amp;id='.$sForum->idForum.'">'.$sForum->nom."</a>";
				}
			}
			return $sousForum;
		}

		function recupTopicOnForum($idForum) {
			$this->BD->setUsedTable('topic');
			return $this->BD->selectMult("forum_idForum", $idForum);
		}

		function countMessageOnTopic($idTopic) {
			$this->BD->setUsedTable('message');
			return $this->BD->count("idtopic", $idTopic) + 1;
		}

		function recupSujetOnForumLimit($idForum) {
			$this->BD->setUsedTable('topic');
			return $this->BD->selectNumberWhere("idtopic", 0, 4, "forum_idForum", $idForum);
		}

		function recupTopicDef($idTopic) {
			$this->BD->setUsedTable('topic');
			return $this->BD->select("idtopic", $idTopic);
		}

		function recupMessageOnTopic($idTopic) {
			$this->BD->setUsedTable('message');
			return $this->BD->selectMult("idtopic", $idTopic);
		}

		function recupUser($iduser) {
			$this->BD->setUsedTable('user');
			return $this->BD->select('iduser',$iduser);
		}
	}
?>