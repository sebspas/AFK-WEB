<div class="row">
	<div class="line3 frame white2">
		<div class="line0">
			<h3 class="title00 txt-left"><?= $topic->nom; ?></h3>
		</div>
		<div class="frame-content">
			<div class="line3 bbcode">
			<?php
				echo $GLOBALS['parser']->parse($topic->message)
				->detect_links()
				->detect_emails()
				->detect_emoticons()
				->get_html();
			 ?>
			</div>
			<hr />
			<div class="line2">
				<img class="avatar" src="<?= $usertopic->avatar ?>" alt="avatar-<?= $usertopic->avatar; ?>" />
				<p class="inline-block vt-top ln35">Posté par
					<a class="txt-dec-none c-blue3" href="index.php?page=profil&amp;nom=<?= $usertopic->pseudo; ?>" title="<?= $usertopic->pseudo; ?>"><strong><?= $usertopic->pseudo; ?></strong></a>
					, le <i><?= date('d/m/y H:i', $topic->timestamp) ?></i>
				</p>
			</div>
		</div><!-- frame-content -->
	</div><!-- .frame -->
	<?php
	foreach ($listMessages as $message) {
		if (empty($message->idtopic) || empty($message->message))
			continue;

		$userMessage = $Forum->recupUser($message->iduser);
	?>
	<div class="line3 frame white2">
		<img class="avatar-com" src="<?= $userMessage->avatar ?>" alt="default">
		<div class="inline-block vt-top">
			<p class="line2">
				<a class="txt-dec-none c-black1" href="index.php?page=profil&amp;nom=<?= $userMessage->pseudo ?>"><strong><?= $userMessage->pseudo ?></strong></a>
				, le <i><?= date('d/m/y H:i', $message->timestamp); ?></i>
			</p>
			<div class="line2">
				<p><?= $message->message ?></p>
			</div>
		</div>
	</div><!-- .frame -->
	<?php
	}

	if (isset($_SESSION['login'])) {
	?>
	<div class="row">
		<div class="frame cols12 white2">
			<div class="frame-content">
				<form method="post" action="" class="center">
					<label for="comm">Répondre</label>
					<textarea name="com"></textarea>
					<input type="submit" value="Poster" name="creerRep" id="send" class="btn blue3 right">
				</form>
			</div><!-- .frame-content -->
		</div><!-- .frame -->
	</div><!-- .row -->
	<?php	
	}
	else {
		echo 'Vous devez être connecté pour poster un commentaire.';
	}
	?>
</div><!-- .row -->
