<?php
require 'cors.php';
require 'Database.php';
$obj = new Database();
$currentId = $_GET['id'];
$post = $obj->query("SELECT * FROM posts WHERE id= $currentId");
echo json_encode($post);