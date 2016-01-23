<?php
require_once(Config::$path['model'].'logout.php');

putOffLine($_SESSION['iduser']);

$_SESSION = array();
if (isset($_COOKIE[session_name()]))
{setcookie(session_name(),'',time()-4200,'/');}

session_destroy();
header('Location: /AFK/index.php');
?>