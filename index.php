<?php
error_reporting(~E_NOTICE);
$controller = $_GET['c'] ?? 'Post'; // Default controllernya adalah Post, jika tidak ada nilai c
$method = $_GET['m'] ?? 'index'; // Default methodnya adalah index, jika tidak ada nilaii m

include_once "controller/Controller.class.php"; // Berisi Controller class
include_once "controller/$controller.class.php"; // Berisi class controller yang sesuai
(new $controller)->$method(); // Membuat objek baru dari controller lalu menjalankan method yang sesuai