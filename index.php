<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Biblioteca</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="style.css" rel="stylesheet">
</head>
<body class="bg-light">

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Meu Catálogo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="livro_list.php">Livros</a></li>
                    <li class="nav-item"><a class="nav-link" href="pessoa_list.php">Pessoas</a></li>
                    <li class="nav-item"><a class="nav-link" href="cidade_list.php">Cidades</a></li>
                    <li class="nav-item"><a class="nav-link" href="estado_list.php">Estados</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main class="container mt-5">
    <section class="text-center">
        <h1>Bem-vindo ao Catálogo</h1>
        <p class="lead">Gerencie livros, pessoas e empréstimos de forma simples.</p>
    </section>
</main>

<footer class="bg-dark text-white text-center py-3 mt-5 fixed-bottom">
    <p class="mb-0">&copy; 2026 - Trabalho Final de DevWeb</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>