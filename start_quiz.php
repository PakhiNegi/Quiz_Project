<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include 'db.php';  


if (empty($_POST['subject']) || empty($_POST['difficulty'])) {
    echo "Form not submitted correctly!";
    exit();
}

$subject = $_POST['subject'];
$difficulty = $_POST['difficulty'];


$stmt = $conn->prepare("SELECT question, option_a, option_b, option_c, option_d, answer FROM questions WHERE LOWER(subject) = LOWER(?) AND LOWER(difficulty) = LOWER(?) ");
$stmt->bind_param("ss", $subject, $difficulty);
$stmt->execute();
$result = $stmt->get_result();


$questions = [];
while ($row = $result->fetch_assoc()) {
    $questions[] = $row;
}


if (empty($questions)) {
    echo "
    <div style='
        max-width: 500px;
        margin: 100px auto;
        padding: 30px;
        text-align: center;
        background-color: #eaf5e1;
        border: 2px solid #438412;
        border-radius: 10px;
        font-family: Arial, sans-serif;
        color: #438412;
        box-shadow: 0 4px 8px rgba(67, 132, 18, 0.2);
    '>
        <h2 style='font-size: 28px;'>No Questions Found</h2>
        <p style='font-size: 16px; margin-top: 10px;'>
        Sorry, there are no questions available for the selected subject and difficulty level.
        </p>
        <p>
            <a href='menu.html' style='
                display: inline-block;
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #438412;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                font-weight: bold;
            '>Go Back to Menu</a>
        </p>
    </div>
    ";
    exit;
}


$_SESSION['questions'] = $questions;
$_SESSION['subject'] = $subject;
$_SESSION['difficulty'] = $difficulty;
$_SESSION['score'] = 0;
$_SESSION['current_question'] = 0;


header("Location: quiz.php");
exit();
?>
