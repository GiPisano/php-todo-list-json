<?php

// recupero il contenuto json
$json_todolist = file_get_contents('../data/toDoList.json');

// lo trasformo in array
$task_list = json_decode($json_todolist, true);

// recupero l'indice
$delete_task_index = (int)$_POST['index'];

// elimino l'elemento dall'array
unset($task_list[$delete_task_index]);

// Scrivo l'array aggiornato nel file JSON
$json_result = json_encode(array_values($task_list));

// lo salvo nel file json
file_put_contents('../data/toDoList.json', $json_result);

// avviso il browser che ivierò del json e lo stampo
header('Content-Type: application/json');
echo $json_result;
