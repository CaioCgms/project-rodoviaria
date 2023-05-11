<?php
    namespace classes;

    use classes\interfaces\CRUD;
    
    class Onibuss implements CRUD
    {
        private $onibuss = [];

        public function get($index)
        {
            return $this->onibuss[$index];
        }

        public function add($filme)
        {
            $this->onibuss[] = $filme;
        }

        public function update($index, $filme)
        {
            $this->onibuss[$index] = $filme;
        }

        public function delete($index)
        {
            $new = [];
            for ($i = 0; $i < count($this->onibuss); $i++) {
                if ($i != $index) {
                    $new[] = $this->onibuss[$i];
                }
            }
            $this->onibuss = $new;
        }

        public function getAll()
        {
            return $this -> onibuss;
        }
    }
    