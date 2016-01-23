<div class="row">
	<div class="frame frame2 cols2  white2 " >
		<!-- <h2 class="title0">Mon Profil</h2> -->
		<div class="hb">
			<div class="hb-title blue3"><h3 class="title2 c-white txt-center"><?= $User->pseudo ?></h3></div>
		</div>
		<div class="row">
			<img class="tt" src="<?php echo $User->avatar ?>" alt="avatar" />
		</div><!-- .row -->
		<div class="white2">
			<div class="line">
				<p>Nom : <?= $User->nom ?></p>
			</div>
			<div class="line">
				<p>Prenom : <?= $User->prenom ?></p>
			</div>
			<div class="line">
				<p>Sexe : <?= $User->sexe ?></p>
			</div>
			<div class="line">
				<p>Rang : <?php if ($User->rang == 0) echo 'Nouveau'; else if ($User->rang == 1) echo 'Membre'; else if ($User->rang == 2) echo 'Modérateur'; else echo 'Admin'; ?></p>
			</div>
			<?php
				if ($_SESSION['iduser'] == $User->iduser) {
			?>
			<div class="line0">
				<a class="btn4 black1" href="index.php?page=modifier&amp;type=profil">Modifier</a>
			</div>
			<?php
				}
			?>
		</div><!-- .row -->

	</div><!-- .frame -->
	<div class="g1"></div>
	<div class="cols8" >
		<h2 class="title0">Jeux suivis</h2>
		<?php 
			if (!empty($listeJeuxInscrit)) {
				$cpt = 0;
				foreach ($listeJeuxInscrit as $jeux) {
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
			}
			else {
				echo "Aucun jeux suivis pour le moment ...";
			}
		?>
	</div>
</div><!-- .row -->
<div class="row">
	<div class="cols7" >
		<h2 class="title0">Liste Amis</h2>
		<?php
			if (!empty($listeAmis)) {
				foreach ($listeAmis as $amis) {
					HTML::UserProfil($amis,$User);
				}
			}
			else {
				echo "<div class='line'> Vous n'avez pas d'amis :) </div>";
			}	

			if ($_SESSION['iduser'] == $User->iduser) {
		?>
		<div class="line2">
			<a class="btn2 black1 center" href="index.php?page=liste">Ajouter des amis</a>
		</div>
		<?php
			}
		?>
	</div>
</div><!-- .row -->