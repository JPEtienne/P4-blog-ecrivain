<?php
require_once ('DB2.php');
try {
	$db = DB::getInstance();
	$stmt = $db->query("SELECT * FROM users");
    $user = $stmt->fetch();
    print_r($user);
  
} catch (Exception $e) {
	print $e->getMessage();
  
}