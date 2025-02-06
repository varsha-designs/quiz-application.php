<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Enter Your Name to Start the Quiz</h2>
    <form action="quiz.php" method="post">
        <input type="text" name="name" required placeholder="Enter Your Name">
        <input type="submit" value="Start Quiz">
    </form>
</body>
</html>
