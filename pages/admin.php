<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    // Redirect to login if not logged in or not an admin
    header("Location: login.php");
    exit();
}

// Include the database connection
require '../includes/config.php';

// Fetch questions from the database that are not yet approved
$sql = "SELECT * FROM question WHERE approved = 0"; // Assuming there's an 'approved' column
$result = $conn->query($sql);

if (!$result) {
    die("Query Failed: " . $conn->error);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/home.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Side Navbar -->
        <div class="col-md-3">
            <?php include '../includes/navbar.php'; ?>
        </div>
        <div class="col-md-9">
            <div class="title"><p>Admin Dashboard</p></div>
            <div class="sub-headings"><p>Approve or Delete Questions</p></div>
        <div class="approve-card">            
            <?php if ($result->num_rows > 0): ?>
                <ul class="list-group">
                    <?php while($row = $result->fetch_assoc()): ?>
                        <li class="list-group-item">
                            <strong><?php echo htmlspecialchars($row['title']); ?></strong><br>
                            <?php echo nl2br(htmlspecialchars($row['content'])); ?><br>
                            <a href="approve.php?id=<?php echo $row['question_id']; ?>" class="btn btn-success btn-sm">Approve</a>
                            <a href="delete.php?id=<?php echo $row['question_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
        </div>
                <p>No questions to approve.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>

<?php
$conn->close();
?>
