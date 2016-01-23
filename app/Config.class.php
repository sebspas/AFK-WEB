<?php
class Config {
    public static $debug = true;

    public static $dbInfo = array(
        'driver' => 'mysql:host=localhost;dbname=afk',
        'username' => 'root',
        'password' => 'aqwEDCtgb7'
    );

    public static $path = array(
        'header' => 'app/layout/header.php',
        'footer' => 'app/layout/footer.php',
        'views' => 'app/view/',
        'controller' => 'app/controller/',
        'model' => 'app/model/',
        'css' => 'asset/css/',
        'images' => 'http://holobox.fr/AFK/asset/images/',
        'js'    => 'asset/js/',
        'outdatedbrowser' => 'asset/outdatedbrowser/',
        'messagerie' => 'asset/messagerie/',
        'traitement' => 'asset/traitement/'
    );
}