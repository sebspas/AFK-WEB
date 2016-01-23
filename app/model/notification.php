<?php
// session_start();
// require_once('../Config.class.php');
// require_once('../Bd.class.php');

// $d = array();

// if(!isset($_POST['action'])) {
//     $d['erreur'] = "Erreur pas d'action a effectuer !!!";
// }
// else {
//     extract($_POST);
//     /*
//      * Action : getMessages
//      */
//     //var_dump($action);
//     if($action=='getMessages') {
//         //$lastid = floor($lastid);
//         $BD = new BD('messagerie');
//         $d['result'] += $BD->checkMsgAuteur();
//         $d['result'] += $BD->checkMsgDestinataire();
//         //$d['lastid'] = $lastid;

//         $d['erreur'] = 'ok';
//     }
// }

// echo json_encode($d);

?>