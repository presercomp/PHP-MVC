<?php
class error extends Controller{
    function __construct() {
        parent::__construct();
    }

    function index(){
        $this->view->render('error', '404');
    }
} 