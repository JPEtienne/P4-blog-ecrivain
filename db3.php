<?php
require_once('config.inc.php');

$db = mysqli_connect($host,$user,$password,$dbName);
if (mysqli_connect_error()) {
    echo 'erreur de connexion'.mysqli_connect_error();
}