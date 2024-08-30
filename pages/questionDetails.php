<?php 
session_start();
require '../includes/config.php';

// Check if question ID is passed as a parameter
if(isset($_GET['id'])){
    $questionId = intval($_GET['id']);

    // Fetch the specific question from the database
    $sql = "SELECT * FROM question WHERE question_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $questionId);
    $stmt->execute();
    $result = $stmt->get_result();
    $question = $result->fetch_assoc();
    
    // Fetch the answers for this question
    $sql_answers = "SELECT * FROM answer WHERE question_id = ? ORDER BY postDate DESC";
    $stmt_answers = $conn->prepare($sql_answers);
    $stmt_answers->bind_param("i", $questionId);
    $stmt_answers->execute();
    $result_answers = $stmt_answers->get_result();
} else {
    echo "No question specified.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($question['title']); ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet">
    <link href="../css/question-card.css" rel="stylesheet">
</head>
<body>
<div class="container">
    
    <h1><?php echo htmlspecialchars($question['title']); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($question['content'])); ?></p>
    <p><strong>Posted on:</strong> <?php echo htmlspecialchars($question['postDate']); ?></p>

    <!-- Answer Form -->
    <h2>Submit Your Answer</h2>
    <form action="submitAnswer.php" method="post">
        <div class="form-group">
            <label for="answer">Your Answer:</label>
            <textarea class="form-control" id="answer" name="answer" rows="4" required></textarea>
        </div>
        <input type="hidden" name="question_id" value="<?php echo $questionId; ?>">
        <button type="submit" class="btn btn-primary">Submit Answer</button>
    </form>

    <!-- Display Answers -->
    <h2>Answers</h2>
    <?php if ($result_answers->num_rows > 0): ?>
        <?php while($answer = $result_answers->fetch_assoc()): ?>
            <div class="card mt-3">
                <div class="card-body">
                    <p><?php echo nl2br(htmlspecialchars($answer['content'])); ?></p>
                    <p><strong>Answered on:</strong> <?php echo htmlspecialchars($answer['postDate']); ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No answers yet. Be the first to answer!</p>
    <?php endif; ?>
</div>
</body>
</html>

<?php
$stmt->close();
$stmt_answers->close();
$conn->close();
?>
