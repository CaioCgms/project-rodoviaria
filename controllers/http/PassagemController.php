<?php
    namespace controllers\http;

    use classes\Onibus_DAO;
    use classes\Passageiro_DAO;
use classes\Poltronas_DAO;
use classes\Terminal_DAO;
use classes\Tickets_DAO;
    use controllers\http\Controller;

    class PassagemController extends Controller
    {

        protected $viewDirectory = "passagem";

        // Cadastra Item
        public function cadastrar($onibus_id)
        {
            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $d = [];
                $d['clientes'] = (new Passageiro_DAO())->selectAll("*", 1, 1) ?? [];
                $d['onibus'] = (new Onibus_DAO())->selectAll("*", "id", $onibus_id) ?? [];
                $d['poltronas'] = (new Poltronas_DAO())->selectAll("*", "onibus_id", $onibus_id) ?? [];
                $this->view("/$this->viewDirectory/cadastrar", $d);
            } else if($_SERVER["REQUEST_METHOD"] === "POST") {
                $d = (new Tickets_DAO())->insert($_POST);
                $poltrona = (new Poltronas_DAO())->insert([
                    "onibus_id" => $_POST["onibus_id"],
                    "numeracao" => $_POST["poltrona_id"],
                    "passagem_id" => $d->getId(),
                    "status" => true,
                ]);
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
                $d = [];
                $passagem = (new Tickets_DAO())->select("*", 'id',  $id);
                $onibus = (new Onibus_DAO())->select("*", 'id',  $passagem->getOnibus());
                $d['clientes'] = (new Passageiro_DAO())->selectAll("*", "id", $passagem->getPassageiro()) ?? [];
                $d['terminais'] = (new Terminal_DAO())->selectAll("*", "id", $passagem->getTerminal()) ?? [];
                $d['poltronas'] = (new Poltronas_DAO())->selectAll("*", "onibus_id", $onibus->getId()) ?? [];
                $d['onibus'] = $onibus;
                $d['passagem'] = $passagem;
                $this->view("/$this->viewDirectory/editar", $d);
            }
        }

        // remove Item
        public function remover($id)
        {
            if ($_SERVER["REQUEST_METHOD"] === "GET") {
                $d = (new Tickets_DAO())->delete("id", $id);
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
                $d = (new Tickets_DAO())->select("*", 'id',  $id);
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
                $passagens = (new Tickets_DAO())->selectAll("*", 1, 1);
                $passagensOut = [];
                foreach ($passagens as $passagem) {
                    $d = [];
                    $onibus = (new Onibus_DAO())->select("*", 'id',  $passagem->getOnibus());
                    $d['cliente'] = (new Passageiro_DAO())->select("*", "id", $passagem->getPassageiro()) ?? [];
                    $d['terminal'] = (new Terminal_DAO())->select("*", "id", $passagem->getTerminal()) ?? [];
                    $d['poltrona'] = (new Poltronas_DAO())->select("*", "passagem_id", $passagem->getId()) ?? [];
                    $d['onibus'] = $onibus;
                    $d['passagem'] = $passagem;
                    $passagensOut[] = $d;
                }
                $this->view("/$this->viewDirectory/listar", $passagensOut);         
            }
        }
    }
?>