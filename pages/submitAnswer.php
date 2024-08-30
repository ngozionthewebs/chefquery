<?php
session_start();
require '../includes/config.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $questionId = intval($_POST['question_id']);
    $answerContent = $_POST['answer'];
    $userId = 1; // Replace this with the actual logged-in user's ID

    // Insert the answer into the database
    $sql = "INSERT INTO answer (question_id, user_id, content, postDate) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $questionId, $userId, $answerContent);

    if($stmt->execute()){
        // Redirect back to the question details page
        header("Location: questionDetails.php?id=" . $questionId);
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
