<?php
if (isset($_SESSION['login'])) {
?>
<div class="row">
	<?php
	$fp = fopen (Config::$path['messagerie'].$message->link.$message->idauteur.$message->iddestinataire.'.msg', "r");

	$contenu_message = '';
	while (($buffer = fgets($fp, 4096)) !== false) {
        $contenu_message .= $buffer;
    }
	fclose ($fp);
	echo $contenu_message;
	
	?>
	<div class="row">
		<div class="frame cols12 white2">
			<div class="frame-content">
				<form method="post" action="" class="center">
					<label for="comm">Répondre</label>
					<textarea name="com"></textarea>
					<input type="submit" value="Poster" name="repMessage" id="send" class="btn blue3 right">
				</form>
			</div><!-- .frame-content -->
		</div><!-- .frame -->
	</div><!-- .row -->
</div><!-- .row -->
<?php	
}
?>