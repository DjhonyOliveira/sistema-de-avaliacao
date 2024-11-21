$(document).ready(function(){
    buscaPerguntas();
    
    let tempoInatividade = 20000;
    let tempoLimite;
    let questions = [];
    let avaliacao = {};
    let currentQuestionIndex = 0;    

    $(document).on('mousemove keypress scroll click', function() {
        reiniciarTimer();
    });

    function recarregaPagina(){
        location.reload();

        if(avaliacao.length !== 0){
            submitForm(avaliacao);
        }
    }

    function reiniciaTimer(){
        clearTimeout(tempoLimite);
        tempoLimite = setTimeout(recarregaPagina, tempoInatividade);
    }

    reiniciaTimer();

    function loadNextQuestion() {
        const button = document.createElement('button');

        if (currentQuestionIndex < questions.length) {
            document.getElementById('question').textContent        = questions[currentQuestionIndex]['pergunta'];
            document.getElementById('question').value              = questions[currentQuestionIndex]['id'];
            document.getElementById('response').style.display      = 'none';
            document.getElementById('button-submit').style.display = 'none';
        } else {
            document.getElementById('question').textContent         = "Obrigado por completar a avaliação!";
            document.getElementById('rating-buttons').style.display = 'none';
            document.getElementById('button-submit' ).style.display = 'block';

            button.textContent = "Enviar Avaliacão";
            button.className   = "btn btn-primary";
            button.type        = "submit";
            button.addEventListener('click', () => submitForm());

            document.getElementById('button-submit').appendChild(button);
        }
    }

    function submitForm() {
        let url = window.location;

        $.ajax({
            url: url.origin + '/app/avaliacao', 
            type: 'POST',
            data: avaliacao,
            dataType: 'json',
            success: function(result){
                $('#modalSucesso').modal('show');

                setTimeout(function(){
                    location.reload();
                }, 2000);
            },
            error: function(){
                alert('Deu Ruim aqui');
            }
        });
    }

    function buscaPerguntas(){
        let url = window.location;

        $.ajax({
            url: url.origin + '/app/avaliacao' + url.search, 
            type: 'GET',
            dataType: 'json',
            success: function(result){
                questions = result;
            },
            error: function(error){
                alert('Deu Ruim aqui');
            }
        });
    }

    function initRatingButtons() {
        const ratingButtonsContainer = document.getElementById('rating-buttons');

        for (let i = 1; i <= 10; i++) {
            const button = document.createElement('button');

            button.textContent    = i;
            button.className      = 'rating-btn btn';
            button.id             = 'nota-' + i;
            button.value          = i;
            button.dataset.rating = i;

            button.addEventListener('click', (ev) => {
                let idQuestion    = document.getElementById('question').value;
                let notaAvaliacao = ev.target.value

                let resposta = {idQuestion, notaAvaliacao};

                avaliacao[`avaliacao${currentQuestionIndex}`] = resposta;

                currentQuestionIndex++;
                loadNextQuestion();
            });

            ratingButtonsContainer.appendChild(button);
        }
    }
    
    setTimeout(function(){
        initRatingButtons();
        loadNextQuestion();
    }, 100);
        
});