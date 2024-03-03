<?php
// ricostruisco la task da aggiungere
$update_task = [
    'text' => $_POST['text'],
    'done' => $_POST['done'] === 'true',
];

// recupero l'indice
$update_task_index = (int)$_POST['index'];

// recupero il contenuto json
$json_todolist = file_get_contents('../data/toDoList.json');

// lo trasformo in array
$task_list = json_decode($json_todolist, true);

// aggiungo la task modificata con il suo indice
$task_list[$update_task_index] = $update_task;

// trasformo l'array in json
$json_result = json_encode($task_list);

// lo salvo nel file json
file_put_contents('../data/toDoList.json', $json_result);

// avviso il browser che ivierò del json e lo stampo
header('Content-Type: application/json');
echo $json_result;


