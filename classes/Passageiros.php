<?php
    namespace classes;

    use classes\interfaces\CRUD;

    class Passageiros implements CRUD
    {
        private $passageiros = [];

        public function get($index)
        {
            return $this->passageiros[$index];
        }

        public function add($cliente)
        {
            $this->passageiros[] = $cliente;
        }

        public function update($index, $cliente)
        {
            $this->passageiros[$index] = $cliente;
        }

        public function delete($index)
        {
            $new = [];
            for ($i = 0; $i < count($this->passageiros); $i++) {
                if ($i != $index) {
                    $new[] = $this->passageiros[$i];
                }
            }
            $this->passageiros = $new;
        }

        public function getAll()
        {
            return $this -> passageiros;
        }
    }
    