<div class="row">
<?php
if (isset($_SESSION['login'])) {
?>
	<div class="row">
		<div class="frame cols12 white2">
			<div class="frame-content">
				<form method="post" action="" class="center">
					<label>Nouveau Messages</label>
					<div class="field">
						<label for="nom">Destinataire</label>
						<select name="nom">
						<?php
							foreach ($listeUsers as $value) {
								if(!empty($value) && $value->iduser != $_SESSION['iduser']) {
									echo "<option value='$value->iduser'>$value->pseudo</option>";
								}
							}
						?>
						</select>
					</div>
					<div>
						<label for="com">Messages</label>
						<textarea name="com"></textarea>
					</div>
					<input type="submit" value="Poster" name="creerMessage" id="send" class="btn blue3 right">
				</form>
			</div><!-- .frame-content -->
		</div><!-- .frame -->
	</div><!-- .row -->
<?php	
}
?>
</div><!-- .row -->