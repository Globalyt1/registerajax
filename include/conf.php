<?php 

$server = "localhost";
$username = "root";
$pass = "root";
$database = "test";

// Создаю подключение
$con = new mysqli($server, $username, $pass, $database);

// Проверяю на подключение
if($con->connect_error) {
    die("Ошибка подключении" . $con->connect_error);
}

?>