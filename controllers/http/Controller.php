<?php
    namespace controllers\http;

    class Controller
    {

        protected $viewContent;
        protected $viewData;
        protected $flashMsg;

        public function __construct()
        {
            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                
            } else if($_SERVER["REQUEST_METHOD"] === "POST") {
        
            } else if($_SERVER["REQUEST_METHOD"] === "PUT") {
        
            } else if($_SERVER["REQUEST_METHOD"] == "DELETE") {
                
            }
        }


        public function view($view, $viewData = [])
        {
            $this->viewContent = $view;
            $this->viewData = $viewData;
        }

        public function getView()
        {
            if ($this->viewContent) {
                $data = $this->viewData;
                include_once("shared/views/$this->viewContent.php");
            }
        }

        public function set_flash_message($msg)
        {
            $this->flashMsg = $msg;
        }

        public function show_flash_message()
        {
            if( $this->flashMsg ){
                $str = "<div class='flash-msg'>";
                $str .= $this->flashMsg;
                $str .= "</div>";
                return $str;
            }
        }
    }
?>