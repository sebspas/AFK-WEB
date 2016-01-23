<?php
	$participer = true;
	foreach ($listeParticipant as $user) {
		if (!empty($user))
			if ($user->iduser == $_SESSION['iduser']) $participer = false;
	}
	$user = $Model->recupUser($event->idorganisateur);
	HTML::Event($event,$jeu,$participer,$user);
?>

<div class="row">
	<h2 class="title0">Participants</h2>
<?php
	foreach ($listeParticipant as $user) {
		if (!empty($user->iduser)){
			if (isset($_SESSION['iduser']) && ($_SESSION['rang'] >= 2 || $event->idorganisateur == $_SESSION['iduser'] || $_SESSION['iduser'] == $user->iduser)) {
				HTML::UserDelete($user,true);
			}
			else {
				$listeAmis = $Model->recupAmis($_SESSION['iduser']);
				HTML::User($user,$listeAmis);
			}
		}
	}
?>
</div>