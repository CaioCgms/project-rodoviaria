<?php
    namespace banco_dados;

    class Database_PDO
    {
        private $pdo = null;
        private $username = "root";
        private $userpass = "";
        private $dbname = "caios_rodoviaria";
        private $dsn = "";

        public function __construct(){
            $dsn = "mysql:dbname=$this->dbname;host=localhost";
            try {
                $this->pdo = new \PDO($this->dsn, $this->username, $this->userpass);
            } catch (Exception $e) {
                echo "Houve um erro com a conexão com o banco de dados";
                exit();
            }
        }

        public function setDBName($dbname)
        {
            $this->dbname = $dbname;
        }
    }
?>