<?php
require_once 'dao/EstadoDAO.php';

$id = $_GET['id'] ?? null;
$estado = ['id' => '', 'nome' => '', 'sigla' => ''];

$dao = EstadoDAO::getInstance();
if ($id) {
    $estado = $dao->obter($id);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $id ? 'Editar' : 'Novo' ?> Estado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100">
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">Catálogo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="livro_list.php">Livros</a></li>
                    <li class="nav-item"><a class="nav-link" href="pessoa_list.php">Pessoas</a></li>
                    <li class="nav-item"><a class="nav-link" href="cidade_list.php">Cidades</a></li>
                    <li class="nav-item"><a class="nav-link active" href="estado_list.php">Estados</a></li>
                    <li class="nav-item"><a class="nav-link" href="pessoalivro_list.php">Empréstimos</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main class="container">
    <section class="card shadow-sm col-md-8 offset-md-2">
        <div class="card-header bg-primary text-white">
            <h2 class="h5 mb-0"><?= $id ? 'Editar' : 'Novo' ?> Estado</h2>
        </div>
        <div class="card-body">
            <form action="estado_acao.php" method="POST">
                <input type="hidden" name="acao" value="<?= $id ? 'Alterar' : 'Salvar' ?>">
                <input type="hidden" name="id" value="<?= $estado['id'] ?>">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Estado:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($estado['nome']) ?>" required>
                </div>
                <div class="mb-4">
                    <label for="sigla" class="form-label">Sigla:</label>
                    <input type="text" class="form-control" id="sigla" name="sigla" value="<?= htmlspecialchars($estado['sigla']) ?>" required maxlength="2">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="estado_list.php" class="btn btn-outline-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </section>
</main>
<footer class="bg-dark text-white text-center py-3 mt-auto">
    <p class="mb-0">&copy; 2026 - Trabalho Final</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>