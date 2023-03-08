<?php
require 'cors.php';
require 'Database.php';
$obj = new Database();
$currentId = $_GET['id'];
$obj->query("DELETE  FROM posts WHERE id= $currentId ");
