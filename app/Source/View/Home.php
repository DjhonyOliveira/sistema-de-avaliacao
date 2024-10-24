<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial - Sistema Hospitalar</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="shared/styles/home.css">
</head>
<body>
    <div class="main-container">
        <h1 class="text-center mb-4">Bem-vindo ao Sistema Hospitalar</h1>
        <a href="<?= url("/avaliacao")?>" class="btn btn-secondary btn-custom">Avaliar Serviços</a>
        <a href="<?= url("/login") ?>" class="btn btn-primary btn-custom">Login</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
