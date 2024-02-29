<?php

$json_list = file_get_contents('../data/toDoList.json');

header('Content-Type: application/json');

echo $json_list;