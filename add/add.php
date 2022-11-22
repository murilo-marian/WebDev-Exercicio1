<!DOCTYPE html>
<?php
if (isset($_GET['id'])) {
    include_once '../main/edit.php';
}
?>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Adicionar Contatos</title>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="../imagens/favicon-svg.svg" />
    <script src="script.js"></script>
</head>

<body>
    <nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-light">
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
            <h1>Adicionar</h1>
        </header>
        <fieldset>
            <form class="row g-3 align-items-center" action="acao.php?acao=<?= isset($_GET['id']) ? 'editar&id=' . $result['id']  : 'salvar'; ?>" method="post">
                <div>
                    <label for="id" class="form-label">ID</label>
                    <input type="text" name="id" id="id" readonly value="<?= isset($result['id']) ? $result['id'] : '' ?>">
                </div>
                <div class="col-md-2">
                    <label for="name" class="form-label">Nome</label>
                    <input required name="nome" type="text" value="<?= isset($result['nome']) ? $result['nome'] : '' ?>" class="form-control" id="name" onblur="formataTexto('name')" />
                </div>
                <div class="col-md-3">
                    <label for="surname" class="form-label">Sobrenome</label>
                    <input required name="sobrenome" type="text" value="<?= isset($result['sobrenome']) ? $result['sobrenome'] : '' ?>" class="form-control" id="surname" onblur="formataTexto('surname')" />
                </div>

                <div class="col-md-2">
                    <label for="tele" class="form-label">Telefone</label>
                    <input name="telefone" type="tel" value="<?= isset($result['telefone']) ? $result['telefone'] : '' ?>" required class="form-control" id="tele" onblur="formataTelefone('tele')" />
                </div>

                <div class="col-md-3">
                    <label for="exampleInputEmail1" class="form-label">Endereço de Email</label>
                    <input required name="email" type="email" value="<?= isset($result['email']) ? $result['email'] : '' ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="origem">Origem</label>
                    <select class="form-select" name="origem" id="origem" required>
                        <option value="Escola" <?php if (isset($result) and $result['origem'] == 'Escola') echo 'selected'; ?>>Escola</option>
                        <option value="Trabalho" <?php if (isset($result) and $result['origem'] == 'Trabalho') echo 'selected'; ?>>Trabalho</option>
                        <option value="Bar" <?php if (isset($result) and $result['origem'] == 'Bar') echo 'selected'; ?>>Bar</option>
                        <option value="Clube do Livro" <?php if (isset($result) and $result['origem'] == 'Clube do Livro') echo 'selected'; ?>>
                            Clube do Livro
                        </option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="nascimento">Data de Nascimento</label>
                    <input value="<?= isset($result['nascimento']) ? $result['nascimento'] : '' ?>" onchange="calcularIdade()" required class="form-control" id="nascimento" name="nascimento" type="date" />
                </div>
                <div class="col-md-1">
                    <label class="form-label" for="idade">Idade</label>
                    <input readonly required value="<?= isset($result['idade']) ? $result['idade'] : '' ?>" class="form-control" type="number" name="idade" id="idade" />
                </div>

                <div class="col-md-4">
                    <label class="form-label" for="foto">Foto</label>
                    <input class="form-control" type="file" name="foto" id="foto" />
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="social">Rede Social</label>
                    <input required class="form-control" value="<?= isset($result['social']) ? $result['social'] : '' ?>" type="text" name="social" id="social" />
                </div>
                <div class="col-md-1">
                    <div class="form-check">
                        <input required class="form-check-input" <?php if (isset($result) and $result['sexo'] == '1') echo 'checked'; ?> value="1" type="radio" name="sexo" id="masculino" />
                        <label for="masculino">Masculino</label>
                    </div>
                    <div class="form-check">
                        <input required class="form-check-input" <?php if (isset($result) and $result['sexo'] == '2') echo 'checked'; ?> value="2" type="radio" name="sexo" id="feminino" />
                        <label for="feminino">Feminino</label>
                    </div>
                    <div class="form-check">
                        <input required class="form-check-input" <?php if (isset($result) and $result['sexo'] == '0') echo 'checked'; ?> value="0" type="radio" name="sexo" id="outro" />
                        <label for="outro">Outro</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" <?php if (isset($result) and $result['parente'] == 'on') echo 'checked'; ?> id="parente" name="parente" type="checkbox" />
                        <label class="form-check-label" for="parente">Parente</label>
                    </div>
                </div>
                <div class="mb-2 add-input">
                    <input class="btn btn-primary" name="acao" value="salvar" type="submit" />
                </div>
            </form>
        </fieldset>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- 
        <script>
            const form = document.querySelector("form");
            form.addEventListener("submit", (e) => pegaSubmit(e));
        </script> -->
</body>
<footer></footer>

</html>