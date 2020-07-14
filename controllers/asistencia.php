<?php

class asistencia extends Controller
{
    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render("asistencia", "index");
    }
}