<?php
    class Db {
        public $db;
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "mivento-task";
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
            $user = $this->db->prepare($sql);
            $result = $user->execute($data);
            return $result;
        }
    }
?>