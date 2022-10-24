<?php
return array(
    'URL' => 'http://' . $_SERVER['HTTP_HOST'] . str_replace('public', '', dirname($_SERVER['SCRIPT_NAME'])),
    'PATH_CONTROLLER' => realpath(dirname(__FILE__).'/..') . '/mvc/controller/',
    'PATH_VIEW' => realpath(dirname(__FILE__).'/..') . '/mvc/view/',
    'DEFAULT_CONTROLLER' => 'begin',
    'DEFAULT_ACTION' => 'index',
    // Cấu hình db
    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'web_qlttn',
    'DB_USER' => 'root',
    'DB_PASS' => '',
    'DB_PORT' => '3306',
    'DB_CHARSET' => 'utf8',
);
