<?php
class View {

    public function __construct() {

    }

    public function render($view, $name, $panel=false) {
        $this->view = $view;
        require TEMPLATE . "/header.php";
        require TEMPLATE . "/menu.php";
        require 'views/' . $view. '/'. $name . '.php';
        require TEMPLATE . "/footer.php";
    }
}