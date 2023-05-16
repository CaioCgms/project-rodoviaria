<?php
    namespace classes;

    use classes\daos\DAOS;

    class Tickets_DAO extends DAOS
    {
        public function __construct()
        {
            // Defino que a tabela a ser usada é de tickets
            $this->setTable("tickets");
            // Constrói o seu 'pai'
            parent::__construct();
        }

        public function selectAll($cols = "*", $key, $key_value)
        {
            $data = parent::selectAll("*", $key, $key_value);
            $tickets = [];
            foreach ($data as $d) {
                $tickets[] = new Ticket($d["cliente_id"], $d["onibus_id"], $d["terminal_id"], $d["id"], $d["poltrona_id"], $d["data_criacao"]);
            }
            return $tickets;
        }

        public function select($cols = "*", $key, $key_value)
        {
            $data = parent::select($cols, $key, $key_value);
            if (isset($data["id"])) {
                $ticket = new Ticket($data["cliente_id"], $data["onibus_id"], $data["terminal_id"], $data["id"], $data["poltrona_id"], $data["data_criacao"]);
                return $ticket;
            } else {
                return new Ticket(0, 0, 0, 0, 0, "");
            }
        }
    }
    