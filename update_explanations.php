<?php
$connection = new mysqli("localhost", "root", "root1504sudh@", "quiz_app"); // Adjust DB details

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    foreach ($_POST['explanation'] as $id => $text) {
        $safeText = $connection->real_escape_string($text);
        $connection->query("UPDATE questions SET explanation = '$safeText' WHERE id = $id");
    }
    echo "<p style='color: green;'>✅ Explanations updated!</p>";
}

$result = $connection->query("SELECT id, question, explanation FROM questions ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

    <title>Update Explanations</title>
</head>
<body>
    <h2>Update Question Explanations</h2>
    <form method="POST">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div>
                <p><b>Q<?php echo $row['id']; ?>:</b> <?php echo $row['question']; ?></p>
                <textarea name="explanation[<?php echo $row['id']; ?>]" rows="3" cols="80"><?php echo $row['explanation']; ?></textarea>
                <hr>
            </div>
        <?php endwhile; ?>
        <button name="save">Save Explanations</button>
    </form>
</body>
</html>
