<?php

function carregarDados()
{
    if (isset($_POST['id'])) {
        $ID = $_POST['id'];
    } else {
        $ID = 0;
    }
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $origem = $_POST['origem'];
    $data = $_POST['nascimento'];
    $idade = $_POST['idade'];
    $social = $_POST['social'];
    $genero = $_POST['sexo'];
    $parente = isset($_POST['parente']) ? $_POST['parente'] : "off";

    $dados = array('ID' => $ID, 'Nome' => $nome, 'Sobrenome' => $sobrenome, 'Telefone' => $telefone, 'Email' => $email, 'Origem' => $origem, 'Data' => $data, 'Idade' => $idade, 'Social' => $social, 'Genero' => $genero, 'Parente' => $parente);

    return $dados;
}

$acao = isset($_POST['acao']) ? $_POST['acao'] : '';

if ($acao == 'salvar') {

    $contato = carregarDados();
    if ($contato['ID'] == 0) {
        insere($contato);
        header('location: ../main/main.php');
    } else {
        alterar($contato);
        header('location: ../main/main.php');
    }
} else {
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    $id = isset($_GET['ID']) ? $_GET['ID'] : '';

    if ($acao == 'excluir') {
        excluir($id);
    } else if ($acao == 'editar') {
        $contato = buscaContato($id);
    }
}


function buscaContato($id)
{
    $dados = puxaDadosJSON();
    foreach ($dados as $contato) {
        if ($contato['ID'] == $id)
            return $contato;
    }
}

function puxaDadosJSON()
{
    $dadosAtuais = file_get_contents('contatos.json', true);
    $dadosArray = json_decode($dadosAtuais, true);
    return $dadosArray;
}

function insere($dados)
{
    $dadosCompletos = puxaDadosJSON();

    $dados['ID'] = proximoID($dadosCompletos);
    $dadosCompletos[] = $dados;

    $caminho = fopen('contatos.json', 'w+');
    fwrite($caminho, json_encode($dadosCompletos, JSON_PRETTY_PRINT));
}

function proximoID($dados)
{
    $id = 0;
    if ($dados)
        $id = intval($dados[count($dados) - 1]['ID']);
    return ++$id;
}

function alterar($alterado)
{
    $dados = puxaDadosJSON();
    $caminho = fopen('contatos.json', 'w+');
    $i = 0;
    foreach ($dados as $contato) {
        if ($contato['ID'] == $alterado['ID'])
            break;
        else
            $i++;
    }
    array_splice($dados, $i, 1, array($alterado));
    fwrite($caminho, json_encode($dados, JSON_PRETTY_PRINT));
}

function excluir($id)
{
    $dados = puxaDadosJSON();
    $caminho = fopen('../add/contatos.json', 'w+');
    $i = 0;
    foreach ($dados as $contato) {
        if ($contato['ID'] == $id)
            break;
        else
            $i++;
    }
    array_splice($dados, $i, 1);
    fwrite($caminho, json_encode($dados, JSON_PRETTY_PRINT));
}
