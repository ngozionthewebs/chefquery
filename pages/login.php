<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require '../includes/config.php';

$error = "";  // Variable to store error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
    // Retrieve the username and password from the POST request
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Define the SQL query to insert the username and password into the users table
    $sql = "SELECT * FROM user WHERE username = ?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind the username to the SQL statement
    $stmt->bind_param("s", $username); // "s" means a string parameter

    // Execute the SQL statement
    $stmt->execute();

    // Store the result in the 'result' variable
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Verify the password using password_verify()
        if (password_verify($password, $user['password'])) {
            // Store user information in session
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // Store the user role in session

            // Check if the user is an admin
            if ($user['role'] == 'admin') {
                // Redirect to admin page
                header("Location: admin.php");
            } else {
                // Redirect to home page
                header("Location: home.php");
            }
            exit(); // Terminate the script to ensure redirection
        } else {
            $error = "Invalid username or password"; // Incorrect password
        }
    } else {
        $error = "Invalid username or password"; // Username not found
    }

    // Close the statement
    $stmt->close();

    // Close the database connection
    $conn->close(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Side Navbar -->
            <div class="col-md-3">
                <?php include '../includes/navbar.php'; ?>
            </div>

            <!-- Login Form -->
            <div class="col-md-4">
                <h2>WELCOME BACK! :)</h2>
                <?php if ($error): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="name">What should we call you?</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <div class="text">
                        <p>Don't have an account ? <a href="signup.php" style="color: #007bff;">Sign Up</a></p>
                    </div>
                    <button type="submit" class="btn btn-primary">LOGIN</button>
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
</body>
</html>
