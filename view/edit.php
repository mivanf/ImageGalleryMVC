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
    <title>Upload Form</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Edit Image Details</h2>
        <!-- Menjalankan Controller Post dengan Method update -->
        <form action="?c=Post&m=update" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $post->id; ?>">
            <label>Title: </label>
            <input type="text" name="judul" value="<?php echo $post->judul; ?>" required><br>
            <label>Description: </label>
            <input type="text" name="deskripsi" value="<?php echo $post->deskripsi; ?>" required><br>
            <label>Uploader Name: </label>
            <input type="text" name="nama_uploader" value="<?php echo $post->nama_uploader; ?>" required><br>
            <label>Uploader Email: </label>
            <input type="email" name="email_uploader" value="<?php echo $post->email_uploader; ?>" required><br>
            <label>Upload Date: </label>
            <input type="date" name="tanggal_upload" value="<?php echo $post->tanggal_upload; ?>" required><br>
            <label>New Image: </label>
            <input type="file" name="gambar"><br>
            <input type="submit" value="Update Post">

            <!-- Menjalankan Controller Post dengan Method index -->
            <a href="?c=Post&m=index" class="btn-detail">Back to Home</a>
        </form>
    </div>
</body>
</html>