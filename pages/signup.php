<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require '../includes/config.php';

$registrationSuccess = false; // Flag to track registration success
$error = ''; // Variable to hold error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the username, email, and password from the POST request
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Check if the username or email is already registered
    $check_sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $error = "An account with this email already exists.";
    } else {
        // Hash the password before storing it
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Define the SQL query to insert the username, email, and hashed password into the users table
        $sql = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";

        // Prepare the SQL statement for execution
        $stmt = $conn->prepare($sql);

        // Bind the values of the user's input into the SQL statement
        $stmt->bind_param("sss", $username, $email, $hashedPassword);
        
        // Execute the prepared statement and check for success/failure
        if ($stmt->execute()) {
            $registrationSuccess = true;
            $_SESSION['username'] = $username;  // Set session variables as needed
            header("Location: home.php");       // Redirect to the home page
            exit();                             // Ensure no further code is executed after redirect
        } else {
            $error = "Error: " . $stmt->error; // Store error message
        }

        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/signup.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Side Navbar -->
            <div class="col-md-3">
                <?php include '../includes/navbar.php'; ?>
            </div>

            <!-- Signup Form -->
            <div class="col-md-4">
                <h2>JOIN THE COMMUNITY</h2>
                <?php if ($error): ?>
                    <div class="alert alert-danger">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
                <form action="signup.php" method="POST">
                    <div class="form-group">
                        <label for="username">What should we call you?</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Where should we send you news?</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Secure your account</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="text">
                        <p>Already have an account? <a href="login.php" style="color: #007bff;">Login</a></p>
                    </div>
                    <button type="submit" class="btn btn-primary">SIGN UP</button>
                </form>
            </div>
            <!-- Image next to the form -->
            <div class="col-md-4">
                <div class="image"></div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    
    <?php if ($registrationSuccess): ?>
    <script>alert('Registration Complete');</script>
    <?php endif; ?>
</body>
</html>
