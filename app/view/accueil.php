<!-- Vue, possibilité de mettre du php et les variable définie dans controller -->
	
		<div class="row">
			<div class="cols6">
				<h2 class="title0">Actualités</h2>
				<div id="News">
					<?php
						foreach ($listeNews as $news) {
							if (!empty($news->idnews)) {
								$Jeu = $Model->recupJeu($news->idjeux);
								$auteur = $Model->recupAuteur($news->idauteur);
								HTML::NewsPreview($news,$auteur,$Jeu);
							}
						}
					?>
				</div><!-- #News -->
				<div id="button-News" >
					<a class="btn2 blue3 left vt-top inline-block prevNews" href="index.php?page=accueil&amp;numero=<?= $prec ?>">Précédent</a>
				<?php
					if ($nextButton) {
				?>
					<a class="btn2 blue3 right vt-top inline-block nextNews" href="index.php?page=accueil&amp;numero=<?= $next ?>">Suivant</a>
				<?php
					}
				?>
				</div>
			</div><!-- .cols7 (left) -->
			<div class="g2"></div>
			<div class="cols3">
				<div class="row">
					<h2 class="title0">Events à venir</h2>
					<div id="Events">
					<?php
						foreach ($listeEvent as $event) {
							if (!empty($event)) {
								$Jeu = $Model->recupJeu($event->idjeux);
								HTML::EventPreview($event,$Jeu);
							}
						}
					?>
					</div>
					<div class="line2">
						<a class="btn2 blue3 left vt-top inline-block prevEvents" href="index.php?page=accueil&amp;event=<?= $precE ?>">Précédent</a>
					<?php
						if ($nextButtonE) {
					?>
						<a class="btn2 blue3 right vt-top inline-block nextEvents" href="index.php?page=accueil&amp;event=<?= $nextE ?>">Suivant</a>
					<?php
						}
					?>
					</div>
					
				</div><!-- .row -->
				<div class="g12"></div>
				<div class="row">
					<div class="line3">
						<h2 class="title0">Partenaires</h2>
					</div>
					<div class="line">
						<a class="btn4 black1 txt-dec-none" href="http://url.atewix.fr/a" title="PFUDOR" target="_Blank">PFUDOR</a>
					</div>
					<div class="line">
						<a class="btn4 black1 txt-dec-none" href="http://www.grafikart.fr" title="grafikart.fr" target="_Blank">Grafikart</a>
					</div>
					<div class="line">
						<a class="btn4 black1 txt-dec-none" href="http://designspartan.com/" title="designspartan.com" target="_Blank">DesignSpartan</a>
					</div>
					<div class="line">
						<a class="btn4 black1 txt-dec-none" href="http://labaixbidouille.com/" title="labaixbidouille.com" target="_Blank">Labaixbidouille</a>
					</div>
				</div><!-- .row -->
			</div><!-- .cols3 (right) -->
		</div><!-- .row -->
		<div class="row">
			<h2 class="title0">Nos Jeux</h2>
			<?php 
				$cpt = 0;
				foreach ($listeJeux as $jeux) {
					if (!empty($jeux)) {
						HTML::Jeu($jeux);
						$cpt++;
						if ($cpt % 3 != 0) {
							?>
							<div class="g1"></div>
							<?php
						}
						else {
							$cpt = 0;
						}
					}	
				}

			?>
		</div><!-- .row-->