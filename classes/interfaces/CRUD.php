<?php
    namespace classes\interfaces;

    interface CRUD
    {
        public function get($index);
        public function add($v);
        public function update($index, $v);
        public function delete($index);
        public function getAll();
    }