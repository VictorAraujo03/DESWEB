<?php
    namespace MF\Init\Controller;

    abstract class Action{
        protected $view;

        public function __construct() {
            $this->view = new \stdClass();
        }

        protected function render($view, $layout = "layout1") {
            $this->view->page = $view;

            $layoutPath = __DIR__ . "/../../../../App/Views/" . $layout . ".phtml";

            if(file_exists($layoutPath)) {
                require_once $layoutPath;
            } else {
                $this->content();
            }
        }

        protected function content(){
            $classAtual = get_class($this);

            $classAtual = str_replace('App\\Controllers\\', '', $classAtual);

            $classAtual = strtolower(str_replace('Controller', '', $classAtual));

            require_once __DIR__ . "/../../../../App/Views/" . $classAtual . "/" . $this->view->page . ".phtml";
        }
    }


?>