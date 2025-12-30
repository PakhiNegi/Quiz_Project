<?php
session_start();
header('Content-Type: application/json');
$points = isset($_POST['points']) ? (int)$_POST['points'] : 1;
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}
$_SESSION['score'] += $points;

echo json_encode([
    'success' => true,
    'newScore' => $_SESSION['score']
]);
