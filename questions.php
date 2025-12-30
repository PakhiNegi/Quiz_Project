<?php
include 'db.php'; 


$query = "SELECT * FROM questions";
$result = $conn->query($query);

$questions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = [
            "question" => $row['question'],
            "option_a" => $row['option_a'],
            "option_b" => $row['option_b'],
            "option_c" => $row['option_c'],
            "option_d" => $row['option_d'],
            "answer" => $row['answer']
        ];
    }
}

echo json_encode($questions);
?>
