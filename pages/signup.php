<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/signup.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Side Navbar -->
            <div class="col-md-3">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                         <li class="nav-item">
                            <div class="logo"></div>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link active" href="#">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">QUESTIONS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ANSWERS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">GALLERY</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ACCOUNT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">LOG OUT</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Signup Form -->
            <div class="col-md-4">
                <h2>JOIN THE COMMUNITY</h2>
                <form action="signup_process.php" method="POST">
                    <div class="form-group">
                        <label for="name">What should we call you?</label>
                        <input type="text" class="form-control" id="name" name=" your name :)" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Where should we send you news?</label>
                        <input type="email" class="form-control" id="email" name="your email :)" placeholder="your email">
                    </div>
                    <div class="form-group">
                        <label for="password">Secure your account</label>
                        <input type="password" class="form-control" id="password" name=" your password" placeholder="your password">
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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
</body>
</html>
