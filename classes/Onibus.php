<?php
    namespace classes;

    class Onibus
    {
        private $empresa; //Nome da empresa
        private $linha; //Linha do ônibus - geralmente cidade de saida - cidade de chegada
        private $duracao; // duração da viagem estimada em minutos
        private $hora_saida; // hora de saída formato hh:mm::ss
        private $hora_chegada;// hora de chegada formato hh:mm::ss
        private $local_partida; // local de partida
        private $local_destino; // local de destino
        private $terminal; //Terminal associado ao Onibus
        private $id;

        function __construct(String $empresa, String $linha, int $duracao, String $hora_saida, String $hora_chegada, String $local_partida, String $local_destino, Terminal $terminal)
        {
            $this->empresa = $empresa;
            $this->linha = $linha;
            $this->hora_saida = $hora_saida;
            $this->duracao = $duracao;
            $this->hora_chegada = $hora_chegada;
            $this->local_partida = $local_partida;
            $this->local_destino = $local_destino;
            $this->terminal = $terminal;
            $this->id = uniqid();
        }

        public function setEmpresa(String $v)
        {
            $this->empresa = $v;
        }

        public function getLinha()
        {
            return $this->linha;
        }

        public function setLinha(String $v)
        {
            $this->linha = $v;
        }

        public function getEmpresa()
        {
            return $this->empresa;
        }

        public function getDuracao()
        {
            return $this->duracao;
        }

        public function setDuracao(int $v)
        {
            $this->duracao = $v;
        }

        public function getDestino()
        {
            return $this->local_destino;
        }

        public function setDestino(String $v)
        {
            $this->local_destino = $v;
        }

        public function getLocalPartida()
        {
            return $this->local_partida;
        }

        public function setLocalPartida(String $v)
        {
            $this->local_partida = $v;
        }

        public function getHoraChegada()
        {
            return $this->hora_chegada;
        }

        public function setHoraChegada(String $v)
        {
            $this->hora_chegada = $v;
        }
        
        public function getHoraSaida()
        {
            return $this->hora_saida;
        }

        public function setHoraSaida(String $v)
        {
            $this->hora_saida = $v;
        }

        public function  getId()
        {
            return $this->id;
        }

        public function setId(int $v)
        {
            $this->id = $v;
        }

        public function getTerminal(){
            return $this->terminal;
        }

        public function setTerminal($v){
            $this->terminal = $v;
        }
    }