<?php
session_start();
include 'db.php';
if (!isset($_SESSION['questions'])) {
    echo "No questions found in session.";
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
$_SESSION['total_questions'] = count($questions);



if (isset($_SESSION['user_id']) && isset($_SESSION['subject']) && isset($_SESSION['difficulty'])) {
    $userId = $_SESSION['user_id'];
    $subject = $_SESSION['subject'];
    $difficulty = $_SESSION['difficulty'];
    $createdAt = date('Y-m-d H:i:s');

    $query = "INSERT INTO quizzes (user_id, subject, difficulty, score, created_at) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("issis", $userId, $subject, $difficulty, $score, $createdAt);
        if (!$stmt->execute()) {
            echo "Insert error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Prepare failed: " . $conn->error;
    }
}
$_SESSION['questions'] = $questions; 
$_SESSION['user_answers'] = $_POST['answers']; 



$conn->close();
header("Location: result.php");
exit();
?>
