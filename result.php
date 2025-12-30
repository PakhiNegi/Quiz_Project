<?php
include('db.php');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$score = $_SESSION['score'] ?? 0;
$subject = $_SESSION['subject'] ?? 'N/A';
$difficulty = $_SESSION['difficulty'] ?? 'N/A';
$questions = $_SESSION['questions'] ?? [];
$user_answers = $_SESSION['user_answers'] ?? [];
$totalQuestions = count($questions);

if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
}
$_SESSION['attempts']++;


$quiz_review = [];

foreach ($questions as $q) {
    $qid = $q['id'] ?? null;
    $questionText = $q['question'] ?? 'Question not found';
    $correctOption = $q['correct_option'] ?? null;

    if (!$qid || !$correctOption) continue;

    $userAnswer = $user_answers[$qid] ?? null;
    $isCorrect = ($userAnswer !== null && $userAnswer == $correctOption);

    
    $stmt = $conn->prepare("SELECT explanation FROM questions WHERE id = ?");
    $stmt->bind_param('i', $qid);
    $stmt->execute();
    $stmt->bind_result($explanation);
    $stmt->fetch();
    $stmt->close();

    $quiz_review[] = [
        'question' => $questionText,
        'user' => $userAnswer,
        'correct' => $correctOption,
        'is_correct' => $isCorrect,
        'explanation' => $explanation ?? 'No explanation available.'
    ];
}


$_SESSION['quiz_review'] = $quiz_review;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="print.css" media="print">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f9ff;
            text-align: center;
            padding: 30px;
        }
        .result-box {
            background: white;
            padding: 20px;
            max-width: 600px;
            margin: 30px auto;
        }
        .btn {
            margin: 10px;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        .result-actions {
            margin-top: 30px;
            text-align: center;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .action-button {
            background-color: #438412;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 30px;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }
        .action-button:hover {
            background-color: #35690e;
            transform: translateY(-3px);
        }
        .logout-button {
            background-color: rgb(68, 185, 18);
        }
        .logout-button:hover {
            background-color: rgb(126, 205, 110);
        }
        @media print {
            .view-solution-btn {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="result-box">
    <h2>Quiz Completed</h2>
    <p id="score-text">You scored <?php echo $score; ?> out of <?php echo $totalQuestions; ?></p>
    <p>Subject: <?php echo htmlspecialchars($subject); ?></p>
    <p>Difficulty Level: <?php echo htmlspecialchars($difficulty); ?></p>
    <p>Attempts: <?php echo $_SESSION['attempts']; ?></p>

    <canvas id="result-chart" width="400" height="400"></canvas>

    <button class="btn" onclick="window.print()">🖨️ Print</button>
    <form action="download.php" method="post">
        <input type="submit" class="btn" value="⬇️ Download PDF">
    </form>
</div>

<script>
    var ctx = document.getElementById('result-chart').getContext('2d');
    var resultChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Correct', 'Incorrect'],
            datasets: [{
                label: 'Quiz Result',
                data: [<?php echo $score; ?>, <?php echo ($totalQuestions - $score); ?>],
                backgroundColor: ['#438412', '#cccccc'],
                borderColor: ['#438412', '#cccccc'],
                borderWidth: 1
            }]
        },
        options: {
            cutout: '60%',
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    });
</script>

<div class="result-actions">
    <a href="solution.php" class="action-button view-solution-btn">📘 View Solution</a>
    <a href="dashboard.php" class="action-button">Back to Dashboard</a>
    <a href="logout.php" class="action-button logout-button">Logout</a>
</div>

</body>
</html>
