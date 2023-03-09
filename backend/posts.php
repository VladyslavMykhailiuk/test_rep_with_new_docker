<?php
require 'cors.php';
require 'Database.php';
$obj = new Database();
$posts = $obj->query("SELECT * FROM posts");
echo json_encode($posts);



