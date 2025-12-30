let questions = []; 
let currentQuestionIndex = 0;
let selectedAnswers = {}; 


window.onload = async function() {
    try {
        const response = await fetch('get_questions.php'); 
        questions = await response.json();
        showQuestion();
    } catch (error) {
        console.error("Error loading questions:", error);
    }
};

function showQuestion() {
    if (currentQuestionIndex >= questions.length) {
        
        submitQuiz();
        return;
    }

    const question = questions[currentQuestionIndex];
    document.getElementById('question-text').innerText = question.text; 
    const optionsDiv = document.getElementById('options');
    optionsDiv.innerHTML = '';

    question.options.forEach((option, index) => {
        const optionDiv = document.createElement('div');
        optionDiv.innerHTML = `
            <label>
                <input type="radio" name="option" value="${option}">
                ${option}
            </label>
        `;
        optionsDiv.appendChild(optionDiv);
    });
}

function nextQuestion() {
    const selectedOption = document.querySelector('input[name="option"]:checked');
    if (!selectedOption) {
        alert("Please select an option!");
        return;
    }

    selectedAnswers[currentQuestionIndex] = selectedOption.value;
    currentQuestionIndex++;
    showQuestion();
}

function submitQuiz() {
    
    const answersInput = document.getElementById('answersInput');
    answersInput.value = JSON.stringify(selectedAnswers);
    document.getElementById('hidden-form').submit();
}
