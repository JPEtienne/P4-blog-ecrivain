<?php
class Tag {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllTags() {
        $sql = $this->db->query("SELECT * FROM tags");
        return $sql;
    }

    public function addTag($tag) {
        $sql = $this->db->prepare("INSERT INTO tags(tag) VALUES (?)");
        $sql->execute(array(
            $tag
        ));
    }

    public function deleteTag($id) {
        $sql = $this->db->prepare("DELETE FROM tags WHERE id=?");
        $sql->execute(array(
            $id
        ));
        return $result; 
    }
}