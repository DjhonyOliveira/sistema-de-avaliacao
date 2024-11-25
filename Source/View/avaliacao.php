<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação de Atendimento Hospitalar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="shared/styles/avaliacao.css">
    <link rel="stylesheet" href="shared/styles/message.css">
    <link rel="shortcut icon" href="shared/images/cruz-vermelha.png" type="image/x-icon">
</head>
<body class="bg-light">
    <div class="container mensagem">
        <div class="json-response"></div>
    </div>
    <div class="container avaliacao">
        <h1 class="text-center mb-4">Avaliação de Atendimento</h1>
        <div id="question-container" class="text-center">
            <h3 id="question">Carregando pergunta...</h3>
            <div class="d-flex justify-content-center mt-4">
                <div id="rating-buttons">
                </div>
                <div id="button-submit"></div>
            </div>
        </div>
        <div id="response"></div>

        <div class="modal fade" id="modalSucesso" tabindex="-1" aria-labelledby="modalSucessoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalSucessoLabel">Sucesso!</h5>
                    </div>
                    <div class="modal-body">
                        Dados Enviados com Sucesso.
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="shared/scripts/jquery-3.7.1.min.js"></script>
    <script src="shared/scripts/avaliacao.js"></script>
</body>
</html>
