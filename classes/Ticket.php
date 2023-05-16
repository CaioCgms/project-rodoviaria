<?php
    namespace classes;

    use classes\Passageiro;
    use classes\Onibus;
    use classes\Terminal;

    class Ticket
    {
        private $id;
        private $passageiro_id;
        private $onibus_id;
        private $terminal_id;
        private $poltrona_id;
        private $data_criacao;

        public function __construct($passageiro_id, $onibus_id, $terminal_id, $id, $poltrona_id, $data_criacao = null)
        {
            $this->passageiro_id = $passageiro_id;
            $this->onibus_id = $onibus_id;
            $this->terminal_id = $terminal_id;
            $this->id = $id;
            $this->poltrona_id = $poltrona_id;
            $this->id = uniqid();
            $this->data_criacao = $data_criacao;
        }

        public function getPassageiro()
        {
            return $this->passageiro_id;
        }

        public function setPassageiro(int $v)
        {
            $this->passageiro_id = $v;
        }

        public function getPoltrona()
        {
            return $this->poltrona_id;
        }

        public function setPoltrona(int $v)
        {
            $this->poltrona_id = $v;
        }

        public function getonibus()
        {
            return $this->onibus_id;
        }

        public function setonibus(int $v)
        {
            $this->onibus_id = $v;
        }

        public function getTerminal()
        {
            return $this->terminal_id;
        }

        public function setTerminal(int $v)
        {
            $this->terminal_id = $v;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getDataCriacao()
        {
            return $this->data_criacao;
        }

        public function setId(int $v)
        {
            $this->id = $v;
        }
    }