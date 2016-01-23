<div class="row" >
	<div class="cols11">
		<h2 class="title0">Liste Utilisateurs</h2>
	<?php
		foreach ($listeUser as $user) {
			HTML::User($user,$listeAmis);
		}
	?>
	</div>
</div><!-- .row -->