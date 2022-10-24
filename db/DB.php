<?php
class DB extends PDO {
    protected $db_name = "mivento-task";
    protected $db_user = "root";
    protected $db_pass = "";
    protected $db_host = "localhost";

    public function __construct() {
        try {
            parent::__construct("mysql:host={$this->db_host};dbname={$this->db_name}", $this->db_user, $this->db_pass);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>