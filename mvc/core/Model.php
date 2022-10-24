<?php

namespace mvc\core;

class Model
{
    public function use($model)
    {
        require_once "./mvc/model/" . $model . "php";
    }
}
