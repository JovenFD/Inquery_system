<?php
    class Model {
        private $servername = "localhost";
        private $username = "root";
        private $password = ""; 
        private $dbname = "db_iquery_system"; //database name 

        public function connect() {
            try {
                $pdo = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                } catch(PDOException $e) {
                throw $e;
            }
            return $pdo;
        }

        public function runQuery($stringQery, $arrayParam, $queryType) {
            try {
                $stmt = $this->connect()->prepare($stringQery);

                if($queryType === 0 || $queryType === 1) {
                    $stmt->execute($arrayParam);
                } else {
                    $stmt->execute();
                }

                $data = [];

                switch ($queryType) {
                    case 0:
                       return $stmt->fetch(PDO::FETCH_ASSOC);
                    break;
                    case 1:
                        return true;
                    break;
                    case 3:

                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)
                        ) {
                            $data[]=$row;
                        }

                        return $data;
                    break;
                }

            } catch (Exception $e) {    
                echo "Error: ".$e->getMessage();
                die();
            }
        }
    }
?>