<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $pdo->prepare('INSERT INTO posts (title, content) VALUES (?, ?)');
    $stmt->execute([$title, $content]);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Post</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Create New Post</h1>
    <form method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="content">Content:</label>
        <textarea id="content" name="content" required></textarea>
        <button type="submit">Create</button>
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>
