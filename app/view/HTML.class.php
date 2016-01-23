<?php

	class HTML {
		public static function NewsPreview($news,$auteur,$jeu) {
			?>
			<div class="row">
					<div class="frame white2">
							<a href="#" class="txt-dec-none" title="<?= $news->titre; ?>">
								<div class="line0">
									<h3 class="title00 txt-left"><?= $jeu->nom ?></h3>
									<h2 class="title1 txt-center"><?= $news->titre; ?></h2>
								</div>
							</a>	
							<div class="line"> 
								<img src="<?= $news->image;?>" alt="image-<?= $news->titre; ?>" />
							</div>
							<div class="frame-content">
								<div class="line3">
									<?php 
										echo get_text($news->text) .'...'; 
									?>
								</div>
								<hr />
								<div class="line2">
									<img class="avatar" src="<?php echo $auteur->avatar ?>" alt="avatar-<?= $auteur->avatar; ?>" />
									<p class="inline-block vt-top ln35">Posté par
										<a class="txt-dec-none c-blue3" href="index.php?page=profil&amp;nom=<?= $auteur->pseudo; ?>" title="<?= $auteur->pseudo; ?>"><strong><?= $auteur->pseudo; ?></strong></a>
										, le <i><?php list($date, $heure) = explode(' ',$news->date);list($yyyy,$mm,$dd) = explode('-', $date); echo "$dd/$mm/$yyyy"; ?></i> à <i><?= $heure ?></i>
									</p>
									<?php
										if (isset($_SESSION['rang']) && $_SESSION['rang'] >= 2) {
									?>
									<a class="btn2 blue3 right vt-top inline-block" href="index.php?page=admin&amp;post=<?= $news->idnews; ?>">Editer</a>
									<?php
										} 
									?>
									<a class="btn2 blue3 right vt-top inline-block" href="index.php?page=section&amp;jeu=<?= $jeu->idjeux ?>&amp;post=<?= $news->idnews; ?>">Voir</a>
								</div>
							</div><!-- frame-content -->
					</div><!-- .frame -->
				</div><!-- .row -->
			<?php
		} // NewsPreview()


		public static function News($news,$auteur,$nomJeu) {
			?>
			<div class="row">
				<div class="frame cols7">
					<div class="frame-content">
						<div class="line0">
							<h3 class="title00 txt-left"><?= $nomJeu ?></h3>
							<h2 class="title1 txt-center"><?= $news->titre; ?></h2>
						</div>
						<div class="line"> 
							<img src="<?= $news->image;?>" alt="image-<?= $news->titre; ?>" />
						</div>
						<div class="line3 bbcode">
							<?php
							echo $GLOBALS['parser']->parse($news->text)
								->detect_links()
								->detect_emails()
								->detect_emoticons()
								->get_html();
							 ?>
						</div>
						<hr />
						<div class="line2">
							<img class="avatar" src="<?php echo $auteur->avatar ?>" alt="avatar-<?= $auteur->avatar; ?>" :>
								<p class="inline-block vt-top ln35">Posté par
									<a class="txt-dec-none c-blue3" href="index.php?page=profil&amp;nom=<?= $auteur->pseudo; ?>" title="<?= $auteur->pseudo; ?>"><strong><?= $auteur->pseudo; ?></strong></a>
									, le <i><?php list($date, $heure) = explode(' ',$news->date);list($yyyy,$mm,$dd) = explode('-', $date); echo "$dd/$mm/$yyyy"; ?></i> à <i><?= $heure ?></i>
								</p>
								<?php
									if (isset($_SESSION['rang']) && $_SESSION['rang'] >= 2) {
								?>
								<a class="btn2 blue3 right vt-top inline-block" href="index.php?page=admin&amp;post=<?= $news->idnews; ?>">Editer</a>
								<?php
									} 
								?>
						</div>
					</div><!-- .frame-content -->
				</div><!-- .frame -->
			</div><!-- .row -->
			<?php
		} // News()


		public static function PostACom() {

			if (isset($_SESSION['login'])) {
			?>
				<div class="row">
					<div class="frame cols12 white2">
						<div class="frame-content">
							<form method="post" action="" class="center">
								<label for="comm">Commentaire</label>
								<textarea name="com"></textarea>
								<div class="line">
									<p>En cliquant sur valider, vous acceptez les <a  class="txt-dec-none c-blue2"  href="#"><strong>conditions générales</strong></a> d'utilisation.</p>
								</div>
								<input type="submit" value="Poster" name="creerCom"  class="btn blue3 right">
							</form>
						</div><!-- .frame-content -->
					</div><!-- .frame -->
				</div><!-- .row -->
			<?php	
			}
			else {
				echo 'Vous devez être connecté pour poster un commentaire.';
			}
		
		} // PostACom()


		public static function NewsCom($commentaire, $auteur) {
		?>
			<div class="line3 frame white2">
				<img class="avatar-com" src="<?= $auteur->avatar ?>" alt="default">
				<div class="inline-block vt-top">
					<p class="line2">
						<a class="txt-dec-none c-black1" href="index.php?page=profil&amp;nom=<?= $auteur->pseudo ?>"><strong><?= $auteur->pseudo ?></strong></a>
						, le <i><?php list($date, $heure) = explode(' ',$commentaire->date);list($yyyy,$mm,$dd) = explode('-', $date); echo "$dd/$mm/$yyyy"; ?></i> à <i><?= $heure ?></i>
					</p>
					<div class="line2">
						<p><?= $commentaire->texte ?></p>
					</div>
					<?php
						if ((isset($_SESSION['rang']) && $_SESSION['rang'] >= 2) || isset($_SESSION['iduser']) && $_SESSION['iduser'] == $auteur->iduser) {
					?>
					<div class="line3">
						<a class="btn2 blue3 right vt-top inline-block" href="index.php?page=section&amp;jeu=<?= $_GET['jeu'] ?>&amp;post=<?= $_GET['post']?>&amp;unset=<?= $commentaire->idcommentaire; ?>">Supprimer</a>
					</div>					
					<?php
						} 
					?>
				</div>
			</div><!-- .frame -->
		<?php
		} // NewsCom()


		public static function Jeu($jeux) {
			?>
				<div class="cols3">
					<h3 class="title3"><?= $jeux->nom ?></h3>
					<div class="row">
						<a href="<?= 'index.php?page=section&amp;jeu=' . $jeux->idjeux ?>"><img src="<?= $jeux->image ?>" alt="<?= $jeux->nom ?>" title="<?= $jeux->nom ?>"></a>
					</div>
				</div>
			<?php
		} // Jeu()


		public static function EventPreview($event,$jeu) {
			?>
				<div class="row frame black1">
					<h3 class="title2">
						<?= $event->nom ?> 
						le <?php list($date, $heure) = explode(' ',$event->date);list($yyyy,$mm,$dd) = explode('-', $date); echo "$dd/$mm/$yyyy"; ?>
					</h3>
					<div class="frame-content c-white">
					<?php 
						echo get_text($event->desc) .'...'; 
					?>
					</div><!-- .frame-content -->
					<div class="line2">
						<a class="btn4 blue3" href="index.php?page=section&amp;jeu=<?= $jeu->idjeux ?>&amp;id=<?= $event->idevent?>">Voir</a>
					</div>
					
				</div><!-- .row -->			
			<?php
		} // EventPreview()


		public static function Event($event,$jeu,$participer = false,$auteur) {
			?>
				<div class="row frame black1">
					<h3 class="title2">
						<?= $event->nom ?> 
						le <?php list($date, $heure) = explode(' ',$event->date);list($yyyy,$mm,$dd) = explode('-', $date); echo "$dd/$mm/$yyyy"; ?>
					</h3>
					<div class="frame-content">
						<div class="line">
							<p class="c-white"><strong class="c-blue3">Type : </strong><?= $event->type; ?></p>
						</div>
						<div class="line">
							<p class="c-white"><strong class="c-blue3">Localisation : </strong><?= $event->localisation; ?></p>
						</div>
						<div class="cols6">
							<div class="line c-white bbcode">
							<?php
								echo $GLOBALS['parser']->parse($event->desc)
								->detect_links()
								->detect_emails()
								->detect_emoticons()
								->get_html();
							 ?>
							</div>
						</div>
						<div class="g1"></div>
						<div class="cols4">
							<div class="row">
								<img src="<?= $event->image ?>" alt="<?= $event->nom ?>" />
							</div>
						</div>

						<div class="line0">
							<img class="avatar" src="<?php echo $auteur->avatar ?>" alt="avatar-<?= $auteur->avatar; ?>" />
							<p class="inline-block vt-top ln35 c-white">Posté par
								<a class="txt-dec-none c-blue3" href="index.php?page=profil&amp;nom=<?= $auteur->pseudo; ?>" title="<?= $auteur->pseudo; ?>"><strong><?= $auteur->pseudo; ?></strong></a>
							</p>
							
						</div>
					</div><!-- .frame-content -->
					<?php
						
						if($participer) {
							if (isset($_SESSION['iduser'])) {
					?>
					<div class="line0">
						<a class="btn4 blue3" href="index.php?page=section&amp;jeu=<?= $jeu->idjeux ?>&amp;id=<?= $event->idevent?>&amp;participer">Participer</a>
					</div>
					<?php	
							}
						}
					?>
				</div><!-- .row -->
			<?php
		} // Event()


		public static function DescriptionJeu($jeu,$isPlayer) {
			?>
			<?= $jeu->description?>
			<?php
				if (!$isPlayer) {
			?>
			<a class="btn2 <?= $jeu->couleur ?> right vt-top inline-block" href="index.php?page=section&amp;jeu=<?= $jeu->idjeux; ?>&amp;rejoindre=oui">Rejoindre</a>
			<?php
				}
			?>
			<?php
				if (isset($_SESSION['rang']) && $_SESSION['rang'] >= 2) {
			?>
			<a class="btn2 <?= $jeu->couleur ?> right vt-top inline-block" href="index.php?page=admin&amp;section=<?= $jeu->idjeux; ?>">Editer</a>
			<?php
				} 
			?>
			<?php
		} // DescriptionJeu()


		public static function User($user, $listeAmis) {
			?>
			<?php
				if ($_SESSION['iduser'] != $user->iduser) {
				$isAmis = false;
				foreach ($listeAmis as $amis) {
					if ($amis->iduser == $user->iduser) {
						$isAmis = true;
					}
				}
			?>
			<div class="frame frame2">
				<a class="txt-dec-none" href="index.php?page=profil&amp;nom=<?= $user->pseudo; ?>" title="<?= $user->pseudo; ?>">
					<div class="hb">
						<div class="hb-title black1">
							<h3 class="title2 c-white txt-center"><?= $user->pseudo ?></h3>
						</div>
					</div>
					<div class="line0">
						<img class="liste-avatar" src="<?= $user->avatar; ?>" alt="avatar-<?= $user->avatar; ?>" />
					</div>
				</a>
				<?php
					if (!$isAmis) {
				?>	
				<div class="line0">
					<a class='block btn4 blue3' href="index.php?page=profil&amp;ajouter=<?= $user->iduser ?>">Ajouter</a>
				</div>
				<?php
					}
					else {
				?>
				<div class="line0">
					<a class='block btn4 green2' href="index.php?page=profil&amp;nom=<?= $user->pseudo ?>" disable>Ami</a>
				</div>
				<?php		
					}
				?>
			</div><!-- .frame -->
			<div class="g1"></div>
			<?php
				}
		} // User()


		public static function UserProfil($user,$proprio) {
			?>
			<div class="frame frame2 white2">
				<a class="txt-dec-none" href="index.php?page=profil&amp;nom=<?= $user->pseudo; ?>" title="<?= $user->pseudo; ?>">
					<div class="hb">
						<div class="hb-title black1">
							<h3 class="title2 c-white txt-center"><?= $user->pseudo ?></h3>
						</div>
					</div>
					<div class="line0">
						<img class="liste-avatar" src="<?= $user->avatar; ?>" alt="avatar-<?= $user->avatar; ?>" />
					</div>
				</a>
				<div class="line0">
					<?php
						if ($_SESSION['iduser'] == $proprio->iduser) {
					?>
					<a class='block btn4 blue3' href="index.php?page=profil&amp;unset=<?= $user->iduser ?>">Supprimer</a>
					<?php
						}
					?>
				</div>
				
			</div><!-- .frame -->
			<div class="g1"></div>
			<?php
		} // UserProfil()


		public static function UserDelete($user,$event = false) {
			?>
			<div class="frame frame2 white2">
				<a class="txt-dec-none" href="index.php?page=profil&amp;nom=<?= $user->pseudo; ?>" title="<?= $user->pseudo; ?>">
					<div class="hb">
						<div class="hb-title blue3">
							<h3 class="title2 c-white txt-center"><?= $user->pseudo ?></h3>
						</div>
					</div>
					<div class="line">
						<img class="liste-avatar" src="<?= $user->avatar; ?>" alt="avatar-<?= $user->avatar; ?>" />
					</div>
				</a>
				<?php
					if(!$event) {
				?>	
				<div class="line">
					<a class='block btn4 blue3' href="index.php?page=admin&amp;delete=<?= $user->iduser ?>">Delete</a>
				</div>
				<?php
					}
					else {
				?>
				<div class="line">
					<a class='block btn4 blue3' href="index.php?page=section&amp;jeu=<?= $_GET['jeu'] ?>&amp;id=<?= $_GET['id'] ?>&amp;delete=<?= $user->iduser ?>">Desinscrire</a>
				</div>
				<?php
					}
				?>
			</div><!-- .frame -->
			<div class="g1"></div>
			<?php
		} // UserDelete()


	} // HTML

?>