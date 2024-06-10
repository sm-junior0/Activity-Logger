<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM logbook_entries WHERE id='$id' AND user_id='{$_SESSION['user_id']}'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header("Location: home.php");
    exit();
}

$entry = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entry_date = $_POST['entry_date'];
    $week = $_POST['week'];
    $day = $_POST['day'];
    $activity_description = $_POST['activity_description'];
    $working_hours = $_POST['working_hours'];

    $sql = "UPDATE logbook_entries SET 
            entry_date='$entry_date', week='$week', day='$day', 
            activity_description='$activity_description', working_hours='$working_hours' 
            WHERE id='$id' AND user_id='{$_SESSION['user_id']}'";

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
    <title>Edit Entry</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <form method="post" action="">
        <h1>Edit Logbook Entry</h1>
        <label for="entry_date">Date:</label>
        <input type="date" name="entry_date" id="entry_date" value="<?php echo $entry['entry_date']; ?>" required><br>
        <label for="week">Week:</label>
        <input type="number" name="week" id="week" value="<?php echo $entry['week']; ?>" required><br>
        <label for="day">Day:</label>
        <select name="day" id="day" required>
            <option value="MON" <?php if ($entry['day'] == 'MON') echo 'selected'; ?>>Monday</option>
            <option value="TUE" <?php if ($entry['day'] == 'TUE') echo 'selected'; ?>>Tuesday</option>
            <option value="WED" <?php if ($entry['day'] == 'WED') echo 'selected'; ?>>Wednesday</option>
            <option value="THU" <?php if ($entry['day'] == 'THU') echo 'selected'; ?>>Thursday</option>
            <option value="FRI" <?php if ($entry['day'] == 'FRI') echo 'selected'; ?>>Friday</option>
        </select><br>
        <label for="activity_description">Activity Description:</label>
        <textarea name="activity_description" id="activity_description" required><?php echo $entry['activity_description']; ?></textarea><br>
        <label for="working_hours">Working Hours:</label>
        <input type="number" step="0.1" name="working_hours" id="working_hours" value="<?php echo $entry['working_hours']; ?>" required><br>
        <input type="submit" value="Update Entry">
    </form>
</body>
</html>
