<?php
class ModuleError extends Controller{
    private $_type;

    function __construct($type) {
        parent::__construct();
        $this->_type = $type;
    }

    function index(){
        $this->view->render('error', '404');
    }
} 