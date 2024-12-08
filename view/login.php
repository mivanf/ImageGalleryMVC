<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <!-- Menjalankan Controller Auth dengan Method login_process -->
        <form action="?c=Auth&m=login_process" method="post">
            <label>Username:</label>
            <input type="text" name="username" required><br>
            <label>Password:</label>
            <input type="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>
        
        <?php if (isset($_GET['message'])): ?>
            <div>
                <!-- Menampilkan pesan jika berhasil registrasi -->
                <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>

        <!-- Menjalankan Controller Auth dengan Method register_form -->
        <a href="?c=Auth&m=register_form" class="btn-detail">Register Here</a>
    </div>
</body>
</html>