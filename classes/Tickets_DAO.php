<?php
    namespace classes;

    use classes\daos\DAOS;

    class Tickets_DAO extends DAOS
    {
        public function __construct()
        {
            // Defino que a tabela a ser usada é de terminais
            $this->setTable("tickets");
            // Constrói o seu 'pai'
            parent::__construct();
        }

        public function selectAll($cols = "*", $key, $key_value)
        {
            $data = parent::selectAll("*", 1, 1);
            $terminais = [];
            foreach ($data as $d) {
                $terminais[] = new Ticket($d["passageiro_id"], $d["onibus_id"], $d["terminal_id"], $d["id"], $d["poltrona_id"], $d["data_criacao"]);
            }

            return $terminais;
        }

        public function select($cols = "*", $key, $key_value)
        {
            $data = parent::select($cols, $key, $key_value);
            $passageiro = new Ticket($data["passageiro_id"], $data["onibus_id"], $data["terminal_id"], $data["id"], $data["poltrona_id"], $data["data_criacao"]);
            return $passageiro;
        }
    }
    