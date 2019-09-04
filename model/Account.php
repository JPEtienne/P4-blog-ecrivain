<?php 
session_start();

class Account {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Check if the user exists
     * 
     * @param string $username
     * @param string $password
     * @return void
     */
    public function login($username, $password) {
        $sql = $this->db->query("SELECT username, password FROM users WHERE username='$username' AND password='$password'");
        if ($sql->rowCount() > 0) { 
            $_SESSION['username'] = $_POST['username'];
            header("location:office-1");
        }
    }
}