<?php
    namespace classes;

    use classes\interfaces\CRUD;

    class Terminais implements CRUD
    {
        private $terminais = [];

        public function get($index)
        {
            return $this->terminais[$index];
        }

        public function add($sala)
        {
            $this->terminais[] = $sala;
        }

        public function update($index, $sala)
        {
            $this->terminais[$index] = $sala;
        }

        public function delete($index)
        {
            $new = [];
            for ($i = 0; $i < count($this->terminais); $i++) {
                if ($i != $index) {
                    $new[] = $this->terminais[$i];
                }
            }
            $this->terminais = $new;
        }

        public function getAll()
        {
            return $this -> terminais;
        }
    }
