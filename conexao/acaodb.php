<?php

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

if ($nome != "" && $senha != "" && $email != "") {
    include_once "conf.inc.php";

    try {
        $conexao = new PDO(MYSQL_DSN, DB_USER, DB_PASSWORD);

        //query

        $query = 'INSERT INTO usuario(nome, email, senha) values (:nome, :email, :senha)';
        //preparar consulta
        $stmt = $conexao->prepare($query);
        //vincular variaveis de consulta
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        //executar
        $stmt->execute();
    } catch (PDOException $e) {
        print('Erro  ao conectar como banco  de dados... <br>' . $e->getMessage());
        die();
    }
}
