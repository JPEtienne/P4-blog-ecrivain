<?php 

class Info {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getInfo() {
        $sql = $this->db->query("SELECT * FROM info WHERE id = 1");
        return $sql;
    }

    public function updateInfo($name, $phone, $mail, $job, $description) {
        $sql = $this->db->prepare("UPDATE info SET name = ?, phone = ?, mail = ?, job = ?, description = ? WHERE id = 1");
        $sql->execute(array(
            $name,
            $phone,
            $mail,
            $job,
            $description
        ));
        return $sql;
    }
}