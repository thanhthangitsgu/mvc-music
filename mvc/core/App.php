<?php
namespace mvc\core;
use mvc\core\Config;
class App
{
    protected $controller;
    protected $action;
    protected $params = array();

    public  function __construct()
    {
        $arr = $this->splitUrl();
      
        $this->initController();
        //Xu li controller
        if(isset($arr[0])&&file_exists("../mvc/controller/".$arr[0].".php")){
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require_once "../mvc/controller/".$this->controller.".php";
        $controller = 'mvc\\Controller\\' . $this->controller;
        $this->controller = new $controller;

        //Xu li action
        $this->action =  Config::get("DEFAULT_ACTION");
        if(isset($arr[1])){
            if(method_exists($this->controller,$arr[1])){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
        //Xu li tham so
        $this->params = $arr?array_values($arr):[];
        call_user_func_array(array($this->controller,$this->action), $this->params); 
    }
    function splitUrl(){
        if(isset($_GET["url"])){
            $url = trim($_GET["url"],'/');
            return explode('/', filter_var($url));   
        }
    }
    function initController(){
        if (!$this->controller) {
            $this->controller = Config::get('DEFAULT_CONTROLLER');
        }

        if (!$this->action OR (strlen($this->actionName) == 0)) {
            $this->action = Config::get('DEFAULT_ACTION');
        }
    }
}
