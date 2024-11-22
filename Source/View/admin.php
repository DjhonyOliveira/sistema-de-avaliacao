<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Sistema de Avaliações</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="shared/styles/admin.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand"><?= $nameAdmin ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item home">
                    <a class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link setores">Setores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link usuarios">Usuários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link perguntas">Perguntas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link metricas">Métricas</a>
                </li>
            </ul>
            <span class="navbar-text ml-auto user-info">
                <?= $user->usrname ?>
            </span>
            <button class="btn btn-danger logout-btn">Logout</button>
        </div>
    </nav>
    <div class="container main-container">

        <div id="logo" class="hospital-name empty-screen">
            Hospital Regional
        </div>
        
        <!-- Métricas -->
        <div id="metricas" class="content-section">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="metrics-box">
                        <h3 class="text-center">Métricas de Avaliação</h3>
                        <p class="text-center">Selecione o setor para visualizar as métricas de atendimento hospitalar.</p>
                        <form>
                            <div class="form-group">
                                <label for="setorSelect">Escolha o setor:</label>
                                <select class="form-control" id="setorSelect">
                                    <option value="setor1">Setor 1 - Emergência</option>
                                    <option value="setor2">Setor 2 - UTI</option>
                                    <option value="setor3">Setor 3 - Consultórios</option>
                                </select>
                            </div>
                        </form>
                        <div class="text-center">
                            <button class="btn btn-primary">Ver Métricas</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Setores -->
        <div id="setores" class="content-section">
            <div class="row justify-content-center mt-4">
                <div class="col-md-3">
                    <h5>Cadastro de Setores</h5>
                    <ul class="list-group">
                        <li class="list-group-item">Setor 1 - Emergência</li>
                        <li class="list-group-item">Setor 2 - UTI</li>
                        <li class="list-group-item">Setor 3 - Consultórios</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Usuários -->
        <div id="usuarios" class="content-section">
            <div class="row justify-content-center mt-4">
                <div class="col-md-3">
                    <h5>Usuários</h5>
                    <ul class="list-group">
                        <li class="list-group-item">Usuário 1</li>
                        <li class="list-group-item">Usuário 2</li>
                        <li class="list-group-item">Usuário 3</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Perguntas -->
        <div id="perguntas" class="content-section">
            <div class="row justify-content-center mt-4">
                <div class="col-md-3">
                    <h5>Perguntas</h5>
                    <ul class="list-group">
                        <li class="list-group-item">Pergunta 1</li>
                        <li class="list-group-item">Pergunta 2</li>
                        <li class="list-group-item">Pergunta 3</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="shared/scripts/jquery-3.7.1.min.js"></script>
    <script src="shared/scripts/admin.js"></script>
</body>
</html>


