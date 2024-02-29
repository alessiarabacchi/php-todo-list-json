<?php
$todoFile = 'todos.json';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo file_get_contents($todoFile);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $todos = json_decode(file_get_contents($todoFile), true);
    $todos[] = $input['todo'];
    file_put_contents($todoFile, json_encode($todos));
}
