<?php
include 'connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user_student WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            header("Location: home.php");
            exit();
        } else {
            echo "<p class='error'>Invalid password.</p>";
        }
    } else {
        echo "<p class='error'>No user found with that username.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <form method="post" action="">
        <h1>Login</h1>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" value="Login">
        <div class="register">
            Don't have an account? <a href="register.php">Sign up now</a>
        </div>
        <div class="register">
            Don't want to Login? <a href="index.php">Back home</a>
        </div>
    </form>
</body>
</html>
