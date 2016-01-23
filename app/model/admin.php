<?php
	$Model = new Model();
/******************************************************/
/*					Validation 			     		  */
/******************************************************/
	function isSectionInDb($section) {
		$BD = new BD('section');
		return $BD->isInDb('nom',$section);
	}

	function isNewsInDb($section) {
		$BD = new BD('news');
		return $BD->isInDb('titre',$section);
	}

	function isEventInDb($section) {
		$BD = new BD('event');
		return $BD->isInDb('nom',$section);
	}

	function recupSection() {
		$BD = new BD('section');
		return $BD->selectAll('nom');
	}

	function recupNews($idnews) {
		$BD = new BD('news');
		return $BD->select('idnews',$idnews);
	}

/******************************************************/
/*					Creation 			     		  */
/******************************************************/
	function creerSection($nom,$couleur,$image,$desc) {
		$BD = new BD('section');
		$BD->addSection($nom,$couleur,$image,$desc);
	}

	function creerNews($nom,$image,$jeux,$desc) {
		$BD = new BD('news');
		$BD->addNews($nom,$image,$jeux,$desc);
	}

	function creerEvent($nom,$type,$date,$heure,$localisation,$image,$jeux,$desc) {
		$BD = new BD('event');
		$date .= ' ' . $heure;
		$BD->addEvent($nom,$type,$date,$localisation,$image,$jeux,$desc);
	}

/******************************************************/
/*					Edition 			     		  */
/******************************************************/
	function updateNews($nom,$image,$jeux, $desc,$idnews) {
		$BD = new BD('news');
		$BD->update('titre',$nom,'idnews',$idnews);
		$BD->update('image',$image,'idnews',$idnews);
		$BD->update('idjeux',$jeux,'idnews',$idnews);
		$BD->update('text',$desc,'idnews',$idnews);						
	}

	function recupJeu($idsection) {
		$BD = new BD('section');
		return $BD->select('idjeux',$idsection);
	}

	function updateSection($nom,$couleur,$image,$desc, $idjeux) {
		$BD = new BD('section');
		$BD->update('nom',$nom,'idjeux',$idjeux);
		$BD->update('couleur',$couleur,'idjeux',$idjeux);
		$BD->update('image',$image,'idjeux',$idjeux);
		$BD->update('description',$desc,'idjeux',$idjeux);						
	}

	function recupListeUser() {
		$BD = new BD('user');
		return $BD->selectAllAsc('pseudo');
	}

	function deleteUser($iduser) {
		$BD = new BD('user');
		$BD->delete('iduser',$iduser);
	}

	function recupListeNews() {
		$BD = new BD('news');
		return $BD->selectAll('date');
	}

	function deleteNews($idnews) {
		$BD = new BD('news');
		$BD->delete('idnews',$idnews);
	}

	function recupListeEvent() {
		$BD = new BD('event');
		return $BD->selectAll('date');
	}

	function deleteEvent($idevent) {
		$BD = new BD('participant');
		$BD->delete('idevent',$idevent);
		$BD->setUsedTable('event');
		$BD->delete('idevent',$idevent);
	}

	function recupEvent($idevent) {
		$BD = new BD('event');
		return $BD->select('idevent',$idevent);
	}


	function updateEvent($nom,$type,$date, $heure,$localisation,$image,$jeux,$desc,$idevent) {
		$BD = new BD('event');
		$BD->update('nom',$nom,'idevent',$idevent);
		$BD->update('type',$type,'idevent',$idevent);
		$date .= ' ' . $heure;
		$BD->update('date',$date,'idevent',$idevent);
		$BD->update('localisation',$localisation,'idevent',$idevent);
		$BD->update('image',$image,'idevent',$idevent);
		$BD->update('idjeux',$jeux,'idevent',$idevent);
		$BD->update('event.desc',$desc,'idevent',$idevent);
	}

	/******************************************************/
	/*				 Forum Gestion			     		  */
	/******************************************************/
	function recupCategories() {
		$BD = new BD('categorie');
		return $BD->selectAllAsc("idCategorie");
	}

	function recupForum() {
		$BD = new BD('forum');
		return $BD->selectAllAsc("idForum");
	}

	function addCategorie($nom) {
		$BD = new BD('categorie');
		$BD->addCategorie($nom);
	}

	function isCategorieInDb($nom) {
		$BD = new BD('categorie');
		return $BD->isInDb('nom',$nom);
	}

	function addForum($nom, $desc, $idCategorie) {
		$BD = new BD('forum');
		$BD->addForum($nom, $desc, $idCategorie, null);
	}

	function isForumInDb($nom) {
		$BD = new BD('forum');
		return $BD->isInDb('nom',$nom);
	}

	function addSousForum($nom, $desc, $idpere) {
		$BD = new BD('forum');
		$BD->addForum($nom, $desc, null, $idpere);
	}

?>