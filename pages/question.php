<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/question.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Side Navbar -->
            <div class="col-md-3">
                <?php include '../includes/navbar.php'; ?>
            </div>

        <div class="col-md-7">
            <div class="row">
                <div class="col-md-6">
                    <div class="heading"><h1>ASK A QUESTION</h1></div>
                    <div class="image"></div>
                </div>
                <!-- Ask Question Form -->
                 <div class="col-md-6">
                 <form action="question.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="question">Ask a Question</label>
                        <textarea class="form-control" id="question" name="question" placeholder="Ask your question here..." required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tags">Add Tags</label>
                        <input type="text" class="form-control" id="tags" name="tags" placeholder="e.g., baking, desserts">
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" class="form-control-file" id="image" name="image" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">POST</button>
                </form>
                 </div>
            </div>
        </div>
            
        </div>
        
    </div>

    
</body>
</html>