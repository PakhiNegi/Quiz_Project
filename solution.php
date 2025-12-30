<?php
session_start();
$questions = $_SESSION['questions'];
$user_answers = $_SESSION['user_answers'];

include "db.php";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Solution</title>
    <style>
      

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f1f8e9;
            color: #438412;
        }

        header {
            background-color: #438412;
            color: #f9fbe7;
            padding: 20px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .quiz-box {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(67, 132, 18, 0.2);
        }

        .question-block {
            margin-bottom: 30px;
            padding: 15px;
            border: 2px solid #ddd;
            border-left: 10px solid #438412;
            border-radius: 5px;
            background-color: #fdfdfd;
        }

        .question-block.correct {
            border-left-color: #438412;
            background: #f0fff0;
        }

        .question-block.incorrect {
            border-left-color: red;
            background: #fff0f0;
        }

        footer {
            text-align: center;
            padding:  10px 20px;
            background-color: #438412;
            color: #f9fbe7;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .back-button-container {
            text-align: left;
            margin: 20px;
        }

        .back-button {
            background-color: #438412;
            color: #f9fbe7;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #33660e;
        }

        .submit-btn {
            background: #438412;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .submit-btn:hover {
            background: #35660f;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="quizlogo.png" alt="Logo">
            <span>QuizzSparks</span>
        </div>
    </header>

    <div class="quiz-box">
        <h1>Solution</h1>
        <?php foreach ($questions as $index => $question): ?>
            <?php
                $user_answer = isset($user_answers[$index]) ? $user_answers[$index] : 'Not Answered';
                $is_correct = $user_answer == $question['answer'];
                $explanation = "Explanation not available.";
                $question_text = $conn->real_escape_string($question['question']);
                $stmt = $conn->prepare("SELECT explanation FROM questions WHERE question = ? LIMIT 1");
                $stmt->bind_param("s", $question_text);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result && $row = $result->fetch_assoc()) {
                    $explanation = $row['explanation'];
                }

                $block_class = $is_correct ? "correct" : "incorrect";
                $status_text = $is_correct ? "Correct" : "Incorrect";
            ?>
            <div class="question-block <?php echo $block_class; ?>">
                <p><strong>Q<?php echo $index + 1; ?>: <?php echo htmlspecialchars($question['question']); ?></strong></p>
                <p>Your Answer: <strong><?php echo htmlspecialchars($user_answer); ?></strong></p>
                <p>Status: <span style="color: <?php echo $is_correct ? '#438412' : 'red'; ?>;"><?php echo $status_text; ?></span></p>
                <p><strong>Explanation:</strong></p>
                <p><?php echo nl2br(htmlspecialchars($explanation)); ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <footer>
        <div class="back-button-container">
            <button class="back-button" onclick="window.history.back();">Go Back</button>
        </div>
    </footer>

</body>
</html>

<?php $conn->close(); ?>
