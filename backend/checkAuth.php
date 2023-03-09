<?php
require 'cors.php';
require 'Database.php';
$obj = new Database();
$user = $obj->query("SELECT * FROM users WHERE is_auth = 1");

if($user) {
    echo '1240436346340';
}