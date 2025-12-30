<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit();
}

$user = $_SESSION['user'];

include 'db.php';

$query = "SELECT id FROM users WHERE name = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();


$_SESSION['user_id'] = $row['id']; 

$query = "SELECT COUNT(*) AS total_quizzes, AVG(score) AS average_score FROM quizzes WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['user_id']);  
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

$totalQuizzes = $data['total_quizzes'] ?? 0; 
$averageScore = $data['average_score'] ?? 0;  

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | QuizzSparks</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<header class="header">
  <div class="header-left">
    <img src="quizlogo.png" alt="Quiz Logo" class="logo-img">
    <span class="logo-text">QuizzSparks</span>
  </div>
  <nav class="header-right">
    <ul>
      <li><a href="menu.html">Menu</a></li>
      <li><a href="profile.html">Profile</a></li>
      <li><a href="help.html">Help</a></li>
    </ul>
  </nav>
</header>

<main>
  <div class="welcome-section">
    <h1>Welcome, <?php echo htmlspecialchars($user); ?>!</h1>
    <p class="motivational-quote" id="quote"></p>
  </div>

  <section class="dashboard-stats">
    <div class="stat-box">
      <h3>Total Quizzes Taken</h3>
      <p><?php echo $totalQuizzes; ?></p>
    </div>
    <div class="stat-box">
      <h3>Quiz Score</h3>
      <p><?php echo number_format($averageScore, 2); ?>%</p>
    </div>
  </section>

  <section class="recent-activity">
    <h2>Recent Activity</h2>
    <?php
    
    include 'db.php';

    
    $query = "SELECT subject, difficulty, score, created_at FROM quizzes WHERE user_id = ? ORDER BY created_at DESC LIMIT 5";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table class='activity-table'>";
        echo "<tr><th>Subject</th><th>Difficulty</th><th>Score</th><th>Date</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['subject']) . "</td>";
            echo "<td>" . htmlspecialchars($row['difficulty']) . "</td>";
            echo "<td>" . htmlspecialchars($row['score']) . "</td>";
            echo "<td>" . date('d-m-Y', strtotime($row['created_at'])) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No recent activity yet.</p>";
    }

    
    $stmt->close();
    $conn->close();
    ?>
  </section>
</main>

<footer>
  <p>&copy; 2025 QuizzSparks</p>
</footer>

<script>

const quotes = [
  "Believe in yourself and all that you are.",
  "Success is not final, failure is not fatal: It is the courage to continue that counts.",
  "The harder you work for something, the greater you’ll feel when you achieve it.",
  "Push yourself, because no one else is going to do it for you.",
  "Every expert was once a beginner.",
  "Believe you can and you're halfway there."
];


function displayRandomQuote() {
  const quoteElement = document.getElementById('quote');
  const randomIndex = Math.floor(Math.random() * quotes.length);
  quoteElement.textContent = quotes[randomIndex];
}


window.onload = displayRandomQuote;
</script>

</body>
</html>
