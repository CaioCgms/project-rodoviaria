<?php
    namespace controllers\http;

    use classes\Onibus_DAO;
use classes\Terminal_DAO;
use controllers\http\Controller;

    class OnibusController extends Controller
    {

        protected $viewDirectory = "onibus";

        // Cadastra Item
        public function cadastrar()
        {
            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $d = [];
                $d['terminais'] = (new Terminal_DAO())->selectAll("*", 1, 1) ?? [];
                $this->view("/$this->viewDirectory/cadastrar", $d);
            } else if($_SERVER["REQUEST_METHOD"] === "POST") {
                $d = (new Onibus_DAO())->insert($_POST);
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
                $onibus = (new Onibus_DAO())->select("*", 'id',  $id);
                $d = [];
                $d['terminais'] = (new Terminal_DAO())->selectAll("*", 1, 1) ?? [];
                $d['onibus'] = $onibus;
                $this->view("/$this->viewDirectory/editar", $d);
            } else if($_SERVER["REQUEST_METHOD"] === "POST") {
                $onibus = (new Onibus_DAO())->update($_POST, 'id',  $id);
                $d = [];
                $d['terminais'] = (new Terminal_DAO())->selectAll("*", 1, 1) ?? [];
                $d['onibus'] = $onibus;
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
                $d = (new Onibus_DAO())->delete("id", $id);
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
                $d = (new Onibus_DAO())->select("*", 'id',  $id);
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
                $d = (new Onibus_DAO())->selectAll("*", 1, 1);
                $this->view("/$this->viewDirectory/listar", $d);         
            }
        }
    }
?>