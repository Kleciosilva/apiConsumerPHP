<?php

require_once('APIConsumer.php');

// Exemplo de uso
$api = new APIConsumer("https://jsonplaceholder.typicode.com/users");
// Criar um novo registro
$new_data = ['name' => 'Novo Registro', 'value' => 100];
$response = $api->create($new_data);
var_dump($response);

// Ler todos os registros
$response = $api->read();
var_dump($response);

// Ler um registro específico pelo ID
$id = 1;
$response = $api->read($id);
var_dump($response);

// Atualizar um registro existente
$id = 1;
$update_data = ['name' => 'Registro Atualizado', 'value' => 200];
$response = $api->update($id, $update_data);
var_dump($response);

// Deletar um registro
$id = 1;
$response = $api->delete($id);
var_dump($response);
