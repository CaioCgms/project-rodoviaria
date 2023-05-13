<?php
    namespace classes\daos;

    use banco_dados\Database_PDO;

    abstract class DAOS extends Database_PDO
    {
        private $table = "";

        public function setTable($table)
        {
            $this->table = $table;
        }

        public function getTable()
        {
            return $this->table;
        }

        // CRUD FUNCTIONS

        // Seleciona as colunas das linhas a partir da chave e valor da chave
        public function select($cols, $key, $key_value)
        {

        }

        public function delete($key, $key_value)
        {

        }

        public function update($object_data, $key, $key_value)
        {

        }

        public function insert($object_data)
        {
            foreach ($object_data as $key => $value) {
                echo "\n $key >> $value";
            }
        }
    }
?>