<?php
session_start();
include 'db.php';


if (isset($_SESSION['user'])) {
    $name = $_SESSION['user'];

    $stmt = $conn->prepare("SELECT name, email, created_at FROM users WHERE name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo json_encode([
            "success" => true,
            "name" => $row['name'],
            "email" => $row['email'],
            "member_since" => isset($row['created_at']) ? date("d M Y", strtotime($row['created_at'])) : 'N/A'
        ]);
    } else {
        echo json_encode(["success" => false, "message" => "No user found"]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Session not set"]);
}
