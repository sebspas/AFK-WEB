<div class="row">
	<div class="cols6">
	<?php
		foreach ($categories as $categorie) {
			if (empty($categorie->idCategorie) || empty($categorie->nom))
				continue;
			$forums = $Forum->recupForumOnCat($categorie->idCategorie);
	?>
		<div class="row"> <!-- section -->
			<div class="frame0 cols12 ">
				<div class="hb">
					<div class="hb-title blue3"><h3 class="title2 c-white txt-center"><?php echo $categorie->nom; ?></h3></div>
				</div>
				<div class="frame-content">
				<?php
					foreach ($forums as $forum) {
						if (empty($forum->idForum) || empty($forum->nom))
							continue;
				?>
					<div class="row">   <!-- forum -->
						<div class="line">
							<h3><?php echo $forum->nom; ?></h3>
							<div class="cols7">
								<?php 
									if(!empty($forum->description))
										echo $forum->description; 
								?><br />
								<?php echo $Forum->returnSousForumOnForum($forum->idForum); ?>
							</div>
							<div class="g1"></div>
							<div class="cols3">
								<strong>Topic : <?php echo $Forum->countTopicOnForum($forum->idForum); ?></strong>
								<a href="index.php?page=aForum&amp;id=<?php echo $forum->idForum; ?>" title="topic1" class="btn2 blue2 right">Voir</a>
							</div>
						</div><!-- .line -->
						<hr />
					</div><!-- .row forum -->
				<?php
				}
				?>
				</div><!-- .frame-content -->
			</div><!-- .frame -->
		</div><!-- .row -->
	<?php
	}
	?>
	</div>
	<div class="g1"></div>
	<div class="right cols4"> 
		<h2 class="title0">Sujets récents</h2>
		<?php
		foreach ($lastTopics as $lastTopic) {
			if (empty($lastTopic->idtopic) || empty($lastTopic->nom))
				continue;
		?>
		<div class="row frame black1">
			<h3 class="title2"><?php echo $lastTopic->nom; ?></h3>
			<div class="frame-content">
				<p class="c-white"><?php echo substr($lastTopic->message, 0, 150).'...' ?></p>
			</div><!-- .frame-content -->
			<div class="line2">
				<a class="btn4 blue3" href="index.php?page=aTopic&amp;id=<?php echo $lastTopic->idtopic ?>">Lire le Message</a>
			</div>
		</div><!-- .row -->
		<?php
		}
		?>
	</div>
</div><!-- .row -->
