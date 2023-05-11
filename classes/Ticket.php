<?php
    namespace classes;

    use classes\Passageiro;
    use classes\Onibus;
    use classes\Terminal;

    class Ingresso
    {
        private $id;
        private Passageiro $passageiro;
        private Onibus $onibus;
        private Terminal $terminal;

        public function __construct($passageiro, $onibus, $terminal)
        {
            $this->passageiro = $passageiro;
            $this->onibus = $onibus;
            $this->terminal = $terminal;
            $this->id = uniqid();
        }

        public function getPassageiro()
        {
            return $this->passageiro;
        }

        public function setPassageiro(passageiro $v)
        {
            $this->passageiro = $v;
        }

        public function getonibus()
        {
            return $this->onibus;
        }

        public function setonibus(onibus $v)
        {
            $this->onibus = $v;
        }

        public function getTerminal()
        {
            return $this->terminal;
        }

        public function setTerminal(terminal $v)
        {
            $this->terminal = $v;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId(terminal $v)
        {
            $this->id = $v;
        }
    }