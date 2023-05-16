<?php
    namespace classes;

    class Poltronas
    {
        private $onibus_id;
        private $passagem_id;
        private $id;
        private $numeracao = 0;
        private $status = 0;

        function __construct(int $onibus_id, String $id, int $numeracao, int $passagem_id, bool $status)
        {
            $this->onibus_id = $onibus_id;
            $this->numeracao = $numeracao;
            $this->passagem_id = $passagem_id;
            $this->status = $status;
            $this->id = $id;
        }

        public function  getNumeracao()
        {
            return $this->numeracao;
        }

        public function setNumeracao(int $v)
        {
            $this->numeracao = $v;
        }

        public function  getOnibus()
        {
            return $this->onibus_id;
        }

        public function setOnibus(int $v)
        {
            $this->onibus_id = $v;
        }

        public function  getPassagem()
        {
            return $this->passagem_id;
        }

        public function setPassagem(int $v)
        {
            $this->passagem_id = $v;
        }

        public function  getStatus()
        {
            return $this->status;
        }

        public function setStatus(int $v)
        {
            $this->status = $v;
        }
 
        public function  getId()
        {
            return $this->id;
        }

        public function setId(int $v)
        {
            $this->id = $v;
        }
    }