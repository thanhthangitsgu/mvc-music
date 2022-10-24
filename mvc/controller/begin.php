<?php

namespace mvc\controller;

use mvc\core\Config;
use mvc\core\Controller;

class begin extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->View->render('begin/index');
    }
    public function check(){
        $data = array(
            'data' => 'ok',
        );
        $this->View->renderJSON($data);
    }
}
