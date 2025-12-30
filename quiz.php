<?php
session_start();
if (!isset($_SESSION['current_question'])) {
    $_SESSION['current_question'] = 0;
}

if (!isset($_SESSION['questions'])) {
    echo "No quiz questions found!";
    exit();
}

$questions = $_SESSION['questions'];
$score = 0; 

foreach ($questions as $index => $question) {
    if (isset($_POST['answers'][$index]) && $_POST['answers'][$index] == $question['answer']) {
        $score++;
    }
}

$_SESSION['score'] = $score; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
    <link rel="stylesheet" href="quiz.css">
    <script>

        let currentQuestion = <?php echo $_SESSION['current_question']; ?>;
        const questions = <?php echo json_encode($questions); ?>;

        function showNextQuestion() {
            currentQuestion++;
            if (currentQuestion < questions.length) {
                document.getElementById("question-" + (currentQuestion - 1)).style.display = "none";
                document.getElementById("question-" + currentQuestion).style.display = "block";
            } else {
                
                document.getElementById("quiz-form").submit();
            }
        }
    </script>
</head>
<body>
<header class="header">
        <div class="logo-container">
            <img src="quizlogo.png" alt="QuizzSparks Logo" class="logo">
            <span class="logo-text">QuizzSparks</span> 
        </div>
        
        <nav class="navbar">
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </header>
    <div class="quiz-box">
        <h1>Here's Your Quiz!!</h1>
        <form id="quiz-form" action="submit_quiz.php" method="post">
            <?php foreach ($questions as $index => $question): ?>
                <div class="question-block" id="question-<?php echo $index; ?>" style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>">
                    <p class="question-text"><strong>Q<?php echo $index + 1; ?>:</strong> <?php echo htmlspecialchars($question['question']); ?></p>
                    <div class="options">
                        <label>
                            <input type="radio" name="answers[<?php echo $index; ?>]" value="A" required> 
                            <?php echo htmlspecialchars($question['option_a']); ?>
                        </label><br>
                        <label>
                            <input type="radio" name="answers[<?php echo $index; ?>]" value="B"> 
                            <?php echo htmlspecialchars($question['option_b']); ?>
                        </label><br>
                        <label>
                            <input type="radio" name="answers[<?php echo $index; ?>]" value="C"> 
                            <?php echo htmlspecialchars($question['option_c']); ?>
                        </label><br>
                        <label>
                            <input type="radio" name="answers[<?php echo $index; ?>]" value="D"> 
                            <?php echo htmlspecialchars($question['option_d']); ?>
                        </label>
                    </div>
                    <div class="submit-button">
                        <button type="button" onclick="showNextQuestion()">Next</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </form>
    </div>
</body>
</html>
