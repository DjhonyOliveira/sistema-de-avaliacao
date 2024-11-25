<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção de Setores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="shared/images/cruz-vermelha.png" type="image/x-icon">
    <link rel="stylesheet" href="shared/styles/home.css">
    <link rel="stylesheet" href="shared/styles/message.css">
</head>
<body>
    <div class="mensagem"></div>
    <div class="container">
        <h1 class="mb-4">Selecione o Setor do Hospital Que Deseja Avaliar</h1>
    <div class="mb-3">
        <select id="setor" class="form-select" aria-label="Seleção de Setor" style="width: 50%; margin: 0 auto;">
            <option value="" selected disabled>Escolha um setor...</option>
            <?php foreach($setores as $idSetor => $nomeSetor): ?>
                <?php if($idSetor != 1): ?>
                    <option value="<?= $idSetor ?>"><?= $nomeSetor ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <button id="avaliar" class="btn btn-primary">Avaliar</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="shared/scripts/jquery-3.7.1.min.js"></script>
    <script src="shared/scripts/home.js"></script>
</body>
</html>
