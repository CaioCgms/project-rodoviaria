<?php
    namespace classes;

    class Terminal
    {
        private $nome;
        private $id;

        public function __construct($nome, $id)
        {
            $this->nome = $nome;
            $this->id = $id;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function setNome($v)
        {
            $this->nome = $v;
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