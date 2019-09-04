<?php 

class Info {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    /**
     * Get the info the the page 'à propos'
     */
    public function getInfo() {
        $sql = $this->db->query("SELECT * FROM info WHERE id = 1");
        return $sql;
    }

    /**
     * update the infos
     * 
     * @param string $name
     * @param int $phone
     * @param string $mail
     * @param string $job
     * @param string $description
     */
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