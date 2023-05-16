<?php
    namespace classes;

    use classes\daos\DAOS;

    class Poltronas_DAO extends DAOS
    {
        public function __construct()
        {
            // Defino que a tabela a ser usada é de usuários
            $this->setTable("poltronas");
            // Constrói o seu 'pai'
            parent::__construct();
        }

        public function selectAll($cols = "*", $key, $key_value)
        {
            $data = parent::selectAll("*", 1, 1);
            $Poltronass = [];
            foreach ($data as $d) {
                $Poltronass[] = new Poltronas($d['onibus_id'], $d['id'], $d['numeracao'],  $d['passagem_id'], $d["status"]);
            }

            return $Poltronass;
        }

        public function select($cols = "*", $key, $key_value)
        {
            $data = parent::select($cols, $key, $key_value);
            $Poltronas = new Poltronas($data['onibus_id'], $data['id'], $data['numeracao'],  $data['passagem_id'], $data["status"]);
            return $Poltronas;
        }
    }
    