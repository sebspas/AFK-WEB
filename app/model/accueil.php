<?php
	$Model = new Model();

	function recupNews($Number,$last) {
		$BD = new BD('news');
		return $BD->selectNumber('date',$last,$Number,'DESC');
	}

	function recupEvent($Number,$last) {
		$BD = new BD('event');
		return $BD->selectNumber('date',$last,$Number, 'ASC');
	}

?>