<?php 
class User {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    // register user
    public function signUp($data) {
        $this->db->query('INSERT INTO users (username, user_pass) VALUES(:username, :password)');
        // bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        // execute prepared statement
        if ($this->db->execute()) {
            return true;
        }else {
            return false;
        }
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