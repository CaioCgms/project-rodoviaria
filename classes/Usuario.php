<?php
    namespace classes;

    class Usuario
    {
        private $nome;
        private $email;
        private $id;
        private $cpf;

        public function __construct($nome, $email, $cpf, $id)
        {
            $this->nome = $nome;
            $this->email = $email;
            $this->id =  $id;
            $this->cpf = $cpf;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function setNome($v)
        {
            $this->nome = $v;
        }

        public function  getEmail()
        {
            return $this->email;
        }

        public function setEmail($v)
        {
            $this->email = $v; 
        }

        public function  getId()
        {
            return $this->id;
        }

        public function setId($v)
        {
            $this->id = $v;
        }

        public function  getCpf()
        {
            return $this->cpf;
        }

        public function setCpf($v)
        {
            $this->cpf = $v;
        }
    }