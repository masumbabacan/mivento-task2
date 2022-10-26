<?php
    class Db {
        public $db;
        private $servername = "eu-cdbr-west-03.cleardb.net";
        private $username = "b5807d538dbe6e";
        private $password = "7a87a63b";
        private $dbname = "heroku_ae75fceab9cfe8b";
        private $charset = "utf8mb4";

        public function __construct() {
            try {
                $this->db = new PDO("mysql:host={$this->servername};dbname={$this->dbname};charset={$this->charset}", $this->username, $this->password);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function getData($email, $employee_id, $phone){
            $sth = $this->db->prepare("SELECT * FROM users where email='$email' OR employee_id='$employee_id' OR phone='$phone'");
            $sth->execute();
            $data = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        public function insertData($data = array()){
            $sql = "INSERT INTO users (name, surname, email,employee_id,phone,point) 
            VALUES (:name, :surname, :email, :employee_id, :phone, :point)";
            $user= $this->db->prepare($sql);
            $result = $user->execute($data);
            return $result;
        }
    }
?>