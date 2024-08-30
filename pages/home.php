<?php 
session_start(); // Start the session
require '../includes/config.php';

// Check if the session variable 'username' is set
if(!isset($_SESSION['username'])){
    header("Location: login.php"); // Redirect to login page
    exit(); // Terminate the script to ensure redirection
}

// Fetch questions from the database
$sql = "SELECT * FROM question ORDER BY postDate DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   //echo "Data exists.";
} else {
   // echo "No data found.";
}
if (!$result) {
    echo "Error: " . $conn->error;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/home.css" rel="stylesheet">
    <link href="../css/question-card.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Side Navbar -->
        <div class="col-md-3 sidebar-sticky">
            <?php include '../includes/navbar.php'; ?>
        </div>
        <div class="col-md-9">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <div class="row">
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <div class="col-md-4">
                            <?php 
                                $imageUrl = $row['image_url'];
                                $title = $row['title'];
                                $content = $row['content'];
                                $questionId = $row['question_id']; // Make sure this is set
                                /*echo "<pre>";
                                print_r($row);
                                echo "</pre>"; */

                                include '../components/question-card.php'; 
                            ?>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No questions available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php
$conn->close();
?>
