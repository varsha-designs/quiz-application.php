<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['name'] = $_POST['name'];
}

$result = $conn->query("SELECT * FROM questions");
$questions = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['name']; ?></h2>
    <form action="result.php" method="post">
        <?php foreach ($questions as $index => $q) { ?>
            <p><?php echo ($index + 1) . ". " . $q['question']; ?></p>
            <input type="radio" name="q<?php echo $q['id']; ?>" value="<?php echo $q['option1']; ?>" required> <?php echo $q['option1']; ?><br>
            <input type="radio" name="q<?php echo $q['id']; ?>" value="<?php echo $q['option2']; ?>"> <?php echo $q['option2']; ?><br>
            <input type="radio" name="q<?php echo $q['id']; ?>" value="<?php echo $q['option3']; ?>"> <?php echo $q['option3']; ?><br>
            <input type="radio" name="q<?php echo $q['id']; ?>" value="<?php echo $q['option4']; ?>"> <?php echo $q['option4']; ?><br>
        <?php } ?>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
