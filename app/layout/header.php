<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="description" content="AFK, la communauté Hardcore gaming, pour les vrais..." />
    <meta name="keywords" content="afk, jeu, video, game, team, communauté, geek, nolife, nerd, The Crew, delagarde, MartinNevot, Solminihac, projet de fou, meilleur projet de la promo, 20 sur 20, magnifique, responsive, grandiose, parfait, rendre le prof heureux, un vrai site" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AFK : <?php if (isset($_GET['page']) && !empty($_GET['page']) && is_file(Config::$path['controller'].$_GET['page'].'.php')) echo htmlentities($_GET['page']); else echo 'Home'; ?> </title>
    <link rel="stylesheet" href="<?php echo Config::$path['css'] ?>style.css" />
    <link rel="stylesheet" href="<?php echo Config::$path['outdatedbrowser'] ?>outdatedbrowser.min.css" />
    <link rel="stylesheet" href="<?php echo Config::$path['css'] ?>modern.css" type="text/css" media="all" />
    <link href="<?php echo Config::$path['images'] ?>favicon.ico" type="image/x-icon" rel="icon" />
    <link href="<?php echo Config::$path['images'] ?>favicon.ico" type="image/x-icon" rel="shortcut icon" />
</head>
<body>
	<div id="outdated"></div>
	<div id="header">
		<div class="menu white">
	        <div class="menu-logo">
	            <a class="logo-link left" href="index.php">
	            	<img src="<?php echo Config::$path['images'] ?>logo.png" alt="logo">
	            </a>
	        </div>
	        <div class="js-menu-btn"></div>
	        <nav class="menu-navigation">
	            <ul class="navigation-ul">
	                <li class="menu-list"><a class="menu-link c-blue2 <?php if (!isset($_GET['page'])) echo 'current'; ?>" href="index.php">Home</a></li>
	                <li class="menu-list">
	                	<a class="menu-link c-blue2 js-tosections <?php if (isset($_GET['page']) && $_GET['page'] == 'section') echo 'current'; ?>" >Sections</a>
						<div class="sections">
							<?php
								$BD = new BD("section");
								$sections = $BD->selectAll("idjeux");
								foreach ($sections as $v) {
									if (!empty($v)) {
										echo "<a class='menu-link c-blue2' href='index.php?page=section&amp;jeu=$v->idjeux' >" . $v->nom . '</a>';
									}	
								}
							?>
	                	</div>
	                </li>

	                <li class="menu-list"><a class="menu-link c-blue2 <?php if (isset($_GET['page']) && $_GET['page'] == 'forum') echo 'current'; ?>" href="index.php?page=forum">Forum</a></li>
	   				<?php
	                	if(isset($_SESSION['login'])) {
	                		// if (isset($_GET['page']) && $_GET['page'] == 'messagerie') {
	                		// 	echo "<li class=\"menu-list\"><a class=\"menu-link c-blue2 current\" href=\"index.php?page=messagerie\">Messagerie</a></li>";
	                		// }
	                		// else {
	                		// 	echo "<li class=\"menu-list\"><a class=\"menu-link c-blue2\" href=\"index.php?page=messagerie\">Messagerie</a></li>";
	                		// }
	                		if($_SESSION['rang'] > 1) {
	                			if (isset($_GET['page']) && $_GET['page'] == 'admin') {
	                				echo "<li class='menu-list'><a class='menu-link c-blue2 current' href='index.php?page=admin'>Admin</a></li>";
	                			}
	                			else {
	                				echo "<li class='menu-list'><a class='menu-link c-blue2' href='index.php?page=admin'>Admin</a></li>";
	                			}
	                		}
	                	}
	                ?>
	            </ul>
	        </nav>
 		    <div class="log">
 		    	<?php
	                	if(isset($_SESSION['login'])) {
	            ?>
 		    	<a class=" btn2 blue3 right" href="index.php?page=logout">Logout</a>
	            <a class="menu-avatar" href="index.php?page=profil">
	            	<img src="<?php echo $_SESSION['avatar']; ?>" alt="avatar" />
	            </a>
	            <?php
	            	}
	            	else {
	            ?>
		            <a class=" btn2 blue3 right js-tologinbox">Login</a>
		            <a class=" btn2 blue3 right" href="index.php?page=inscription">Sign-Up</a>
	            <?php
	            	}
	            ?>
 		    </div><!-- .log -->
 		    <div class="loginbox">
            	<form method="post" action="index.php?page=login" class="center">
					<div class="field">
						<label for="pseudo" class="field-label">Pseudo</label>
						<input type="text" name="pseudo" id="pseudo" class="field-input" />
					</div>
					<div class="field">
						<label for="password" class="field-label">Mot de passe</label>
						<input type="password" name="password" id="password" class="field-input" >
					</div>
					<div class="line3">
						<input class="btn blue3 center" type="submit" value="Valider" name="login" id="send" />
					</div>
				</form>
        	</div><!-- .loginbox -->
    	</div><!-- .menu -->
		<div class="slider">

			<?php

				if (empty($_GET['page']) || $_GET['page'] == 'accueil') {
			?>
			<!-- <div class="fluid-width-video-wrapper">
			<iframe id="fitvid567939" src="http://www.youtube.com/embed/d4JnshyKOOQ?autoplay=1&amp;loop=1&amp;border=0&amp;showinfo=0&amp;rel=0&amp;controls=0&amp;enablejsapi=1&amp;iv_load_policy=3" frameborder="0"></iframe></div>
			 -->

			 <object type="text/html" data="http://www.youtube.com/embed/d4JnshyKOOQ?border=0&amp;playerapiid=ytplayer&amp;version=3&amp;modestbranding=0&amp;rel=0&amp;showinfo=0&amp;controls=0&amp;iv_load_policy=3&amp;autoplay=0&amp;loop=1">
			 </object>
			 
				<!-- <iframe  src="http://www.youtube.com/embed/d4JnshyKOOQ?enablejsapi=1&playerapiid=ytplayer&version=3&modestbranding=1&autoplay=1&loop=1&border=0&showinfo=0&rel=0&controls=0&enablejsapi=1&iv_load_policy=3" ></iframe> -->
			<?php
				}
				elseif (!isset($_GET['jeu'])) {
			?>
				<img src="<?= Config::$path['images'] . 'bg2.jpg'; ?>" alt="default">
			<?
				}
				else {
					$jeu = $BD->select('idjeux',$_GET['jeu']);
			?>
				<img src="<?= $jeu->image; ?>" alt="default">
			<?php
				}

			?>

			<img src="<?php 
			if (!isset($_GET['jeu'])) { 
				echo Config::$path['images'] . 'bg2.jpg';
			}
			else {
				$jeu = $BD->select('idjeux',$_GET['jeu']);
				echo $jeu->image;
			}  
			?>"
			alt="slider">

			<?php
			if (isset($_SESSION['msg'])) {
				if ($_SESSION['msg'][0] == 'success') {
					echo "<div class='success'>" . $_SESSION['msg'][1] . "</div>";
				}
				else {
					echo "<div class='error'>" . $_SESSION['msg'][1] . "</div>";					
				}
				unset($_SESSION['msg']);
			}
			?>
		</div><!-- .slider -->
	</div><!-- #header -->
		<div id="main">
				<div class="notif"></div>
