<?php
	HTML::News($news,$auteur,$nomJeu);
?>
<div class="row">
	<h2 class="title0"><strong class="c-blue3"><?= $nbCom ?></strong> Commentaire(s)</h2>
	
	<?php HTML::PostACom(); ?>
	
	<? 
	foreach ($commentaires as $commentaire) {
		if (!empty($commentaire)) {
			$auteur = $Model->recupAuteur($commentaire->iduser);
			HTML::NewsCom($commentaire,$auteur); 
		}
	}

	?>
	<div class="line3">
		<a class="btn2 blue3 left vt-top inline-block" href="index.php?page=section&amp;jeu=<?= $_GET['jeu'] ?>&amp;numero=<?= $prec?>&amp;post=<?= $_GET['post'] ?>">Précédent</a>
		<a class="btn2 blue3 right vt-top inline-block" href="index.php?page=section&amp;jeu=<?= $_GET['jeu'] ?>&amp;numero=<?= $next?>&amp;post=<?= $_GET['post'] ?>">Suivant</a>
	</div>
</div><!-- .row -->