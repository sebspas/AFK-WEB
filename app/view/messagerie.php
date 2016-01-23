<div class="row">
	<div class="cols16">
		<div class="row"> <!-- section -->
			<div class="frame0 cols12 ">
				<div class="frame-content">
				<a href="index.php?page=writeMessage" title="topic1" class="btn2 blue2 left">Ecrire un nouveau message</a>
				</div><br />
				<div class="hb">
					<div class="hb-title blue3"><h3 class="title2 c-white txt-center">Conversation Active</h3></div>
				</div>
				<div class="frame-content">
				<?php
					foreach ($conversations as $conversation) {
				?>
					<div class="row">   <!-- forum -->
						<div class="line">
							<h3> Conversation de  <?= $Messagerie->recupUser($conversation->idauteur)->pseudo; ?> avec <?= $Messagerie->recupUser($conversation->iddestinataire)->pseudo; ?> </h3>
							<div class="g1"></div>
							<div class="cols12">
							<?php 
								if(($Messagerie->recupUser($conversation->idauteur)->pseudo == $Messagerie->recupUser($_SESSION['iduser'])->pseudo && $conversation->luAuteur == 1) || 
								   ($Messagerie->recupUser($conversation->iddestinataire)->pseudo == $Messagerie->recupUser($_SESSION['iduser'])->pseudo && $conversation->luDestinataire == 1))
									echo '<strong>Vous avez un message non lu !!!!!!</strong>';
							?>
								<a href="index.php?page=readMessage&amp;id=<?= $conversation->idmessage; ?>" title="topic1" class="btn2 blue2 right">Lire et Ecrire</a>
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
</div><!-- .row -->
