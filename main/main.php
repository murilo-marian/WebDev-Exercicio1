<!DOCTYPE html>
<?php
include "showTable.php";
?>


<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Agenda de Contatos</title>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="../imagens/favicon-svg.svg" />
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../main/main.php">
                <img src="../imagens/person-square.svg" alt="" width="50" height="24" class="d-inline-block align-text-top" />Contatos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../add/add.php">Adicionar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main">
        <header class="cabeca">
            <h1>Contatos</h1>
        </header>
        <div>
            Seus dados
            <ul>
                <li>Nome: Murilo</li>
                <li>Telefone: 123123123123</li>
                <li>Email: teste@gmail.com</li>
            </ul>
        </div>
        <form action="main.php" method="get" class="mb-3 col-md-2">
            <div class="form-floating">
                <input type="text" class="form-control" name="pesquisa" id="pesquisa" placeholder="Nome ou Sobrenome">
                <label for="pesquisa" class="">Pesquisa</label>
            </div>
            <button class=" mt-2 btn btn-primary" type="submit">Pesquisar</button>
        </form>
        <div class="row">
            <div class="col-md-7 table-responsive">
                <caption>
                    Contatos
                </caption>
                <table class="table mt-1 table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>Telefone</th>
                            <th>Origem</th>
                            <th>Social</th>
                            <th>Alterar</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        foreach ($result as $dado) { ?>
                            <tr>
                                <td> <?= $dado['id']; ?> </td>
                                <td> <?= $dado['nome']; ?> </td>
                                <td> <?= $dado['sobrenome']; ?> </td>
                                <td> <?= $dado['telefone']; ?> </td>
                                <td> <?= $dado['origem']; ?> </td>
                                <td> <?= $dado['social']; ?> </td>
                                <td><a href="../add/add.php?id=<?= $dado['id']; ?>">Edit</a></td>
                                <td><a href="delete.php?id=<?= $dado['id']; ?>">Del</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3 mb-3">
                <p class="mb-1">Números de Emergência</p>
                <ol class="list-group">
                    <li class="list-group-item">181 - Polícia Civil</li>
                    <li class="list-group-item">190 - Polícia Militar</li>
                    <li class="list-group-item">
                        191 - Polícia Rodoviária Federal
                    </li>
                    <li class="list-group-item">192 - SAMU</li>
                    <li class="list-group-item">
                        193 - Corpo de Bombeiros
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>