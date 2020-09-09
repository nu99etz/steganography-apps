<?php

include('config.php');

if(empty($config['app_timezone'])) {
    $timezone = 'Asia/Jakarta';
} else {
    $timezone = $config['app_timezone'];
}

date_default_timezone_set($timezone);

// Load Semua Helper
require_once($config['app_helper'].'auth.class.php');
require_once($config['app_helper'].'check.class.php');
require_once($config['app_helper'].'datatables.class.php');
require_once($config['app_helper'].'form.class.php');
require_once($config['app_helper'].'model.class.php');
require_once($config['app_helper'].'query.class.php');
require_once($config['app_helper'].'route.class.php');
require_once($config['app_helper'].'table.class.php');
require_once($config['app_helper'].'migration.class.php');
require_once($config['app_helper'].'page.class.php');
require_once($config['app_helper'].'validation.class.php');
require_once($config['app_helper'].'permission.class.php');
require_once($config['app_helper'].'steganography.class.php');
require_once($config['app_helper'].'converter.class.php');
require_once($config['app_helper'].'image.class.php');

$conn = Query::connect();

$conn->BeginTrans();
//var_dump($config['app_models']);

?>
