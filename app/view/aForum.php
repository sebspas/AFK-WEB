<div class="row">
	<div class="cols6">
	<?php
		if($Forum->countSousForumOnForum($_GET['id']) > 0) {
	?>
		<div class="row"> <!-- section -->
			<div class="cols12 ">
				<div class="hb">
					<div class="hb-title blue3"><h3 class="title2 c-white txt-center">Sous-Forum</h3></div>
				</div>
				<div class="frame-content">
				<?php
					foreach ($sousForums as $forum) {
						if (empty($forum->idForum) || empty($forum->nom))
							continue;
				?>
					<div class="row">   <!-- forum -->
						<div class="line">
							<h3><?= $forum->nom; ?></h3>
							<div class="cols7">
								<p><?php 
									if(!empty($forum->description))
										echo $forum->description; 
								?></p><br />
								<?= $Forum->returnSousForumOnForum($forum->idForum); ?>
							</div>
							<div class="g1"></div>
							<div class="cols3">
								<strong>Topic : <?php echo $Forum->countTopicOnForum($forum->idForum); ?></strong>
								<a href="index.php?page=aForum&amp;id=<?= $forum->idForum; ?>" title="topic1" class="btn2 blue2 right">Voir</a>
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
		<div class="row"> <!-- section -->
			<div class="cols12">
				<div class="hb">
					<div class="hb-title blue3"><h3 class="title2 c-white txt-center">Messages</h3></div>
				</div>
				<div class="frame-content">
				<?php
					foreach ($topics as $topic) {
						if (empty($topic->idtopic) || empty($topic->nom))
							continue;
				?>
					<div class="row">   <!-- forum -->
						<div class="line">
							<h3><?php echo $topic->nom; ?></h3>
							<div class="cols7"></div>
							<div class="g1"></div>
							<div class="cols3">
								<strong>Messages : <?= $Forum->countMessageOnTopic($topic->idtopic); ?></strong>
								<a href="index.php?page=aTopic&amp;id=<?= $topic->idtopic; ?>" title="topic1" class="btn2 blue2 right">Voir</a>
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
	</div>
	<div class="g1"></div>
	<div class="right cols4"> 
	<?php
	if (isset($_SESSION['login'])) {
	?>
		<a class="btn2 blue3 left vt-top inline-block" href="index.php?page=addTopic&amp;id=<?= $_GET['id']; ?>">Nouveau Topic</a>
		<br /><br /><br /><br />
	<?php
	}
	?>
		<h2 class="title0">Sujets récents</h2>
		<?php
		foreach ($lastTopics as $lastTopic) {
			if (empty($lastTopic->idtopic) || empty($lastTopic->nom))
				continue;
		?>
		<div class="row frame black1">
			<h3 class="title2"><?= $lastTopic->nom; ?></h3>
			<div class="frame-content">
				<p class="c-white"><?php echo get_text($lastTopic->message).'...' ?></p>
			</div><!-- .frame-content -->
			<div class="line2">
				<a class="btn4 blue3" href="index.php?page=aTopic&amp;id=<?= $lastTopic->idtopic ?>">Lire le Message</a>
			</div>
		</div><!-- .row -->
		<?php
		}
		?>
	</div>
</div><!-- .row -->
