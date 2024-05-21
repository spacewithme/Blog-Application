<?php
require 'config.php';
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($post['title']); ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
    <p><?php echo htmlspecialchars($post['content']); ?></p>
    <a href="index.php">Back to Home</a>
</body>
</html>
