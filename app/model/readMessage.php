<?php 	/* Forum-Model */

	if(!isset($_SESSION['login']))
		header('Location : index.php');

	$Messagerie = new Messagerie();

	function updateVueA($id) {
		$BD = new BD('messagerie');
		$BD->update("luAuteur", 0, "idmessage", $id);
	}

	function updateVueD($id) {
		$BD = new BD('messagerie');
		$BD->update("luDestinataire", 0, "idmessage", $id);
	}

	function addRepMessage($com, $id) {
		$Messagerie = new Messagerie();
		$BD = new BD('messagerie');
		$BD->update("luAuteur", 1, "idmessage", $id);
		$BD->update("luDestinataire", 1, "idmessage", $id);
		$BD->update("timestamp", time(), "idmessage", $id);

		$userMessage = $Messagerie->recupUser($_SESSION['iduser']);
		$message = $Messagerie->infoConvers($_GET['id']);


		$msg = '<div class="line3 frame white2">
			<img class="avatar-com" src="'.$userMessage->avatar.'" alt="default">
			<div class="inline-block vt-top">
				<p class="line2">
					<a class="txt-dec-none c-black1" href="index.php?page=profil&amp;nom='.$userMessage->pseudo.'"><strong>'.$userMessage->pseudo.'</strong></a>
					, le <i>'.date('d/m/y H:i', time()).'</i>
				</p>
				<div class="line2">
					<p>'.$com.'</p>
				</div>
			</div>
		</div><!-- .frame -->';

		$fp = fopen (Config::$path['messagerie'].$message->link.$message->idauteur.$message->iddestinataire.'.msg', "r+");

		$contenu_message = '';
		while (($buffer = fgets($fp, 4096)) !== false) {
	        $contenu_message .= $buffer;
	    }
		fwrite($fp, $msg);

		fclose ($fp);
	}

?>