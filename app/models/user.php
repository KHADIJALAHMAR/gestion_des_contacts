<?php 
class User {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    // check user by username
    public function findUser($username) {
        $this->db->query('SELECT * FROM users WHERE username = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        // check row 
        if ($this->db->rowCount() > 0) {
            return true;
        }else {
            return false;
        }

    }
}