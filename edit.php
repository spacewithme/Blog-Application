<?php
require 'config.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $pdo->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
    $stmt->execute([$title, $content, $id]);
    header('Location: index.php');
} else {
    $stmt = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
    $stmt->execute([$id]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Edit Post</h1>
    <form method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
        <label for="content">Content:</label>
        <textarea id="content" name="content" required><?php echo htmlspecialchars($post['content']); ?></textarea>
        <button type="submit">Save</button>
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>
