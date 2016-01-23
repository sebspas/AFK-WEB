<div class="row" />
<?php
	if ($_GET['type'] == 'profil') {
?>
	<div class="cols7">
		<h2 class="title0">Modifier</h2>
		<form method="post" action="" class="center">
			<div class="field">
				<label for="pseudo" class="field-label">Pseudo</label>
				<input type="text" name="pseudo" id="prenom" class="field-input" <?php if(isset($error) && $error != "NoError" && isset($_POST['pseudo'])) echo "value=$_POST[pseudo]"; else echo "value=$user->pseudo"; ?>>
			</div>
			<div class="field">
				<label for="nom" class="field-label">Nom</label>
				<input type="text" name="nom" id="nom" class="field-input" <?php if(isset($error) && $error != "NoError" && isset($_POST['nom'])) echo "value=$_POST[nom]"; else echo "value=$user->nom"; ?>>
			</div>
			<div class="field">
				<label for="prenom" class="field-label">Prenom</label>
				<input type="text" name="prenom" id="prenom" class="field-input" <?php if(isset($error) && $error != "NoError" && isset($_POST['prenom'])) echo "value=$_POST[prenom]"; else echo "value=$user->prenom"; ?>>
			</div>
			<div class="field">
				<label for="email" class="field-label">Email</label>
				<input type="email" name="email" id="email" class="field-input" <?php if(isset($error) && $error != "NoError" && isset($_POST['email'])) echo "value=$_POST[email]"; else echo "value=$user->mail"; ?>>
			</div>
			<div class="field">
				<label for="email2" class="field-label">Email confirmation</label>
				<input type="email" name="email2" id="email2" class="field-input" <?php if(isset($error) && $error != "NoError" && isset($_POST['email'])) echo "value=$_POST[email]"; else echo "value=$user->mail"; ?>>
			</div>
			<div class="line2">
				<input class="btn blue3 center" type="submit" value="Modifier" name="Modifier" >
			</div>
		</form>
	</div>
	<div class="g1"></div>
	<div class="cols3">
		<h2 class="title0">Changer Avatar</h2>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum placeat, eius aliquam.
			Suscipit architecto, aliquam labore perferendis fugiat ipsam error possimus, 
			exercitationem tempora vel eligendi nostrum et maiores, odit iusto?
		</p>
			<a class="btn2 blue3 center" href="index.php?page=modifier&amp;type=avatar">Changer Avatar</a>
	</div>
<?php
	}
	else {?>
	<div class="cols5">
		<h2 class="title0">Changement de l'avatar</h2>
		<form method="post" action="index.php?page=modifier" enctype="multipart/form-data" class="center">
			<label for="avatar">Url de votre image (jpeg, jpg, gif)</label>
			<input type="text" name="image" id="avatar" />
        	<input class="btn blue3 center" type="submit" value="Changer" name="change" >
		</form>
	</div>
	<div class="cols3">
		<h2 class="title0">Changer Avatar</h2>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum placeat, eius aliquam.
			Suscipit architecto, aliquam labore perferendis fugiat ipsam error possimus, 
			exercitationem tempora vel eligendi nostrum et maiores, odit iusto?
		</p>
	</div>
<?php			
	}
?>	
</div>