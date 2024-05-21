<?php
require 'config.php';
$stmt = $pdo->query('SELECT * FROM posts');
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Blog</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Simple Blog</h1>
    <a href="create.php">Create New Post</a>
    <?php foreach ($posts as $post): ?>
        <div class="post">
            <h2><?php echo htmlspecialchars($post['title']); ?></h2>
            <p><?php echo htmlspecialchars($post['content']); ?></p>
            <a href="post.php?id=<?php echo $post['id']; ?>">Read More</a>
            <a href="edit.php?id=<?php echo $post['id']; ?>">Edit</a>
            <a href="delete.php?id=<?php echo $post['id']; ?>">Delete</a>
        </div>
    <?php endforeach; ?>
</body>
</html>
