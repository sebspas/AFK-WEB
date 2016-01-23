<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors',1);
	require_once('../../app/Config.class.php');
	require_once('../../app/Bd.class.php');
	$d = array();

	$BD = new BD('news');
	$d['news'] = $BD->countAll();

	$BD->setUsedTable('event');
	$d['events'] = $BD->countAll();

	echo json_encode($d);
?>