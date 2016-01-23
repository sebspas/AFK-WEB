<div class="row" >
	<div class="cols3">
		<h2 class="title0" >Menu</h2>
		<h3 class="title00">Création</h3>
		<a class="menu-link tab" href="index.php?page=admin&amp;creer=Section">Créer Section</a>
		<a class="menu-link tab" href="index.php?page=admin&amp;creer=News">Créer News</a>
		<a class="menu-link tab" href="index.php?page=admin&amp;creer=Event">Créer Event</a>
		<br />
		<h3 class="title00">Forum</h3>
		<a class="menu-link tab" href="index.php?page=admin&amp;creer=ForumCat">Créer Catégorie</a>
		<a class="menu-link tab" href="index.php?page=admin&amp;creer=ForumForum">Créer Forum</a>
		<a class="menu-link tab" href="index.php?page=admin&amp;creer=ForumSousForum">Créer Sous Forum</a>
		<br />
		<h3 class="title00">Modification</h3>
		<a class="menu-link tab" href="index.php?page=admin&amp;supprimer=Section">Modification Section</a>
		<a class="menu-link tab" href="index.php?page=admin&amp;supprimer=News">Modification News</a>
		<a class="menu-link tab" href="index.php?page=admin&amp;supprimer=Event">Modification Event</a>
		<br />
		<h3 class="title00">Suppression</h3>
		<a class="menu-link tab" href="index.php?page=admin&amp;supprimer=User">Supprimer User</a>
		<a class="menu-link tab" href="index.php?page=admin&amp;supprimer=News">Supprimer News</a>
		<a class="menu-link tab" href="index.php?page=admin&amp;supprimer=Event">Suppression Event</a>
	</div>
	<?php
		if (isset($_GET['creer'])) {
			switch ($_GET['creer']) {
				case 'Section':
					PanelAdmin::CreerSection();
					break;
				case 'News':
					PanelAdmin::CreerNews($listeSection);
					break;
				case 'Event':
					PanelAdmin::CreerEvent($listeSection);
					break;
				case 'ForumCat':
					PanelAdmin::CreerCategorie();
					break;
				case 'ForumForum':
					PanelAdmin::CreerForum($listeCategorie);
					break;
				case 'ForumSousForum':
					PanelAdmin::CreerSousForum($listeForum);
					break;
				default:
					break;
			}
		}
		elseif(isset($_GET['supprimer'])){
			switch ($_GET['supprimer']) {
				case 'User':
					PanelAdmin::SupprimerUser($listeUser);
					break;
				case 'News':
					PanelAdmin::SupprimerNews($listeNews);
					break;
				case 'Event':
					PanelAdmin::SupprimerEvent($listeEvent);
					break;
				case 'Section':
					PanelAdmin::SupprimerSection($listeSection);
					break;
				default:
					break;
			}
		}
		elseif (isset($_GET['post'])) {
			PanelAdmin::EditerNews($news,$listeSection);
		}
		elseif (isset($_GET['section'])) {
			PanelAdmin::EditerSection($jeu);
		}
		elseif (isset($_GET['event'])) {
			PanelAdmin::EditerEvent($event,$listeSection);
		}
		else {
		?>
			<div class="cols7">
				<h2 class='title00' > Un panel pour les gouverner tous ... </h2> 
			</div>
		<?php
		}
	?>
</div>