<?php
include 'db.php';
session_start();

if (!isset($_SESSION['name'])) {
    die("Session expired. Please register again.");
}

$name = $_SESSION['name'];
$score = 0;

$result = $conn->query("SELECT * FROM questions");
$questions = $result->fetch_all(MYSQLI_ASSOC);

foreach ($questions as $q) {
    $qid = 'q' . $q['id'];
    if (isset($_POST[$qid]) && $_POST[$qid] == $q['answer']) {
        $score++;
    }
}

// Save score in the database
$stmt = $conn->prepare("INSERT INTO users (name, score) VALUES (?, ?)");
$stmt->bind_param("si", $name, $score);
$stmt->execute();
$stmt->close();

echo "<h2>Quiz Completed!</h2>";
echo "<p>Name: $name</p>";
echo "<p>Your Score: $score</p>";
echo "<a href='leaderboard.php'>View Leaderboard</a>";
?>
