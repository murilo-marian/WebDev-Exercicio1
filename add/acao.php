<?php

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$origem = $_POST['origem'];
$data = $_POST['nascimento'];
$social = $_POST['social'];
$genero = $_POST['sexo'];
$parente = isset($_POST['parente']) ? $_POST['parente'] : "off";

$dados = array('Nome' => $nome, 'Sobrenome' => $sobrenome, 'Telefone' => $telefone, 'Email' => $email, 'Origem' => $origem, 'Data' => $telefone, 'Social' => $social, 'Genero' => $genero, 'Parente' => $parente);

header('location: ../main/main.php');

$dadosAtuais = file_get_contents('contatos.json');
$dadosArray = json_decode($dadosAtuais, true);
$dadosArray[] = $dados;

$caminho = fopen('contatos.json', 'w+');

fwrite($caminho, json_encode($dadosArray));
