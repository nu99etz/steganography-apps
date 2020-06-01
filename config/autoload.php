<?php

include('config.php');

date_default_timezone_set("Asia/Jakarta");

// Load Semua Helper
require_once($config['app_helper'].'check.class.php');
require_once($config['app_helper'].'datatables.class.php');
require_once($config['app_helper'].'form.class.php');
require_once($config['app_helper'].'model.class.php');
require_once($config['app_helper'].'query.class.php');
require_once($config['app_helper'].'route.class.php');
require_once($config['app_helper'].'table.class.php');
require_once($config['app_helper'].'page.class.php');
require_once($config['app_helper'].'validation.class.php');
require_once($config['app_helper'].'permission.class.php');
require_once($config['app_helper'].'steganography.class.php');
require_once($config['app_helper'].'converter.class.php');
require_once($config['app_helper'].'image.class.php');

//var_dump($config['app_models']);

?>
