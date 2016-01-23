<?php
	class PanelAdmin {
		/******************************************************/
		/*					Creation 						  */
		/******************************************************/
		public static function CreerSection() {
		?>
		<div class="cols7">
			<h2 class="title0" >Créer Section</h2>
			<form method="post"  class="center">
				<div class="field">
					<label for="nom" class="field-label">Nom Section</label>
					<input type="text" name="nom" id="nom" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['nom'])) echo "value=$_POST[nom]" ?>>
				</div>
				<div class="field">
					<label for="image" class="field-label">Url de l'image</label>
					<input type="text" name="image" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['image'])) echo "value=$_POST[image]" ?>>
				</div>
				<select name="couleur">
					<option value="blue2">Bleu</option>
					<option value="red2">Rouge</option>
					<option value="green2">Vert</option>
					<option value="cyan2">Cyan</option>
					<option value="yellow2">Jaune</option>
				</select>

				<textarea class="editme" name="desc" placeholder="Description..." ><?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['desc'])) echo "$_POST[desc]" ?></textarea>
				<div class="line2">
					<input class="btn blue3 center" type="submit" value="Créer Section" name="creerSection" >
				</div>
			</form>
		</div>
		<?php
		}

		public static function CreerNews($listeSection) {
		?>
		<div class="cols7">
			<h2 class="title0" >Créer News</h2>
			<form method="post"  class="center">
				<div class="field">
					<label for="nom" class="field-label">Titre</label>
					<input type="text" name="nom" id="nom" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['nom'])) echo "value=$_POST[nom]" ?>>
				</div>
				<div class="field">
					<label for="image" class="field-label">Url de l'image</label>
					<input type="text" name="image" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['image'])) echo "value=$_POST[image]" ?>>
				</div>
				<select name="jeux">
				<?php
					foreach ($listeSection as $value) {
						if(!empty($value->idjeux)) {
							echo "<option value='$value->idjeux'>$value->nom</option>";
						}
					}
				?>
				</select>
				<textarea class="editme" name="desc" placeholder="Texte de la News" ><?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['desc'])) echo "$_POST[desc]" ?></textarea>
				<div class="line2">
					<input class="btn blue3 center" type="submit" value="CréerNews" name="creerNews" >
				</div>
			</form>
		</div>
		<?php
		}

		public static function CreerEvent($listeSection) {
		?>
		<div class="cols7">
			<h2 class="title0" >Créer Evénement</h2>
			<form method="post"  class="center">
				<div class="field">
					<label for="nom" class="field-label">Titre</label>
					<input type="text" name="nom" id="nom" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['nom'])) echo "value=$_POST[nom]" ?>>
				</div>
				<div class="field">
					<label for="type" class="field-label">Type</label>
					<input type="text" name="type" id="prenom" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['type'])) echo "value=$_POST[type]" ?>>
				</div>
				<div class="field">
					<label for="date" class="field-label">Jour/Mois/Annee</label>
					<input type="text" name="date" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['date'])) echo "value=$_POST[date]" ?>>
				</div>
				<div class="field">
					<label for="date" class="field-label">Heure:Minute</label>
					<input type="text" name="heure" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['heure'])) echo "value=$_POST[heure]" ?>>
				</div>
				<div class="field">
					<label for="localisation" class="field-label">Localisation</label>
					<input type="text" name="localisation" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['localisation'])) echo "value=$_POST[localisation]" ?>>
				</div>
				<div class="field">
					<label for="image" class="field-label">Url de l'image</label>
					<input type="text" name="image" class="field-input">
				</div>
				<select name="jeux">
				<?php
					foreach ($listeSection as $value) {
						if(!empty($value->idjeux)) {
							echo "<option value='$value->idjeux'>$value->nom</option>";
						}
					}
				?>
				</select>
				<textarea class="editme" name="desc" placeholder="Texte de la News" ><?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['desc'])) echo "$_POST[desc]" ?></textarea>
				<div class="line2">
					<input class="btn blue3 center" type="submit" value="Créer Event" name="creerEvent" >
				</div>
			</form>
		</div>
		<?php
		}

		public static function CreerCategorie() {
		?>
		<div class="cols7">
			<h2 class="title0" >Créer Categorie</h2>
			<form method="post"  class="center">
				<div class="field">
					<label for="nom" class="field-label">Nom Categorie</label>
					<input type="text" name="nom" id="nom" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['nom'])) echo "value=$_POST[nom]" ?>>
				</div>
				<div class="line2">
					<input class="btn blue3 center" type="submit" value="Créer Categorie" name="creerCat" >
				</div>
			</form>
		</div>
		<?php
		}

		public static function CreerForum($listeCategorie) {
		?>
		<div class="cols7">
			<h2 class="title0" >Créer Forum</h2>
			<form method="post"  class="center">
				<div class="field">
					<label for="nom" class="field-label">Nom Forum</label>
					<input type="text" name="nom" id="nom" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['nom'])) echo "value=$_POST[nom]" ?>>
				</div>
				<select name="Categorie">
				<?php
					foreach ($listeCategorie as $value) {
						if(!empty($value)) {
							echo "<option value='$value->idCategorie'>$value->nom</option>";
						}
					}
				?>
				</select>
				<textarea class="editme" name="desc" placeholder="Description..." ><?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['desc'])) echo "$_POST[desc]" ?></textarea>
				<div class="line2">
					<input class="btn blue3 center" type="submit" value="Créer Forum" name="creerForum" >
				</div>
			</form>
		</div>
		<?php
		}

		public static function CreerSousForum($listeForum) {
		?>
		<div class="cols7">
			<h2 class="title0" >Créer Sous Forum</h2>
			<form method="post"  class="center">
				<div class="field">
					<label for="nom" class="field-label">Nom Sous Forum</label>
					<input type="text" name="nom" id="nom" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['nom'])) echo "value=$_POST[nom]" ?>>
				</div>
				<select name="Forum">
				<?php
					foreach ($listeForum as $value) {
						if(!empty($value)) {
							echo "<option value='$value->idForum'>$value->nom</option>";
						}
					}
				?>
				</select>
				<textarea class="editme" name="desc" placeholder="Description..." ><?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['desc'])) echo "$_POST[desc]" ?></textarea>
				<div class="line2">
					<input class="btn blue3 center" type="submit" value="Créer Sous Forum" name="creerSousForum" >
				</div>
			</form>
		</div>
		<?php
		}
		/******************************************************/
		/*					Suppression 					  */
		/******************************************************/
		public static function SupprimerUser($listeUser) {
		?>
		<div class="cols7">
			<h2 class="title0" >Supprimer Utilisateur</h2>
			<?php
			foreach ($listeUser as $user) {
				if (!empty($user))
					HTML::UserDelete($user);
			}
			?>
		</div>
		<?php
		}

		public static function SupprimerNews($listeNews) {
		?>
		<div class="cols7">
			<h2 class="title0" >Supprimer News</h2>
			<?php
			foreach ($listeNews as $news) {
				if (!empty($news)) {?>
						<div class="line">
							<h3 class="title1 inline-block max-width200"><?= $news->titre?></h3>
							<i class="tab inline-block max-width200">Le <?= $news->date ?></i>
							<div class="g1"></div>
							<div class="inline-block max-width200">
								<a class="btn2 blue3 inline-block " href="index.php?page=admin&amp;post=<?= $news->idnews ?>" title="">Editer</a>
								<a class="btn2 blue3 inline-block" href="index.php?page=admin&amp;deleteNews=<?= $news->idnews ?>" title="">Supprimer</a>
							</div>
						</div>
						<hr/>
				<?php
				}
			}
			?>
		</div>
		<?php
		}

		public static function SupprimerEvent($listeEvent) {
		?>
		<div class="cols7">
			<h2 class="title0" >Supprimer Event</h2>
			<?php
			foreach ($listeEvent as $event) {
				if (!empty($event)) {?>
						<div class="line">
							<h3 class="title1 inline-block max-width200"><?= $event->nom?></h3>
							<i class="tab max-width200 inline-block">Le <?= $event->date ?></i>
							<div class="g1"></div>
							<div class="inline-block max-width200">
								<a class="btn2 blue3 inline-block" href="index.php?page=admin&amp;event=<?= $event->idevent ?>" title="">Editer</a>
								<a class="btn2 blue3 inline-block" href="index.php?page=admin&amp;deleteEvent=<?= $event->idevent ?>" title="">Supprimer</a>
							</div>
						</div>
						<hr/>
				<?php
				}
			}
			?>
		</div>
		<?php
		}


		public static function SupprimerSection($listeSection) {
		?>
		<div class="cols7">
			<h2 class="title0" >Supprimer Section</h2>
			<?php
			foreach ($listeSection as $section) {
				if (!empty($section)) {?>
						<div class="line">
							<h3 class="title1 inline-block max-width200"><?= $section->nom?></h3>
							<div class="g1"></div>
							<div class="inline-block max-width200">
								<a class="btn2 blue3 inline-block" href="index.php?page=admin&amp;section=<?= $section->idjeux ?>" title="">Editer</a>
							</div>
						</div>
						<hr/>
				<?php
				}
			}
			?>
		</div>
		<?php
		}

		/******************************************************/
		/*					Edition 			     		  */
		/******************************************************/
		public static function EditerNews($news,$listeSection) {
		?>
		<div class="cols7">
			<h2 class="title0" >Editer News</h2>
			<form method="post"  class="center">
				<div class="field">
					<label for="nom" class="field-label">Titre</label>
					<input type="text" name="nom" id="nom" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['nom'])) echo 'value="' . $_POST['nom'] . '"'; else echo 'value="' . (String)$news->titre . '"'; ?>>
				</div>
				<div class="field">
					<label for="image" class="field-label">Url de l'image</label>
					<input type="text" name="image" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['image'])) echo "value=$_POST[image]"; else echo "value=$news->image"; ?>>
				</div>
				<select name="jeux">
				<?php
					foreach ($listeSection as $value) {
						if(!empty($value->idjeux)) {
							if ($value->idjeux == $news->idjeux) {
								echo "<option value='$value->idjeux' selected>$value->nom</option>";
							}
							else {
								echo "<option value='$value->idjeux'>$value->nom</option>";
							}
						}
					}
				?>
				</select>
				<textarea class="editme" name="desc" placeholder="Texte de la News" ><?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['desc'])) echo "$_POST[desc]"; else echo "$news->text"; ?></textarea>
				<div class="line2">
					<input class="btn blue3 center" type="submit" value="Editer News" name="editerNews" >
				</div>
			</form>
		</div>
		<?php
		}

		public static function EditerSection($jeu) {
		?>
		<div class="cols7">
			<h2 class="title0">Editer Section</h2>
			<form method="post"  class="center">
				<div class="field">
					<label for="nom" class="field-label">Nom Section</label>
					<input type="text" name="nom" id="nom" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['nom'])) echo "value=$_POST[nom]"; else echo 'value="' . $jeu->nom . '"'; ?>>
				</div>
				<div class="field">
					<label for="image" class="field-label">Url de l'image</label>
					<input type="text" name="image" class="field-input"  <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['image'])) echo "value=$_POST[image]"; else echo 'value="' . $jeu->image . '"'; ?>>
				</div>
				<select name="couleur">
					<option value="blue2">Bleu</option>
					<option value="red2">Rouge</option>
					<option value="green2">Vert</option>
					<option value="cyan2">Cyan</option>
					<option value="black1">Noir</option>
				</select>
				<textarea class="editme" name="desc" placeholder="Description..." ><?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['desc'])) echo "$_POST[desc]"; else echo  $jeu->description; ?></textarea>
				<div class="line2">
					<input class="btn blue3 center" type="submit" value="Editer Section" name="editerSection" >
				</div>
			</form>
		</div>
		<?php
		}

		public static function EditerEvent($event,$listeSection) {
		?>
		<div class="cols7">
			<h2 class="title0" >Editer Evénement</h2>
			<form method="post"  class="center">
				<div class="field">
					<label for="nom" class="field-label">Titre</label>
					<input type="text" name="nom" id="nom" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['nom'])) echo "value=$_POST[nom]"; else echo 'value="' . $event->nom . '"'; ?>>
				</div>
				<div class="field">
					<label for="type" class="field-label">Type</label>
					<input type="text" name="type" id="prenom" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['type'])) echo "value=$_POST[type]"; else echo 'value="' . $event->type . '"'; ?>>
				</div>
				<div class="field">
					<label for="date" class="field-label">Jour/Mois/Annee</label>
					<input type="text" name="date" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['date'])) echo "value=$_POST[date2]"; else {list($date,$heure) = explode(' ',$event->date); list($yyyy,$mm,$dd) = explode('-',$date); echo "value=$dd/$mm/$yyyy";} ?>>
				</div>
				<div class="field">
					<label for="date" class="field-label">Heure:Minute</label>
					<input type="text" name="heure" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['heure'])) echo "value=$_POST[heure]"; else {list($date,$heure) = explode(' ',$event->date); list($gg, $ii) = explode(':',$heure); echo "value=$gg:$ii";} ?>>
				</div>
				<div class="field">
					<label for="localisation" class="field-label">Localisation</label>
					<input type="text" name="localisation" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['localisation'])) echo "value=$_POST[localisation]"; else echo 'value="' . $event->localisation . '"'; ?>>
				</div>
				<div class="field">
					<label for="image" class="field-label">Url de l'image</label>
					<input type="text" name="image" class="field-input" <?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['image'])) echo "value=$_POST[image]"; else echo 'value="' . $event->image . '"'; ?>>
				</div>
				<select name="jeux">
				<?php
					foreach ($listeSection as $value) {
						if(!empty($value->idjeux)) {
							if ($value->idjeux == $event->idjeux)
								echo "<option value='$value->idjeux' selected>$value->nom</option>";
							else
								echo "<option value='$value->idjeux' >$value->nom</option>";
						}
					}
				?>
				</select>
				<textarea class="editme" name="desc" placeholder="Texte de la News" ><?php if(isset($_POST['error']) && $_POST['error'] != "NoError" && isset($_POST['desc'])) echo $_POST['desc']; else echo $event->desc; ?></textarea>
				<div class="line2">
					<input class="btn blue3 center" type="submit" value="Editer Event" name="editerEvent" >
				</div>
			</form>
		</div>
		<?php
		}
	}
?>