<?php

namespace mvc\core;

class View
{
    public function render($view, $data = [])
    {
        if ($data) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }
        if (file_exists(Config::get('PATH_VIEW') . $view . '.php')) {
            require Config::get('PATH_VIEW') . $view . '.php';
        } else {
            echo "<b> Không tìm thấy view " . Config::get('PATH_VIEW') . $view . '.php </b>';
        }
    }
    public function renderJSON($data)
    {
        header("Content-Type: application/json");
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    public static function partial($name)
    {
        if (file_exists(Config::get('PATH_VIEW') . '__partial/' .  $name . '.php')) {
            require Config::get('PATH_VIEW') . '__partial/' .  $name . '.php';
        } else {
            echo "<b> Không tìm thấy partial view " . $name . '.php </b>';
        }
    }
    public static function  assets($path)
    {
        return Config::get('URL') . 'assets/' . $path;
    }
    public static function  url($path)
    {
        return Config::get('URL'). $path;
    }
}
