<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $sql = "DELETE FROM logbook_entries WHERE id='$id' AND user_id='{$_SESSION['user_id']}'";

    if ($conn->query($sql) === TRUE) {
        header("Location: home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
