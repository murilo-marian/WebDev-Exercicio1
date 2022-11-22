<?php

include_once "../conexao/conf.inc.php";
try {
    $conexao = new PDO(MYSQL_DSN, DB_USER, DB_PASSWORD);

    //query

    $id = $_GET['id'];

    $query = 'DELETE FROM contatos WHERE id = :id';
    //preparar consulta
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':id', $id);
    //executar
    $stmt->execute();
    $result = $stmt->fetchAll();
    header('location: main.php');
} catch (PDOException $e) {
    print('Erro  ao conectar como banco  de dados... <br>' . $e->getMessage());
    die();
}
