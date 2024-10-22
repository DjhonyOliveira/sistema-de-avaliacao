  // Simulação de perguntas vindas do backend
const questions = [
    {
        id: 1,
        pergunta: "Como você avalia o atendimento na recepção?"
    },
    {
        id: 2,
        pergunta: "Como você avalia o tempo de espera para ser atendido?"
    },
    {
        id: 3,
        pergunta :"Como você avalia a cordialidade dos médicos?"
    },
    {
        id: 4,
        pergunta: "Como você avalia a limpeza do hospital?"
    }
];

let currentQuestionIndex = 0;

let avaliacao = [];

// Função para carregar a próxima pergunta
function loadNextQuestion() {
    const button = document.createElement('button');

    if (currentQuestionIndex < questions.length) {
        document.getElementById('question').textContent = questions[currentQuestionIndex]['pergunta'];
        document.getElementById('question').value = questions[currentQuestionIndex]['id'];
        document.getElementById('response').style.display = 'none';
        document.getElementById('button-submit').style.display = 'none';
    } else {
        document.getElementById('question').textContent         = "Obrigado por completar a avaliação!";
        document.getElementById('rating-buttons').style.display = 'none';
        document.getElementById('button-submit').style.display  = 'block';

        button.textContent = "Enviar Avaliacão";
        button.className = "btn btn-primary";
        button.type = "submit";
        button.addEventListener('submit', () => submitForm());

        document.getElementById('button-submit').appendChild(button);
    }
}

function submitForm() {
    fetch('/avaliacao', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(avaliacao)
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('response').innerHTML = "Avaliação enviada com sucesso!";
        console.log(data);
    })
    .catch(error => console.error('Erro:', error));
}

// Inicializar botões de avaliação
function initRatingButtons() {
    const ratingButtonsContainer = document.getElementById('rating-buttons');
    for (let i = 1; i <= 10; i++) {
        const button = document.createElement('button');

        button.textContent = i;
        button.className = 'rating-btn btn';
        button.id = 'nota-' + i;
        button.value = i;
        button.dataset.rating = i;
        button.addEventListener('click', (ev) => {
            let idQuestion    = document.getElementById('question').value;
            let notaAvaliacao = ev.target.value

            let resposta = {idQuestion, notaAvaliacao};

            avaliacao.push(resposta);

            currentQuestionIndex++;
            loadNextQuestion();
        });

        ratingButtonsContainer.appendChild(button);
    }
}

// Inicializa a página
window.onload = function() {
    initRatingButtons();
    loadNextQuestion();
};