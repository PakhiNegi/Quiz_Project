<?php

include "db.php";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $question = $_POST['question'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];
    $answer = $_POST['answer'];
    $subject = $_POST['subject'];
    $difficulty = $_POST['difficulty'];
    $explanation = $_POST['explanation'];

    $stmt = $conn->prepare("INSERT INTO questions (question, option_a, option_b, option_c, option_d, answer, subject, difficulty, explanation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $question, $option_a, $option_b, $option_c, $option_d, $answer, $subject, $difficulty, $explanation);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>Question inserted successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Question</title>
</head>
<body>
    <h2>Insert New Question</h2>
    <form method="post" action="">
        <label>Question:</label><br>
        <textarea name="question" rows="4" cols="60" required></textarea><br><br>

        <label>Option A:</label><br>
        <input type="text" name="option_a"><br><br>

        <label>Option B:</label><br>
        <input type="text" name="option_b"><br><br>

        <label>Option C:</label><br>
        <input type="text" name="option_c"><br><br>

        <label>Option D:</label><br>
        <input type="text" name="option_d"><br><br>

        <label>Correct Answer (A/B/C/D):</label><br>
        <input type="text" name="answer"><br><br>

        <label>Subject:</label><br>
        <input type="text" name="subject" required><br><br>

        <label>Difficulty:</label><br>
        <select name="difficulty" required>
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
        </select><br><br>

        <label>Explanation:</label><br>
        <textarea name="explanation" rows="3" cols="60"></textarea><br><br>

        <button type="submit">Insert Question</button>
    </form>
</body>
</html>
