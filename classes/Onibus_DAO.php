<?php
    namespace classes;

    use classes\daos\DAOS;
    use classes\interfaces\CRUD;
    
    class Onibus_DAO extends DAOS
    {
        public function __construct()
        {
            // Defino que a tabela a ser usada é de usuários
            $this->setTable("onibus");
            // Constrói o seu 'pai'
            parent::__construct();
        }

        public function selectAll($cols = "*", $key, $key_value)
        {
            $data = parent::selectAll("*", 1, 1);
            $passageiros = [];
            foreach ($data as $d) {
                $terminal = ((new Terminal_DAO())->select("*", "id", $d["terminal_id"]));
                $onibus = new Onibus(
                    $d["empresa"],
                    $d["linha"],
                    $d["duracao"],
                    $d["hora_saida"],
                    $d["hora_chegada"],
                    $d["local_partida"],
                    $d["local_destino"],
                    $d["terminal_id"],
                    $d["id"],
                );
                $onibus->setTerminalObj($terminal);
                $passageiros[] = $onibus;
            }
            return $passageiros;
        }

        public function select($cols = "*", $key, $key_value)
        {
            $data = parent::select($cols, $key, $key_value);
            $terminal = ((new Terminal_DAO())->select("*", "id", $data["terminal_id"]));
            $passageiro = new Onibus(
                $data["empresa"],
                $data["linha"],
                $data["duracao"],
                $data["hora_saida"],
                $data["hora_chegada"],
                $data["local_partida"],
                $data["local_destino"],
                $data["terminal_id"],
                $data["id"],
            );
            $passageiro->setTerminalObj($terminal);
            return $passageiro;
        }
    }
    