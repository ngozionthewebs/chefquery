<div class="card" style="width: 18rem;">
<img src="<?php echo htmlspecialchars($imageUrl); ?>" class="card-img-top" alt="Question Image">
  <div class="card-body">
    <h5 class="card-title"><?php echo htmlspecialchars($title); ?></h5>
    <p class="card-text"><?php echo htmlspecialchars($content); ?></p>
    <a href="questionDetails.php?id=<?php echo $questionId; ?>" class="btn btn-primary">Answer Question</a>
  </div>
</div>
