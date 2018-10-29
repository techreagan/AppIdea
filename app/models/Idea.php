<?php 

class Idea {
  public function __construct() {
    $this->db = new Database;
  }

  public function getAllIdeas() {
    $this->db->query('SELECT * FROM ideas WHERE user_id = :user_id ORDER BY id DESC');
    $this->db->bind('user_id', $_SESSION['user_id']);
    return $this->db->resultSet();
  }

  public function createIdea($data) {
    $this->db->query('INSERT INTO ideas(title, user_id, description) VALUES(:name, :user_id, :description)');
    $this->db->bind('name', $data['name']);
    $this->db->bind('user_id', $_SESSION['user_id']);
    $this->db->bind('description', $data['description']);

    if($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function updateIdea($data) {
    $this->db->query('UPDATE ideas SET title = :name, description = :description WHERE id = :id');
    $this->db->bind('name', $data['name']);
    $this->db->bind('description', $data['description']);
    $this->db->bind('id', $data['id']);

    if($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getIdeaById($id) {
    $this->db->query('SELECT * FROM ideas WHERE user_id = :user_id AND id = :id');
    $this->db->bind('user_id', $_SESSION['user_id']);
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function deleteIdea($id) {
    $this->db->query('DELETE FROM ideas WHERE id = :id');
    $this->db->bind('id', $id);
    
    if($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}