<?php
    namespace classes\daos;

    use banco_dados\Database_PDO;
    use Exception;

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
        public function select($cols = "*", $key, $key_value)
        {

            if ($key && !$key_value || !$key) {
                throw new Exception("É necessário informar o valor da chave", 1);
                return;
            }

            $pdoPrepared = $this->getPDO()->prepare("SELECT {$cols} FROM {$this->getTable()} WHERE $key = :$key");
            $pdoPrepared->bindParam(":$key", $key_value);
            $pdoPrepared -> execute();
            $data = $pdoPrepared -> fetch(\PDO::FETCH_ASSOC);
            
            return $data;
        }

        public function selectAll($cols = "*", $key, $key_value)
        {

            if ($key && !$key_value) {
                throw new Exception("É necessário informar o valor da chave", 1);
                return;
            }

            if (!$key && !$key_value) {
                $key = 1;
                $key_value = 1;
            }

            $pdoPrepared = $this->getPDO()->prepare("SELECT {$cols} FROM {$this->getTable()} WHERE $key = :$key");
            $pdoPrepared->bindParam(":$key", $key_value);
            $pdoPrepared -> execute();
            $data = $pdoPrepared -> fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        }

        // Remove dados recebendo uma chave e valor da chave
        public function delete($key, $key_value)
        {
            if ($key && !$key_value || !$key) {
                throw new Exception("É necessário informar o valor da chave", 1);
                return;
            }

            $pdoPrepared = $this->getPDO()->prepare("DELETE FROM {$this->getTable()} WHERE $key = :$key");
            $pdoPrepared->bindParam(":$key", $key_value);
            return $pdoPrepared -> execute();
        }

        // Atualiza dados recebendo um objeto, uma chave e valor da chave
        public function update($object_data, $key_, $key_value)
        {
            if ($key_ && !$key_value || !$key_) {
                throw new Exception("É necessário informar o valor da chave", 1);
                return;
            }
            
            $cols = "";
            $values = "";
            $values_keys = "";

            foreach ($object_data as $key => $value) {
                $cols = $cols ? $cols . ", " . $key : $key;
                $values_keys = $values_keys ? $values_keys . ", " . "$key=:$key" : "$key=:$key";
            }      

            $pdoPrepared = $this->getPDO()->prepare("UPDATE {$this->getTable()} SET $values_keys WHERE $key_ = :$key_");
            $bindValues = [];
            foreach ($object_data as $key => $value) {
                $bindValues[":$key"] = $value;
            }
            $bindValues[":$key_"] = $key_value;
            $status = $pdoPrepared->execute($bindValues);

            if($status){
                return $this->select("*", $key_, $key_value);
            }

            return false;
        }

        // Insere dados recebendo um objeto
        public function insert($object_data)
        {
            $cols = "";
            $values = "";
            $values_keys = "";

            foreach ($object_data as $key => $value) {
                $cols = $cols ? $cols . ", " . $key : $key;
                // $values_keys = $values_keys ? $values_keys . ", " . "$key=:$key" : "$key=:$key";
                $values_keys = $values_keys ? $values_keys . ", " . ":$key" : ":$key";

                // echo "\n $key >> $value";
            }
            // echo "\n Values >> $values_keys";
            // echo "\n Cols >> $cols";          

            $pdoPrepared = $this->getPDO()->prepare("INSERT INTO {$this->getTable()} ($cols) VALUES ($values_keys)");
            $bindValues = [];
            foreach ($object_data as $key => $value) {
                // echo "\n :$key >> $value";
                $bindValues[":$key"] = $value;
            }
            $status = $pdoPrepared->execute($bindValues);
            
            if($status){
                $id = $this->getPDO()->lastInsertId();
                return $this->select("*", 'id', $id);
            }

            return;
        }
    }
?>