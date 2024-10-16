  // Simulação de perguntas vindas do backend
  const questions = [
    "Como você avalia o atendimento na recepção?",
    "Como você avalia o tempo de espera para ser atendido?",
    "Como você avalia a cordialidade dos médicos?",
    "Como você avalia a limpeza do hospital?",
];

let currentQuestionIndex = 0;

// Função para carregar a próxima pergunta
function loadNextQuestion() {
    if (currentQuestionIndex < questions.length) {
        document.getElementById('question').textContent = questions[currentQuestionIndex];
    } else {
        document.getElementById('question').textContent = "Obrigado por completar a avaliação!";
        document.getElementById('rating-buttons').style.display = 'none';
    }
}

// Função para processar a avaliação e pular para a próxima pergunta
function handleRating(rating) {
    console.log(`Nota ${rating} registrada para: ${questions[currentQuestionIndex]}`);
    currentQuestionIndex++;
    loadNextQuestion();
}

// Inicializar botões de avaliação
function initRatingButtons() {
    const ratingButtonsContainer = document.getElementById('rating-buttons');
    for (let i = 1; i <= 10; i++) {
        const button = document.createElement('button');
        button.textContent = i;
        button.className = 'rating-btn btn';
        button.dataset.rating = i;
        button.addEventListener('click', () => handleRating(i));
        ratingButtonsContainer.appendChild(button);
    }
}

// Inicializa a página
window.onload = function() {
    initRatingButtons();
    loadNextQuestion();
};