<?php
$d = array();

$listeJour = array(1 => 'Lundi',2 => 'Mardi', 3 => 'Mercredi', 4 => 'Jeudi', 5 => 'Vendredi', 6 => 'Samedi', 7 => 'Dimanche');
$listeMois = array('null', 'Janvier','Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre' );
$listeMois2 = array('null','Janvier' => 1,'Février'=> 2, 'Mars'=> 3, 'Avril'=> 4, 'Mai'=> 5, 'Juin'=> 6, 'Juillet'=> 7, 'Août'=> 8, 'Septembre' => 9, 'Octobre'=> 10, 'Novembre'=> 11, 'Décembre'=> 12 );

if(!isset($_POST['action'])) {
    $d['erreur'] = "Erreur pas d'action a effectuer !!!";
}
else {
    extract($_POST);
    /*
     * Action : refreshCalendar
     */
    if($action=='refreshCalendar' ) {
        $d['result'] ="";
    	$mois = $listeMois2[$mois];
    	$jour = $_POST['jour'];
		/*for ($i = 1; $i < date('t',mktime(0,0,0,$mois,$jour,$annee)); $i++) {
			$d['result'] .= "<div class='frame'>";

			if ($i == date('d')) $color = 'c-blue3'; else $color=' ';

			$jourI = $listeJour[date('N',mktime(0,0,0,$mois,$i,$annee))];

			$d['result'] .=	"<h4 class='$color title3'>" . $jourI . ' ' . $i .'</h4>';

			foreach ($mapEvent as $event) {
				if ($event[0]['jour'] == $i && $event[0]['mois'] == $mois && $event[0]['annee'] == $annee) {
					$nomJeu = $Model->recupNomJeu($event[1]->idjeux);
					$d['result'] .= "<a class='btn4 blue3' href='index.php?page=section&jeu='" . $nomJeu .'&id=' . $event[1]->idevent . '>' . $event[0]['heure'] . ' ' . $event[1]->nom . '</a>';
				}
			}

			$d['result'] .= "</div>";
				if ($listeJour[date('N',mktime(0,0,0,$mois,$i,$annee))] == 'Dimanche') {
					$d['result'] .= "<div class='g12'></div>";
				}
		}*/
		//$d['result'] = date('t',mktime(0,0,0,$mois,$jour,$annee));
		$d['result'] = $jour;
        $d['erreur'] = 'ok';
    }
}

echo json_encode($d);

?>