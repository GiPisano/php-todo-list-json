<?php

$new_task = [
    'text' => $_POST['text'],
    'done' => $_POST['done'] === true,
];

$json_todolist = file_get_contents('../data/toDoList.json');

$task_list = json_decode($json_todolist, true);

$task_list[] = $new_task;

$json_result = json_encode($task_list);

file_put_contents('../data/toDoList.json', $json_result);

header('Content-Type: application/json');
echo $json_result;
