<?php
require_once 'dao/EstadoDAO.php';
$dao = EstadoDAO::getInstance();
$estados = $dao->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estados</title>
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
    <section class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0">Estados</h2>
            <a href="estado_cad.php" class="btn btn-primary btn-sm">Novo Estado</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered mb-0">
                    <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Sigla</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($estados as $estado): ?>
                        <tr>
                            <td><?= $estado['id'] ?></td>
                            <td><?= htmlspecialchars($estado['nome']) ?></td>
                            <td><?= htmlspecialchars($estado['sigla']) ?></td>
                            <td>
                                <a href="estado_cad.php?id=<?= $estado['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="estado_acao.php?acao=Excluir&id=<?= $estado['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
<footer class="bg-dark text-white text-center py-3 mt-auto">
    <p class="mb-0">&copy; 2026 - Trabalho Final</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>