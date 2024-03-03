<?php

$update_task = [
    'text' => $_POST['text'],
    'done' => $_POST['done'] === 'true',
];

$update_task_index = (int)$_POST['index'];

$json_todolist = file_get_contents('../data/toDoList.json');

$task_list = json_decode($json_todolist, true);

$task_list[$update_task_index] = $update_task;

$json_result = json_encode($task_list);

file_put_contents('../data/toDoList.json', $json_result);

header('Content-Type: application/json');

echo $json_result;


