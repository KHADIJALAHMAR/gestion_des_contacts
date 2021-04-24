<?php
    class Contact {
        private $db;
        
        public function __construct(){
            $this->db = new Database;
        }
    
        // get contacts
        public function getContacts($userSession){
            $this->db->query("SELECT * FROM contacts WHERE username = :username");
            $this->db->bind(":username",$userSession);
            return $this->db->resultSet();
        }
        // add contacts
        public function addContact($data) {
            $this->db->query('INSERT INTO contacts (contact_name, contact_phone,conatct_email,contact_adress,username) VALUES(:cname, :cphone , :cemail , :cadress , :cusername)');
            // bind values
            $this->db->bind(':cname', $data['contact_name']);
            $this->db->bind(':cphone', $data['contact_phone']);
            $this->db->bind(':cemail', $data['contact_email']);
            $this->db->bind(':cadress', $data['contact_adress']);
            $this->db->bind(':cusername', $_SESSION['"username"']);
            // execute prepared statement
            if ($this->db->execute()) {
                return true;
            }else {
                return false;
            }
        }
    }
?>