
<?php
$todoFile = 'todos.json';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   
    echo file_get_contents($todoFile);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $input = json_decode(file_get_contents('php://input'), true);
    $newTodo = $input['todo'];

    
    $todos = json_decode(file_get_contents($todoFile), true);
    $todos[] = $newTodo;

    
    file_put_contents($todoFile, json_encode($todos));

    
    echo json_encode(["success" => true]);
}
?>