<?php
    namespace classes;

    use classes\interfaces\CRUD;

    class Tickets implements CRUD
    {
        private $tickets = [];

        public function get($index)
        {
            return $this->tickets[$index];
        }

        public function add($ingresso)
        {
            $this->tickets[] = $ingresso;
        }

        public function update($index, $ingresso)
        {
            $this->tickets[$index] = $ingresso;
        }

        public function delete($index)
        {
            $new = [];
            for ($i = 0; $i < count($this->tickets); $i++) {
                if ($i != $index) {
                    $new[] = $this->tickets[$i];
                }
            }
            $this->tickets = $new;
        }

        public function getAll()
        {
            return $this -> tickets;
        }
    }
    