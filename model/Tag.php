<?php
class Tag {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Show all tags 
     */
    public function getAllTags() {
        $sql = $this->db->query("SELECT * FROM tags");
        return $sql;
    }

    /**
     * Add a new tag 
     * 
     * @param string $tag
     */
    public function addTag($tag) {
        $sql = $this->db->prepare("INSERT INTO tags(tag) VALUES (?)");
        $sql->execute(array(
            $tag
        ));
    }

    /**
     * Delete the tag
     * 
     * @param int $id
     */
    public function deleteTag($id) {
        $sql = $this->db->prepare("DELETE FROM tags WHERE id=?");
        $sql->execute(array(
            $id
        ));
        return $result; 
    }
}