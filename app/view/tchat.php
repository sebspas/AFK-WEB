<div class="frame-content">
	<h1 class="tittle">Tchat</h1>
	<div id="messages" class="bbcode">
        <!-- les messages du tchat -->
    </div>

	<form class="form" method="POST" action="<?= Config::$path['traitement']?>tchat.php">
	    <input type="text" name="message" id="message" placeholder="Votre message ici :)"><br />
	    <input class="btn2 blue3" type="submit" name="submit" value="Envoyez votre message !" id="envoi" />
	</form>
</div>