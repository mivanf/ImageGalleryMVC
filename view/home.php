<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ?c=Auth&m=login_form');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Image Gallery</h2>
        <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
        <a href="?c=Auth&m=logout" class="btn-logout">Logout</a><br><br>
        <a href="?c=Post&m=addNew_form" class="btn-tambah">Add New Image (+)</a>
        <div class="gallery">
            <?php if (!$home->num_rows): ?>
                <p>No posts available.</p>
            <?php else: ?>
                <?php while ($post = $home->fetch_object()): ?>
                    <div class="gallery-item">
                        <a href="?c=Post&m=detail&id=<?php echo $post->id; ?>">
                            <img src="uploads/<?php echo $post->gambar; ?>" class="gallery-image" alt="Post Image">
                        </a>
                        <h3><?php echo $post->judul; ?></h3>
                        <div class="btn-group">
                            <a href="?c=Post&m=detail&id=<?php echo $post->id; ?>" class="btn-detail">See Details</a>
                            <a href="?c=Post&m=edit&id=<?php echo $post->id; ?>" class="btn-edit">Edit</a>
                            <a href="?c=Post&m=delete&id=<?php echo $post->id; ?>" class="btn-delete">Delete</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>