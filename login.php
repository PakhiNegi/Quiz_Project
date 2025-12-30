<?php
session_start();
include 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $password = $_POST['password'];

    
    $stmt = $conn->prepare("SELECT * FROM users WHERE name = ?");
    $stmt->bind_param("s", $name); 
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();

        
        if (password_verify($password, $row['password'])) {
            
            $_SESSION['user'] = $row['name'];
            header("Location: dashboard.php");
            exit();
        } else {
            
            echo "Invalid password";
        }
    } else {
    
        echo "No user found";
    }

    $stmt->close();
}
?>
