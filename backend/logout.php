<?php
require 'cors.php';
require 'Database.php';
$obj = new Database();
$user = $obj->query("UPDATE users SET is_auth = 0 WHERE is_auth = 1");
