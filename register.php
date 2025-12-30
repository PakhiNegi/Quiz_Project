<?php
include 'db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sss", $name, $email, $hashedPassword);

        try {
            $stmt->execute();
            echo "
            <div style='
                max-width: 400px;
                margin: 50px auto;
                padding: 20px;
                text-align: center;
                background-color: #eaf5e1;
                border: 2px solid #438412;
                border-radius: 10px;
                font-family: Arial, sans-serif;
                color: #438412;
            '>
                <h2>Registered Successfully!</h2>
                <p><a href='dashboard.php' style='
                    display: inline-block;
                    margin-top: 10px;
                    padding: 10px 20px;
                    background-color: #438412;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                    font-weight: bold;
                '>Go to Dashboard </a></p>
            </div>
            ";

        } catch (mysqli_sql_exception $e) {
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                echo "
                <div style='
                    max-width: 400px;
                    margin: 50px auto;
                    padding: 20px;
                    text-align: center;
                    background-color:rgb(170, 235, 120);
                    border: 2px solid #438412;
                    border-radius: 10px;
                    font-family: Arial, sans-serif;
                    color:rgb(39, 89, 0);
                '>
                    <h2>Oops! Email Already Registered</h2>
                    <p><a href='login.html' style='
                        display: inline-block;
                        margin-top: 10px;
                        padding: 10px 20px;
                        background-color: #438412;
                        color: white;
                        text-decoration: none;
                        border-radius: 5px;
                        font-weight: bold;
                    '>Go to Login</a></p>
                </div>
                ";
            } else {
                echo "Error: " . $e->getMessage();
            }
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid Request Method.";
}
?>
