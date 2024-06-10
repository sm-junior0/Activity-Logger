<?php
include 'connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];

    $sql = "INSERT INTO user_student (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <form method="post" action="">
        <h1>Register</h1>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <input type="submit" value="Register">
        <div class="register">
            Already have account? <a href="login.php">Login now</a>
        </div>
    </form>
</body>
</html>
