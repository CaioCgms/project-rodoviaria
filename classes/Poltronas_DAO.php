<?php
    namespace classes;

    use classes\daos\DAOS;

    class Poltronas_DAO extends DAOS
    {
        public function __construct()
        {
            // Defino que a tabela a ser usada é de poltronas
            $this->setTable("poltronas");
            // Constrói o seu 'pai'
            parent::__construct();
        }

        public function selectAll($cols = "*", $key, $key_value)
        {
            $data = parent::selectAll("*", $key, $key_value);
            $poltronas = [];

            foreach ($data as $d) {
                $poltronas[] = new Poltronas($d['onibus_id'], $d['id'], $d['numeracao'],  $d['passagem_id'], $d["status"]);
            }

            return $poltronas;
        }

        public function select($cols = "*", $key, $key_value)
        {
            $data = parent::select($cols, $key, $key_value);
            if (isset($data['id'])) {
                $poltronas = new Poltronas($data['onibus_id'], $data['id'], $data['numeracao'],  $data['passagem_id'], $data["status"]);
                return $poltronas;
            } else {
                return new Poltronas(0, "", 0, 0, false);
            }
        }
    }
    