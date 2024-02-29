<?php

$json_todolist = file_get_contents('../data/toDoList.json');

$todolist_array = json_decode($json_todolist);

$todolist_array[] = $_POST['item'];
// var_dump($todolist_array);

$json_result = json_encode($todolist_array);

file_put_contents('../data/toDoList.json', $json_result);

header('Content-Type: application/json');

echo $json_result;