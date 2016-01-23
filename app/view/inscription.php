<div class="row" />
	<div class="cols7">
		<h2 class="title0">Inscription</h2>
		<form method="post" action="index.php?page=inscription" class="center">
			<div class="field">
				<label for="pseudo" class="field-label">Pseudo</label>
				<input type="text" name="pseudo" id="pseudo" class="field-input" <?php if(isset($error) && $error != "NoError" && isset($_POST['pseudo'])) echo "value=$_POST[pseudo]" ?>>
			</div>
			<div class="field">
				<label for="nom" class="field-label">Nom</label>
				<input type="text" name="nom" id="nom" class="field-input" <?php if(isset($error) && $error != "NoError" && isset($_POST['nom'])) echo "value=$_POST[nom]" ?>>
			</div>
			<div class="field">
				<label for="prenom" class="field-label">Prenom</label>
				<input type="text" name="prenom" id="prenom" class="field-input" <?php if(isset($error) && $error != "NoError" && isset($_POST['prenom'])) echo "value=$_POST[prenom]" ?>>
			</div>
			<div class="field">
				<label for="email" class="field-label">Email</label>
				<input type="email" name="email" id="email" class="field-input" <?php if(isset($error) && $error != "NoError" && isset($_POST['email'])) echo "value=$_POST[email]" ?>>
			</div>
			<div class="field">
				<label for="email2" class="field-label">Email confirmation</label>
				<input type="email" name="email2" id="email2" class="field-input" <?php if(isset($error) && $error != "NoError" && isset($_POST['email'])) echo "value=$_POST[email]" ?>>
			</div>
			<select name="sexe">
				<option value="Homme">Homme</option>
				<option value="Femme">Femme</option>
				<option value="Femme">Autre...</option>
			</select>
			<div class="field">
				<label for="password" class="field-label">Mot de passe</label>
				<input type="password" name="password" id="password" class="field-input" >
			</div>
			<div class="field">
				<label for="password2" class="field-label">Mot de passe confirmation</label>
				<input type="password" name="password2" id="password2" class="field-input" >
			</div>
			<div class="line3">
				<p>En cliquant sur valider, vous acceptez les <a href="#"><strong>conditions générales</strong></a> d'utilisation.</p>
			</div>
			<input type="submit" value="Valider" name="send" id="send" class="btn blue3 center">
		</form>
	</div>
	<div class="g1"></div>
	<div class="cols3">
		<h2 class="title0">Informations</h2>
		<h2 class="title4">Pourquoi nous rejoindre ?</h2>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum placeat, eius aliquam.
			Suscipit architecto, aliquam labore perferendis fugiat ipsam error possimus, 
			exercitationem tempora vel eligendi nostrum et maiores, odit iusto?
		</p>
		<h2 class="title4">A propos de nous !</h2>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum placeat, eius aliquam.
			Suscipit architecto, aliquam labore perferendis fugiat ipsam error possimus, 
			exercitationem tempora vel eligendi nostrum et maiores, odit iusto?
		</p>
	</div>
</div>