<?php 

class Comment {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function comment($name, $email, $description, $slug, $created, $status) {
        $sql = $this->db->prepare("INSERT INTO comments(name, email, description, slug, created_at, status) VALUES(?, ?, ?, ?, ?, ?)");
        $sql->execute(array(
            $name,
            $email,
            $description,
            $slug,
            $created,
            $status
        ));
        return $sql;
    }

    public function getComment($slug) {
        $sql = $this->db->prepare("SELECT * FROM comments WHERE slug=? AND status=1");
        $sql->execute(array(
            $slug
        ));
        return $sql;
    }

    public function countComments($slug) {
        $sql = $this->db->prepare("SELECT * FROM comments WHERE slug=? AND status=1");
        $sql->execute(array(
            $slug
        ));
        return $sql->rowCount();
    }

    public function signalComment($id) {
        $sql = $this->db->prepare("UPDATE comments SET alert_signal=1 WHERE id=?");
        $sql->execute(array(
            $id
        ));
        return $sql;
    }

    public function getCommentBySignal() {
        $sql = $this->db->query("SELECT * FROM comments WHERE alert_signal>0");
        return $sql;
    }

    public function validateComment($id) {
        $id = trim($id, "'");        
        $sql = $this->db->prepare("UPDATE comments SET alert_signal=0 WHERE id=?");
        $sql->execute(array(
            $id
        ));
        return $sql;    
    }

    public function disableComment($id) {
        $id = trim($id, "'");        
        $sql = $this->db->prepare("UPDATE comments SET status=0, alert_signal=0 WHERE id=?");
        $sql->execute(array(
            $id
        ));
        return $sql; 
    }

    public function deleteComment($id) {
        $id = trim($id, "'");
        $sql = $this->db->prepare("DELETE FROM comments WHERE id=?");
        $sql->execute(array(
            $id
        ));
        return $sql; 
    }
}