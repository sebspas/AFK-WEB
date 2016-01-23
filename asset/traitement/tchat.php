<?php
session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors',1);
require_once('../../app/Config.class.php');
require_once('../../app/Bd.class.php');

$d = array();

if(isset($_GET['action'])){ // si on a envoyé des données avec le formulaire

    /*
    *   Envoi de message :)
    */
    if ($_GET['action'] == 'send') {
        if(!empty($_GET['message'])){ // si les variables ne sont pas vides
        
            $message = htmlentities($_GET['message']); // on sécurise nos données

            // puis on entre les données en base de données :
            $BD = new BD('tchat');
            $BD->addMessageInTchat($_SESSION['pseudo'],$_GET['message']);
            $BD->setUsedTable('user');
            $BD->update("lastactivity",time(),"pseudo",$_SESSION['pseudo']);
            $d['erreur'] = 'ok';
        }
        else{
            $d['erreur'] = "Vous avez oublié de remplir un des champs !";
        }
    }

    /*
    *   Recup des messages
    */
    if($_GET['action'] == 'recup') {

        extract($_GET);

        $lastid = floor($lastid);

        $BD = new BD('tchat');
        $donnees = $BD->recupTchat($lastid);
        $d['result'] ="";
        $d['lastid'] = $lastid;
        foreach ($donnees as $message) {
            if (!empty($message)) {
                $d['result'] .= '<p><strong>'.$message->auteur . '</strong>(' . date("H:i:s",$message->timestamp) . '): '  . htmlentities(utf8_decode($message->message)) .'</p>';
                $d['lastid'] = $message->id;
            }
        }

        $BD->setUsedTable('user');
        $user = $BD->select("iduser",$_SESSION['iduser']);
        if ($user->lastactivity != null && ($user->lastactivity+5*60) < time()) {
            $d['result'] = "Vous avez été déconnecté pour inactivité...Envoyer un message pour se re-connecter !";
            $d['offline'] = true;
        } else {
            $d['offline'] = false;
        }

        $d['erreur'] = 'ok';
    }       
}
else {
    $d['erreur'] = "Erreur pas d'action à effectuer !";
}

echo json_encode($d);
?>