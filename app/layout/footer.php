		</div><!-- #main -->
	<div id="footer">
		<div class="wrap">
			<div class="row">
				<div class="cols7">
					<h2 class="title00 c-white">Derniers posts</h2>					
			<?php
				require_once(Config::$path['model'].'Forum.class.php');
				$Forum = new Forum();
				$lastTopics = $Forum->recupSujet();
				foreach ($lastTopics as $lastTopic) {
					if (empty($lastTopic->idtopic) || empty($lastTopic->nom))
						continue;
				?>
					<div class="post">
							<a href="index.php?page=aTopic&amp;id=<?= $lastTopic->idtopic ?>" title="post1">
								<div class="post-author"><?= $lastTopic->nom; ?></div>
								<div class="post-date right">le 18/12/2014</div>
								<div class="post-content">
									<?php echo get_text($lastTopic->message).'...';?>
								</div>
							</a>
					</div><!-- .post -->
				<?php
				}
				?>
				</div><!-- .row -->
				<div class="g1"></div>
				<div class="cols3">
					<div class="row">
						<h2 class="title00 c-white">Nous rejoindre</h2>
						<a href="#" title="Facebook-AFK">
							<div class="fb0 left"></div>
						</a>
						<a href="#" title="Twitter-AFK">
							<div class="twitter left"></div>
						</a>
					</div><!-- .row -->
					<div class="row team">
						<h2 class="title00 c-white">La team</h2>
	            		<p class="c-white">La team Another Friend Kommunity à été créée par des étudiants en DUT Informatique
						   dans le cadre d'un projet.
	            		</p>
					</div><!-- .row -->
				</div>
			</div><!-- .row -->
			<div class="row">
				<div class="g3"></div>
				<div class="cols1"> 
					<div class="circle white registered">
						<span class="circle-span txt-center"><strong class="c-blue3">
						<?php
							$BD = new BD('user');
							echo $BD->countAll();
						?>
						</strong> Inscrit(s)</span>
					</div>
				</div>	
				<div class="g1"></div>
				<div class="cols1"> 
					<div class="circle white">
						<span class="circle-span txt-center"><strong class="c-red2"><?php echo $BD->count('online',1);?></strong> Connecté(s)</span>
					</div>
				</div>
				<div class="g1"></div>
				<div class="cols1"> 
					<div class="circle white">
						<span class="circle-span txt-center"><strong class="c-green2"><?php $BD->setUsedTable('event'); echo $BD->countAll();?></strong> Event(s)</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="copyright">
					<p class="txt-center">
					&copy; <a href="index.php"><strong>AFK</strong></a><sup>TM</sup> 2015 - Tous droits réservés - <a href="?page=mentions">Mentions légales</a>
					</p>	
				</div>
			</div>
		</div>
	</div><!-- #footer -->
	<span class="scrollT"></span>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    	<script type="text/javascript" src="<?php echo Config::$path['outdatedbrowser'] ?>outdatedbrowser.min.js"></script>
	<script type="text/javascript" src="<?php echo Config::$path['js'] ?>velocity.min.js"></script>
    <script type="text/javascript" src="<?php echo Config::$path['js'] ?>velocity.ui.min.js"></script>
    <script type="text/javascript" src="<?php echo Config::$path['js'] ?>fn.scrollT.js"></script>
    <script type="text/javascript" src="<?php echo Config::$path['js'] ?>jquery.fitvids.js"></script>
    <?php
    	if (!isset($_GET['page']) || $_GET['page'] == 'accueil') {
    ?>
    <script type="text/javascript" src="<?php echo Config::$path['js'] ?>ajax.js"></script>
    <?php
    	}
    	if (isset($_GET['page']) && ($_GET['page'] == 'admin' || $_GET['page'] == 'addTopic')) {
    ?>
	<script type="text/javascript" src="<?php echo Config::$path['js'] ?>jquery.sceditor.bbcode.min.js"></script>
	<?php
		}
		if (isset($_GET['page']) && $_GET['page'] == 'tchat' ) {
	?>
	<script type="text/javascript" src="<?php echo Config::$path['js'] ?>tchat.js"></script>
	<?php			
		}
	?>
    <script type="text/javascript" src="<?php echo Config::$path['js'] ?>main.js"></script>
</body>
</html>
