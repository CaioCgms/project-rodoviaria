<?php
    namespace controllers\http;

    use controllers\http\Controller;
    use View;

    class HomeController extends Controller
    {

        protected $viewDirectory = "home";

        public function index()
        {
            $this->view($this->viewDirectory . "/home", []);
        }
    }
?>