<?php
    class Contact {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getContacts(){
            $this->db->query("SELECT * FROM contacts");
            return $this->db->resultSet();
        }
    }
?>