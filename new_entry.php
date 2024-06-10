<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entry_date = $_POST['entry_date'];
    $week = $_POST['week'];
    $day = $_POST['day'];
    $activity_description = $_POST['activity_description'];
    $working_hours = $_POST['working_hours'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO logbook_entries (entry_date, week, day, activity_description, working_hours, user_id) 
            VALUES ('$entry_date', '$week', '$day', '$activity_description', '$working_hours', '$user_id')";

    if ($conn->query($sql) === TRUE) {
        header("Location: home.php");
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
    <title>New Entry</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <form method="post" action="">
        <h1>New Logbook Entry</h1>
        <label for="entry_date">Date:</label>
        <input type="date" name="entry_date" id="entry_date" required><br>
        <label for="week">Week:</label>
        <input type="number" name="week" id="week" required><br>
        <label for="day">Day:</label>
        <select name="day" id="day" required>
            <option value="MON">Monday</option>
            <option value="TUE">Tuesday</option>
            <option value="WED">Wednesday</option>
            <option value="THU">Thursday</option>
            <option value="FRI">Friday</option>
        </select><br>
        <label for="activity_description">Activity Description:</label>
        <textarea name="activity_description" id="activity_description" required></textarea><br>
        <label for="working_hours">Working Hours:</label>
        <input type="number" step="0.1" name="working_hours" id="working_hours" required><br>
        <input type="submit" value="Add Entry">
    </form>
</body>
</html>
