<?php
	function putOffLine($iduser) {
		$BD = new BD('user');
		$BD->update('online',0,'iduser',$iduser);
	}
?>