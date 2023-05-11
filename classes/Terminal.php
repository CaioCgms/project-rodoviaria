<?php
    namespace classes;

    class Terminal
    {
        private Rodoviaria $rodoviaria;
        private $nome;
        private $id;

        public function __construct($nome, $rodoviaria)
        {
            $this->nome = $nome;
            $this->rodoviaria = $rodoviaria;
            $this->id = uniqid();
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function setNome($v)
        {
            $this->nome = $v;
        }

        public function getRodoviaria()
        {
            return $this->rodoviaria;
        }

        public function setRodoviaria($v)
        {
            $this->rodoviaria = $v;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($v)
        {
            $this->id = $v;
        }
    }