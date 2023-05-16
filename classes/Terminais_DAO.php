<?php
    namespace classes;

    use classes\daos\DAOS;

    class Terminal_DAO extends DAOS
    {
        public function __construct()
        {
            // Defino que a tabela a ser usada é de terminais
            $this->setTable("terminais");
            // Constrói o seu 'pai'
            parent::__construct();
        }

        public function selectAll($cols = "*", $key, $key_value)
        {
            $data = parent::selectAll("*", 1, 1);
            $terminais = [];
            foreach ($data as $d) {
                $terminais[] = new Terminal($d['nome'], $d['id']);
            }

            return $terminais;
        }

        public function select($cols = "*", $key, $key_value)
        {
            $data = parent::select($cols, $key, $key_value);
            $passageiro = new Terminal($data['nome'], $data['id']);
            return $passageiro;
        }
    }