<?php 

$mysql = new mysqli('localhost', 'root', 'root', 'test');
$_POST = json_decode(file_get_contents('php://input'), true);
$task = $_POST['id'];

$mysql->query("DELETE FROM tasks WHERE id = '$task'");

$res = $mysql->query("SELECT * FROM tasks");

$tasks = [];

while ($row = $res->fetch_assoc()) {
    $tasks[] = $row;
}

echo json_encode($tasks);
?>