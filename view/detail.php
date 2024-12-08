<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ?c=Auth&m=login_form');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Details</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h4>Image Details</h4>
        <?php if ($post): ?>
        <h2><?php echo $post->judul; ?></h2>
        <img src="uploads/<?php echo $post->gambar; ?>" alt="<?php echo $post->judul; ?>" class="img-detail"><br>
        <p><strong>Title: <?php echo $post->judul; ?></strong></p>
        <p>Deskripsi: <?php echo $post->deskripsi; ?></p>
        <p>Nama Pengunggah: <?php echo $post->nama_uploader; ?></p>
        <p>Email Pengunggah: <?php echo $post->email_uploader; ?></p>
        <p>Tanggal Upload: <?php echo $post->tanggal_upload; ?></p>
        
        <a href="?c=Post" class="back">Back to Home</a>
        <a>|</a>
        <a href="?c=Post&m=edit&id=<?php echo $post->id; ?>" class="btn-edit">Edit</a>
        <a href="?c=Post&m=delete&id=<?php echo $post->id; ?>" class="btn-delete">Delete</a>
        <?php else: ?>
            <p>Data tidak ditemukan.</p>
            <a href="?c=Post" class="back">Back to Home</a>
        <?php endif; ?>
    </div>
</body>
</html>