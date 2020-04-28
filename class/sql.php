<?php

    class Sql extends PDO {
        private $conn;

        public function __construct(){
            $this->conn = new PDO("mysql:dbname=dbphp7;host=localhost:3308", "root","rootrb");
        }

        private function setParams($statment, $parameters = array()){
            foreach ($parameters as $key => $value) {
                $this->setParam($key, $value);
            }
        }

        private function setParam($statment, $key, $value){
            $statment->bindParam($key, $value);
        }

        public function query($rawQuery, $param = array()){
            $stmt = $this->conn->prepare($rawQuery);

            $this->setParams($stmt, $param);
            $stmt->execute();
            return $stmt;
            
        }

        public function select($rawQuery, $param = array()):array{
            $stmt = $this->query($rawQuery, $param);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }

?>