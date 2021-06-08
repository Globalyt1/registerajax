<?php
$login = $_POST['login'];
$password = $_POST['password'];
$name = $_POST['name'];


echo "login: $login, password: $password, mame: $name";
$mysql = new mysqli('localhost', 'root', 'php');
if ($mysql->connect_errno) {
    die($mysql->connect_error);
}
$query = "INSERT INTO users (login, password, name) VALUES('$login', '$password', '$name')";

if ($res) {
    echo '<br>Вы успешно зарегистрировались';
} else {
    echo '<br>' . $mysql->error;
}