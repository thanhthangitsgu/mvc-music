<?php

namespace mvc\core;

use Exception;

class Config
{
    public static $config;
        
    public static function get($key)
    {
        if (!self::$config) {

            $config_file = '../mvc/Config.php';

            if (!file_exists($config_file)) {
                throw new Exception('Không tìm thấy config file');
            }

            self::$config = require_once $config_file;
        }

        return self::$config[$key];
    }
}
