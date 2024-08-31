<?php
session_start();
require '../includes/config.php';

// Check if the user is logged in and is an admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    // Redirect to login if not logged in or not an admin
    header("Location: login.php");
    exit();
}

// Check if the question ID is provided
if (isset($_GET['id'])) {
    $questionId = intval($_GET['id']);
    
    // Update the question to mark it as deleted
    $sql = "UPDATE question SET deleted = 1 WHERE question_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $questionId);
    
    if ($stmt->execute()) {
        // Redirect back to the admin page after deletion
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
} else {
    echo "No question ID provided.";
}

$conn->close();
?>
