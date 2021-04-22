<?php
    class Contact {
        private $db;
        
        public function __construct(){
            $this->db = new Database;
        }
    

        public function getContacts($userSession){
            $this->db->query("SELECT * FROM contacts WHERE username = $userSession");
            return $this->db->resultSet();
        }
    }
?>