<?php
namespace mvc\core;
class Controller{
    public $View;
    public $Model;
    public function __construct()
    {
        $this->View = new View();
        $this->Model = new Model();
    }
}