<?php 
session_start(); // Start the session
require '../includes/config.php';

// Check if the session variable 'username' is set
if(!isset($_SESSION['username'])){
    header("Location: login.php"); // Redirect to login page
    exit(); // Terminate the script to ensure redirection
}

// Determine sort order based on user selection
$sortOrder = isset($_GET['sort']) && $_GET['sort'] == 'ASC' ? 'ASC' : 'DESC';

// Fetch questions from the database that are approved and not deleted
$sql = "SELECT * FROM question WHERE deleted = 0 AND approved = 1 ORDER BY postDate $sortOrder";
$result = $conn->query($sql);



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

            <!-- Filter Dropdown -->
              <!-- <div class="form-group">
                <label for="sortOrder">Sort by:</label>
                <select id="sortOrder" class="form-control" onchange="window.location.href='<?php echo $_SERVER['PHP_SELF']; ?>?sort=' + this.value;">
                    <option value="DESC" <?php if(!isset($_GET['sort']) || $_GET['sort'] == 'DESC') echo 'selected'; ?>>Newest First</option>
                    <option value="ASC" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'ASC') echo 'selected'; ?>>Oldest First</option>
                </select> 

            </div> -->

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
