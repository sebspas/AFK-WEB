<div class="row">
<?php
if (isset($_SESSION['login'])) {
?>
	<div class="row">
		<div class="frame cols12 white2">
			<div class="frame-content">
				<form method="post" action="" class="center">
					<label>Nouveau Topic</label>
					<div class="field">
						<label for="nom" class="field-label">Titre Topic</label>
						<input type="text" name="nom" id="nom" class="field-input">
					</div>
					<div>
						<label for="com">Messages</label>
						<textarea class="editme" name="com"></textarea>
					</div>
					<input type="submit" value="Poster" name="creerTopic" id="send" class="btn blue3 right">
				</form>
			</div><!-- .frame-content -->
		</div><!-- .frame -->
	</div><!-- .row -->
<?php	
}
else {
	echo 'Vous devez être connecté pour créer un Topic.';
}
?>
</div><!-- .row -->
