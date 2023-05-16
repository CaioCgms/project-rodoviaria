<?php
    namespace banco_dados;
    use Exception;

    class Database_PDO
    {
        private $pdo = null;
        private $username = "root";
        private $userpass = "";
        private $dbname = "caios_rodoviaria";
        private $dsn = "";

        public function __construct(){
            $this->dsn = "mysql:dbname=$this->dbname;host=localhost";
            try {
                $this->pdo = new \PDO($this->dsn, $this->username, $this->userpass);
            } catch (Exception $e) {
                echo "Houve um erro com a conexão com o banco de dados";
                exit();
            }
        }

        public function getPDO()
        {
            return $this->pdo;
        }

        public function setDBName($dbname)
        {
            $this->dbname = $dbname;
        }
    }
?>