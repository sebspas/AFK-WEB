<?php
	$Model = new Model();
	
	function recupAllUser() {
		$BD = new BD('user');
		$listeUser = $BD->selectAllAsc('pseudo');
		$listeFinal = array();
		foreach ($listeUser as $user) {
			if (!empty($user->iduser)) {
				$listeFinal[] = $BD->select('iduser',$user->iduser);
			}
		}
		return $listeFinal;
	}

?>