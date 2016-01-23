		<div class="row">
			<div class="cols7">
				<h2 class="title0">Actualités de <?= $jeu->nom ?></h2>
				<?php
					foreach ($listeNewsJeu as $news) {
						if (!empty($news->idnews)) {
							$auteur = $Model->recupAuteur($news->idauteur);
							HTML::NewsPreview($news,$auteur,$jeu);
						}
					}
				?>
			</div><!-- .cols7 (left) -->
			<div class="g1"></div>
			<div class="cols3">
				<h2 class="title0">Description du jeu</h2>
				<?php
					HTML::DescriptionJeu($jeu,isPlayer($listeJoueur));
				?>
			</div><!-- .cols4 (right) -->
		</div><!-- .row -->
		<div class="row">
			<h2 class="title0">Event sur <?= $jeu->nom ?></h2>
			<?php 
				$cpt = 0;
				foreach ($listeEventJeu as $event) {
					if (!empty($event)) {
						$cpt++;
						//$user = $Model->recupUser($event->idorganisateur);
						HTML::EventPreview($event,$jeu);
					}	
				}
			if ($cpt == 0) {
				echo "<div class='line'>Pas encore d'événement enregistré pour cette section...</div>";
			}	
			?>
		</div><!-- .row -->