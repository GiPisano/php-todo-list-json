<?php

$json_todolist = file_get_contents('../data/toDoList.json');

$task_list = json_decode($json_todolist, true);

$delete_task_index = (int)$_POST['index'];


if (isset($task_list[$delete_task_index])) {
    unset($task_list[$delete_task_index]);
}

$json_result = json_encode(array_values($task_list));

file_put_contents('../data/toDoList.json', $json_result);

header('Content-Type: application/json');

echo $json_result;
