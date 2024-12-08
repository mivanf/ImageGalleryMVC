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
        <h2>Add New Image</h2>
        <!-- Menjalankan Controller Post dengan Method addNew_process -->
        <form action="?c=Post&m=addNew_process" method="post" enctype="multipart/form-data">
            <label>Title:</label>
            <input type="text" name="judul" required><br>
            <label>Description:</label>
            <input type="text" name="deskripsi" required><br>
            <label>Uploader Name:</label>
            <input type="text" name="nama_uploader" required><br>
            <label>Uploader Email:</label>
            <input type="email" name="email_uploader" required><br>
            <label>Upload Date:</label>
            <input type="date" name="tanggal_upload" required><br>
            <label>New Image:</label>
            <input type="file" name="gambar" required><br>
            <input type="submit" value="Add Post">

            <!-- Menjalankan Controller Post dengan Method index -->
            <a href="?c=Post&m=index" class="btn-detail">Back to Home</a>
        </form>
    </div>
</body>
</html>