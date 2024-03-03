<?php

// ricostruisco la task da aggiungere
$new_task = [
    'text' => $_POST['text'],
    'done' => $_POST['done'] === true,
];

// recupero il contenuto json
$json_todolist = file_get_contents('../data/toDoList.json');

// lo trasformo in array
$task_list = json_decode($json_todolist, true);

// aggiungo la nuova task alla task list
$task_list[] = $new_task;

// trasformo l'array in json
$json_result = json_encode($task_list);

// lo salvo nel file json
file_put_contents('../data/toDoList.json', $json_result);

// avviso il browser che ivierò del json e lo stampo
header('Content-Type: application/json');
echo $json_result;
