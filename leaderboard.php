<?php
include 'db.php';

$result = $conn->query("SELECT * FROM users ORDER BY score DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard</title>
</head>
<body>
    <h2>Quiz Leaderboard</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Score</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['score']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="index.php">Take Quiz Again</a>
</body>
</html>
