<?php

include_once "../conexao/conf.inc.php";
try {
    $conexao = new PDO(MYSQL_DSN, DB_USER, DB_PASSWORD);

    //query
    if (isset($_GET['pesquisa'])) {
        if ($_GET['pesquisa'] != '') {
            $query = 'SELECT id, nome, sobrenome, telefone, origem, social FROM contatos WHERE nome LIKE :pesquisa OR sobrenome LIKE :pesquisa';
        } else {
            $query = 'SELECT id, nome, sobrenome, telefone, origem, social FROM contatos';
        }
    } else {
        $query = 'SELECT id, nome, sobrenome, telefone, origem, social FROM contatos';
    }
    //preparar consulta
    $stmt = $conexao->prepare($query);
    if (isset($_GET['pesquisa'])) {
        if ($_GET['pesquisa'] != '') {
            $stmt->bindValue(':pesquisa', "%" . $_GET['pesquisa'], PDO::PARAM_STR);
        }
    }
    //executar
    $stmt->execute();
    $result = $stmt->fetchAll();
} catch (PDOException $e) {
    print('Erro  ao conectar como banco  de dados... <br>' . $e->getMessage());
    die();
}
