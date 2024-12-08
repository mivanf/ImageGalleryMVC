<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <!-- Menjalankan Controller Auth dengan Method register_process -->
        <form action="?c=Auth&m=register_process" method="post">
            <label>Username:</label>
            <input type="text" name="username" required><br>
            <label>Password:</label>
            <input type="password" name="password" required><br>
            <input type="submit" value="Register">
        </form>

        <!-- Menjalankan Controller Auth dengan Method login_form -->
        <a href="?c=Auth&m=login_form" class="btn-detail">Login Here</a>
    </div>
</body>
</html>