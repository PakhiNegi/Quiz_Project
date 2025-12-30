<?php
session_start();
header('Content-Type: application/json');

$response = [
    'success' => true,
    'score' => $_SESSION['score'] ?? 0,
    'attempts' => $_SESSION['attempts'] ?? 0,
    'session_id' => session_id()
];

echo json_encode($response);
?>