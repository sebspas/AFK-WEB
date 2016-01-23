<?php 	/* Forum-Model */

	if(!isset($_SESSION['login']))
		header('Location : index.php');

	$Messagerie = new Messagerie();

	function addMessage($nom, $texte) {
		$Messagerie = new Messagerie();

		$file = time();
		echo $file;
		$BD = new BD('topic');
		$BD->addMessage($nom, $file);
		$file .= $_SESSION['iduser'].$nom.'.msg';

		$userMessage = $Messagerie->recupUser($_SESSION['iduser']);

		$message = '<div class="line3 frame white2">
			<img class="avatar-com" src="'.$userMessage->avatar.'" alt="default">
			<div class="inline-block vt-top">
				<p class="line2">
					<a class="txt-dec-none c-black1" href="index.php?page=profil&amp;nom='.$userMessage->pseudo.'"><strong>'.$userMessage->pseudo.'</strong></a>
					, le <i>'.date('d/m/y H:i', time()).'</i>
				</p>
				<div class="line2">
					<p>'.$texte.'</p>
				</div>
			</div>
		</div><!-- .frame -->';

		$fp=fopen(Config::$path['messagerie'].$file, "w");
		fwrite($fp, $message);
	}

?>