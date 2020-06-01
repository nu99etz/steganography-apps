<?php


/*class Config {

    public static function set() {

        // Driver Database
        $config = array();
        $config['db_driver'] = 'postgres';
        $config['db_host'] = 'localhost';
        $config['db_port'] = '5432';
        $config['db_user'] = 'nugraha';
        $config['db_pass'] = 'sapi';
        $config['db_name'] = 'recommender_system';

        // Directori
        $config['app_root'] = '/home/nugraha/Custom WEB';
        $config['app_path'] = '/devframework';
        $config['app_asset'] = $config['app_path'].'/assets/';
        $config['app_helper'] = '../helpers';
        $config['app_models'] = '../models';

        return $config;
    }
}*/

     // Driver Database
        $config = array();
        $config['db_driver'] = 'postgres';
        $config['db_host'] = 'localhost';
        $config['db_port'] = '5432';
        $config['db_user'] = 'nugraha';
        $config['db_pass'] = 'sapi';
        $config['db_name'] = 'arisan';

        // Directori
        $config['app_root'] = 'C:/xampp/htdocs';
        $config['app_path'] = '/arisan';
        $config['app_asset'] = $config['app_path'].'/assets/';
        $config['app_helper'] = '../helpers/';
        $config['app_models'] = '../models/';
        $config['app_uploads'] = $config['app_path'].'/upload/';
?>
