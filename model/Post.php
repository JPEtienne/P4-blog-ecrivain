<?php
include($_SERVER['DOCUMENT_ROOT'].'/functions/functions.php');

class Post {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Add a new post
     * 
     * @param string $title
     * @param string $description
     * @param string $image
     * @param int $date
     * @param string $slug
     */
    public function addPost ($title, $description, $image, $date, $slug) {
        $sql = $this->db->prepare("INSERT INTO posts(title, description, image, created_at, slug) VALUES (?, ?, ?, ?, ?)");
        $sql->execute(array(
            $title,
            $description,
            $image,
            $date,
            $slug
        ));
       if ($sql) {
            if ($_POST['tags']) {
                $tags = $_POST['tags'];
                $lastInsertedId = $this->db->lastInsertId();
                foreach($tags as $tag) {
                    $sql = $this->db->prepare("INSERT INTO post_tag(post_id, tag_id) VALUES (?, ?)");
                    $sql->execute(array(
                        $lastInsertedId,
                        $tag
                    ));
                }
            }
        }
        return $sql;
    }

    /**
     * Search by keyword for a post
     * 
     * @param string $keyword
     */
    public function search($keyword) {
        $sql = $this->db->prepare("SELECT * FROM posts
                WHERE title LIKE ?
                OR description LIKE ?");
        $sql->execute(array(
            "%$keyword%",
            "%$keyword%"
        ));
        return $sql;
    }

    /**
     * Show the posts on the page by GET variables
     */
    public function getPost() {
        //By page
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $limit = 4;
            $startPage = $limit * ($page - 1);
            $sql = $this->db->query("SELECT * FROM posts ORDER BY id DESC LIMIT $limit OFFSET $startPage");
            return $sql;  
        }

        // By search
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            return $this->search($keyword);
        }

        // By tag
        if (isset($_GET['tag'])) {
            $tag = $_GET['tag'];
            $sql = $this->db->prepare("SELECT * FROM posts 
                    INNER JOIN post_tag ON posts.id = post_tag.post_id
                    INNER JOIN tags ON tags.id = post_tag.tag_id
                    WHERE tags.tag = ?");
            $sql->execute(array(
                $tag
            ));
            return $sql;
        } else {
            $sql = $this->db->query("SELECT * FROM posts");
            return $sql;
        }
    }
    
    /**
     * Count the total of posts
     */
    public function countPostPages() {
        $sql = $this->db->query("SELECT id FROM posts");
        return $row = $sql->rowCount();
    }

    /**
     * Show the post selected
     * 
     * @param string $slug
     */
    public function getSinglePost($slug) {
        $sql = $this->db->prepare("SELECT *  FROM posts WHERE slug=?");
        $sql->execute(array(
            $slug
        ));
        return $sql;        
    }

    /**
     * Update the post
     * 
     * @param string $title
     * @param string $description
     * @param string $slug
     */
    public function updatePost($title, $description, $slug) {
        $newImage = $_FILES['image']['name'];
        if (!empty($newImage)) {
            $image = uploadImage();
            $sql = $this->db->prepare("UPDATE posts SET title = ?, description = ?, image = ? WHERE slug = ?");
            $sql->execute(array(
                $title,
                $description,
                $image,
                $slug
            ));
            return $sql;        
        } else {
            $sql = $this->db->prepare("UPDATE posts SET title = ?, description = ? WHERE slug = ?");
            $sql->execute(array(
                $title,
                $description,
                $slug
            ));
            return $sql; 
        }
    }

    /**
     * Delete the post wanted
     * 
     * @param string $slug
     */
    public function deletePostBySlug($slug) {
        $sql = $this->db->prepare("DELETE FROM posts WHERE slug=?");
        $sql->execute(array(
            $slug
        ));
        return $sql; 
    }

    /**
     * Get the top 5 posts by the number of comments on them
     */
    public function getPopularPosts() {
        $sql = $this->db->query("SELECT * FROM posts 
                LEFT JOIN comments ON posts.slug=comments.slug 
                WHERE comments.slug IS NOT NULL
                GROUP BY comments.slug 
                ORDER BY count(comments.slug) 
                DESC LIMIT 5");
        return $sql; 
    }

    /**
     * Check if there's duplicate slug, used when adding a post
     */
    public function checkPostSlug($slug) {
        $sql = $this->db->prepare("SELECT * FROM posts WHERE slug=?");
        $sql->execute(array(
            $slug
        ));
        if ($sql->rowCount() >= 1) {
            return false;
        } else {
            return true;
        }
    }
}