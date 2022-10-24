<?php
require_once "../mvc/core/App.php";
//Hàm tự động require
spl_autoload_register(function ($className) {
    $prefix = 'mvc\\';
    $base_dir = __DIR__ . '/../mvc/';
    $len = strlen($prefix);
    if (strncmp($prefix, $className, $len) !== 0) {
        return;
    }
    $relative_class = substr($className, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});
