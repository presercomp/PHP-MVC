<?php

class Bootstrap {
    //Atributos
    private $_url = null;
    private $_controller = null;

    private $_controllerPath = "controllers/";
    private $_errorFile      = "error.php";
    private $_defaultFile    = "index.php";

    public function init() {

        //Invocamos al método para captuar la URL
        $this->_getUrl();
        //cargamos el controlador por defecto si no hay una
        //Ej: Cuando carga http://localhost , traereá el controlador por defecto
        if(empty($this->_url[0])) {
            $this->_loadDefaultController();
            return false;
        }   
        $this->_loadExistingController();
        $this->_callControllerMethod();

    }

    /**
     * Carga el controlador por defecto
     */
    private function _loadDefaultController() {
        require $this->_controllerPath . $this->_defaultFile;
        $this->_controller = new Index();
        $this->_controller->index();
    }

    private function _loadExistingController() {
        $file = $this->_controllerPath . $this->_url[0]."php";
        if (file_exists($file)) {
            require $file;
            $this->_controller = new $this->_url[0];
        } else {
            $this->_error("404");
            return false;
        }
    }

    private function _callControllerMethod() {
        $length = count($this->_url);
        if ($length > 1) {
            if(!method_exists($this->_controller, $this->_url[1])) {
                $this->_error("404");
            }
        }
        switch($length) {
            case 5:
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
            break;
            case 4:
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
            break;
            case 3:
                $this->_controller->{$this->_url[1]}($this->_url[2]);
            break;
            case 2:
                $this->_controller->{$this->_url[1]}();
            break;
            default : 
                $this->_controller->index();
            break;
        }

    }

    private function _error($type) {
        require $this->_controllerPath . $this>_errorFile; 
        $this->_controller = new Error();
        $this->_controller->index($type);
        exit;
    }

    private function _getUrl() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = str_replace("-", "_", $url);
        $url = rtrim($url ,'/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }
}