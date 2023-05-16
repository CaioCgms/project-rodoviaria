<?php
    namespace controllers\http;

    use classes\Terminal_DAO;
    use controllers\http\Controller;

    class TerminaisController extends Controller
    {

        protected $viewDirectory = "terminais";

        // Cadastra Item
        public function cadastrar()
        {
            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $this->view("/$this->viewDirectory/cadastrar");
            } else if($_SERVER["REQUEST_METHOD"] === "POST") {
                $d = (new Terminal_DAO())->insert($_POST);
                if ($d) {
                    $id = $d->getId();
                    header("Location: " . getLink("$this->viewDirectory/editar/$id"));
                } else {
                    $this->set_flash_message("Falha");
                }
            }
        }

        // Edita Item
        public function editar($id)
        {
            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $d = (new Terminal_DAO())->select("*", 'id',  $id);
                $this->view("/$this->viewDirectory/editar", $d);
            } else if($_SERVER["REQUEST_METHOD"] === "POST") {
                $d = (new Terminal_DAO())->update($_POST, 'id',  $id);
                if ($d) {
                    $this->set_flash_message("Sucesso ao editar conta");
                    $this->view("/$this->viewDirectory/editar", $d);
                } else {
                    $this->set_flash_message("Falha");
                    $this->view("/$this->viewDirectory/cadastrar", $d);
                }
            }
        }

        // remove Item
        public function remover($id)
        {
            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $d = (new Terminal_DAO())->delete("id", $id);
                if ($d) {
                    $this->set_flash_message("Sucesso ao remover conta");
                } else {
                    $this->set_flash_message("Falha");
                }
            }
        }

        // Pega Item
        public function get($id)
        {
            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $d = (new Terminal_DAO())->select("*", 'id',  $id);
                if ($d) {
                    $this->view("/$this->viewDirectory/mostrar", $d);
                } else {
                    $this->set_flash_message("Falha");
                }
            }
        }

        // Lista Items
        public function listar()
        {
            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $d = (new Terminal_DAO())->selectAll("*", 1, 1);
                $this->view("/$this->viewDirectory/listar", $d);         
            }
        }
    }
?>