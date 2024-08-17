<?php 
    session_start(); // Start the session
    require '../includes/config.php';

    
    // Check if the session variable 'username' is set
    if(!isset($_SESSION['username'])){
        header("Location: login.php"); // Redirect to login page
        exit(); // Terminate the script to ensure redirection
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
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="row">
            <!-- Side Navbar -->
            <div class="col-md-3">
                <?php include '../includes/navbar.php'; ?>
            </div>
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>




    </div>

    

</body>
</html>
