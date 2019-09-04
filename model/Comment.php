<?php 

class Comment {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Add comment to a post
     * 
     * @param string $name
     * @param string $email
     * @param string $description
     * @param string $slug
     * @param string $created
     * @param string $status
     */
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

    /**
     * Show the comment by post
     * 
     * @param string $slug
     */
    public function getComment($slug) {
        $sql = $this->db->prepare("SELECT * FROM comments WHERE slug=? AND status=1");
        $sql->execute(array(
            $slug
        ));
        return $sql;
    }

    /**
     * Count the number of comments by post
     * 
     * @param string $slug
     */
    public function countComments($slug) {
        $sql = $this->db->prepare("SELECT * FROM comments WHERE slug=? AND status=1");
        $sql->execute(array(
            $slug
        ));
        return $sql->rowCount();
    }

    /**
     * Signal a comment
     * 
     * @param int $id
     */
    public function signalComment($id) {
        $sql = $this->db->prepare("UPDATE comments SET alert_signal=1 WHERE id=?");
        $sql->execute(array(
            $id
        ));
        return $sql;
    }

    /**
     * Show all the signaled comments
     */
    public function getCommentBySignal() {
        $sql = $this->db->query("SELECT * FROM comments WHERE alert_signal>0");
        return $sql;
    }

    /**
     * Remove signal from the comment
     * 
     * @param int $id
     */
    public function validateComment($id) {
        $id = trim($id, "'");        
        $sql = $this->db->prepare("UPDATE comments SET alert_signal=0 WHERE id=?");
        $sql->execute(array(
            $id
        ));
        return $sql;    
    }

    /**
     * Disable the comment, it remains in the database however
     * 
     * @param int $id
     */
    public function disableComment($id) {
        $id = trim($id, "'");        
        $sql = $this->db->prepare("UPDATE comments SET status=0, alert_signal=0 WHERE id=?");
        $sql->execute(array(
            $id
        ));
        return $sql; 
    }

    /**
     * Delete the comment
     * 
     * @param int $id
     */
    public function deleteComment($id) {
        $id = trim($id, "'");
        $sql = $this->db->prepare("DELETE FROM comments WHERE id=?");
        $sql->execute(array(
            $id
        ));
        return $sql; 
    }
}