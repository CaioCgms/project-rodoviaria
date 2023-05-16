<?php
    namespace controllers\http;

    use classes\Passageiro_DAO;
    use controllers\http\Controller;

    class PassageiroController extends Controller
    {

        protected $viewDirectory = "passageiro";

        // Cadastra Item
        public function cadastrar()
        {
            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $this->view("/$this->viewDirectory/cadastrar");
            } else if($_SERVER["REQUEST_METHOD"] === "POST") {
                $d = (new Passageiro_DAO())->insert($_POST);
                if ($d) {
                    $id = $d->getId();
                    header("Location: " . getLink("$this->viewDirectory/editar/$id"));
                } else {
                    $this->show_flash_message("\n Falha");
                }
            }
        }

        // Edita Item
        public function editar($id)
        {
            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $d = (new Passageiro_DAO())->select("*", 'id',  $id);
                $this->view("/$this->viewDirectory/editar", $d);
            } else if($_SERVER["REQUEST_METHOD"] === "POST") {
                $d = (new Passageiro_DAO())->update($_POST, 'id',  $id);
                if ($d) {
                    $this->show_flash_message("\n Sucesso ao editar conta");
                    $this->view("/$this->viewDirectory/editar", $d);
                } else {
                    $this->show_flash_message("\n Falha");
                    $this->view("/$this->viewDirectory/cadastrar", $d);
                }
            }
        }

        // remove Item
        public function remover($id)
        {
            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $d = (new Passageiro_DAO())->delete("id", $id);
                if ($d) {
                    $this->show_flash_message("\n Sucesso ao remover conta");
                } else {
                    $this->show_flash_message("\n Falha");
                }
            }
        }

        // Pega Item
        public function get($id)
        {
            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $d = (new Passageiro_DAO())->select("*", 'id',  $id);
                if ($d) {
                    $this->view("/$this->viewDirectory/mostrar", $d);
                } else {
                    $this->show_flash_message("\n Falha");
                }
            }
        }

        // Lista Items
        public function listar()
        {
            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $d = (new Passageiro_DAO())->selectAll("*", 1, 1);
                $this->view("/$this->viewDirectory/listar", $d);         
            }
        }
    }
?>