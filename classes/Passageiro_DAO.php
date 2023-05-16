<?php
    namespace classes;

    use classes\daos\DAOS;
    use classes\interfaces\CRUD;

    class Passageiro_DAO extends DAOS
    {
        public function __construct()
        {
            // Defino que a tabela a ser usada é de usuários
            $this->setTable("usuarios");
            // Constrói o seu 'pai'
            parent::__construct();
        }

        public function selectAll($cols = "*", $key, $key_value)
        {
            $data = parent::selectAll("*", 1, 1);
            $passageiros = [];
            foreach ($data as $d) {
                $passageiros[] = new Passageiro($d['nome'], $d['email'], $d['cpf'],  $d['id']);
            }

            return $passageiros;
        }

        public function select($cols = "*", $key, $key_value)
        {
            $data = parent::select($cols, $key, $key_value);
            $passageiro = new Passageiro($data['nome'], $data['email'], $data['cpf'], $data['id']);
            return $passageiro;
        }
    }
    