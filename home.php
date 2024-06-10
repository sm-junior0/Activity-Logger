<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$entries = $conn->query("SELECT * FROM logbook_entries WHERE user_id='$user_id' ORDER BY entry_date DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>
    <a href="logout.php" class="logout-link"> <i class="fa fa-sign-out"></i> Logout </a>
    <h3>Your Logbook Entries</h3>
    <a href="new_entry.php" class="new-entry">Add New Entry</a>
    <table>
        <tr>
            <th>Date</th>
            <th>Week</th>
            <th>Day</th>
            <th>Description</th>
            <th>Hours</th>
            <th>Action</th>
        </tr>
        <?php while($entry = $entries->fetch_assoc()): ?>
        <tr>
            <td><?php echo $entry['entry_date']; ?></td>
            <td><?php echo $entry['week']; ?></td>
            <td><?php echo $entry['day']; ?></td>
            <td><?php echo $entry['activity_description']; ?></td>
            <td><?php echo $entry['working_hours']; ?></td>
            <td>
                <a class="edit" href="edit_entry.php?id=<?php echo $entry['id']; ?>">Edit</a>
                <form method="post" action="delete_entry.php" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $entry['id']; ?>">
                    <input type="submit" class="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this entry?');">
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
