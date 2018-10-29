<?php 

class User {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function registerUser($data) {
    $this->db->query('INSERT INTO users(username, email, password) 
                      VALUES(:username, :email, :password)');
    $this->db->bind('username', $data['username']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('password', $data['password']);

    if($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function loginUser($data) {
    $this->db->query('SELECT * FROM users WHERE username = :value OR email = :value');
    $this->db->bind('value', $data['username']);

    $user = $this->db->single();
   
    if(password_verify($data['password'], $user->password)) {
      return $user;
    } else {
      return false;
    }
  }

  public function findUserByEmailOrUsername($user) { 
    $this->db->query('SELECT email FROM users WHERE email = :value OR username = :value');
    $this->db->bind('value', $user['username']);

    $row = $this->db->single();
    if($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function findUserByEmail($email) { 
    $this->db->query('SELECT email FROM users WHERE email = :email');
    $this->db->bind('email', $email);

    $row = $this->db->single();
    if($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
}