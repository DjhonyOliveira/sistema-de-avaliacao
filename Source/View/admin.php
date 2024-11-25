<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Sistema de Avaliações</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="shared/images/cruz-vermelha.png" type="image/x-icon">
    <link rel="stylesheet" href="shared/styles/admin.css">
    <link rel="stylesheet" href="shared/styles/message.css">
</head>
<body>
    <!-- Barra de navegação -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand"><?= $nameAdmin ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link home" data-name="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link setores" data-name="setores">Setores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link usuarios" data-name="usuarios">Usuários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link perguntas" data-name="perguntas">Perguntas</a>
                </li>
            </ul>
            <span class="navbar-text ml-auto user-info">
                <?= $user->usrname ?>
            </span>
            <button class="btn btn-danger logout-btn">Sair</button>
        </div>
    </nav>
    <!-- Conteudo -->
    <div class="container main-container">
    <div class="ajax_response"></div>
        <!-- Logo do sistema ao centro da tela -->
        <div id="logo" class="hospital-name empty-screen">
            <?= $nameAdmin ?>
        </div>

        <!-- Setores -->
        <div id="setores" class="content-section">
            <!-- Container de insert -->
            <div class="container mt-5">
                <h3>Criar Setor</h3>
                <div class="row">               
                    <div class="form-floating col-md-3 mb-3">
                        <input type="text" class="form-control" id="setor" name="setor" placeholder="Setor" required>
                    </div>
                    <div class="col-md-1 mb-3 d-flex align-items-end">
                        <button type="submit" id="criarSetor" class="btn btn-primary w-100">Criar</button>
                    </div>
                </div>
                <hr>
            </div>

            <!-- lista de Setores -->
            <div class="row justify-content-center mt-4">
                <h5>Setores</h5>
                <?= montaTable(['Setor'], $buscaSetores, 'setDelete') ?>
            </div>
        </div>

        <!-- Usuários -->
        <div id="usuarios" class="content-section">
            <!-- Container de insert -->
            <div class="container mt-5">
                <h3>Criar Usuário</h3>
                <div class="row">               
                    <div class="form-floating col-md-3 mb-3">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Nome" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="email" class="form-control" id="useremail" name="email" placeholder="E-Mail" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="password" class="form-control" id="userpassword" name="password" placeholder="Senha" required>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" id="usersetor" name="setor" required>
                            <option value="" selected disabled>Setor</option>
                            <?php foreach($setores as $idSetor => $nomeSetor): ?>
                                <option value="<?= $idSetor ?>"><?= $nomeSetor ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-md-1 mb-3 d-flex align-items-end">
                        <button type="submit" id="criarUsuario" class="btn btn-primary w-100">Criar</button>
                    </div>
                </div>
                <hr>
            </div>

            <!-- Lista de usuarios -->
            <div class="row justify-content-center mt-4">
                <h5>Usuários</h5>
                <?= montaTable(['Nome', 'E-mail', 'Setor'], $buscaUsuarios, 'userDelete') ?>
            </div>
        </div>

        <!-- Perguntas -->
        <div id="perguntas" class="content-section">
            <!-- Container de insert -->                                
            <div class="container mt-5">
                <h3>Criar Perguntas</h3>
                <div class="row">               
                    <div class="form-floating col-md-3 mb-3">
                        <input type="text" class="form-control" id="pergunta" name="pergunta" placeholder="Pergunta" required>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" id="setorPergunta" name="setor" required>
                            <option value="" selected disabled>Escolha um setor...</option>
                            <?php foreach($setores as $idSetor => $nomeSetor): ?>
                                <?php if($idSetor != 1): ?>
                                    <option value="<?= $idSetor ?>"><?= $nomeSetor ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-1 mb-3 d-flex align-items-end">
                        <button type="submit" id="criarPergunta" class="btn btn-primary w-100">Criar</button>
                    </div>
                </div>
                <hr>
            </div>
            <!-- lista de Perguntas -->
            <div class="row justify-content-center mt-4">
                <h5>Perguntas</h5>
                <?= montaTable(['Pergunta', 'Setor'], $buscaPerguntas, 'perDelete') ?>
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


