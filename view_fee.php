
<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "online_library_management_system");
if (!$conn) {
    die("Database not connected: " . mysqli_connect_error());
}

// Handle deleting messages if needed (optional)
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteSql = "DELETE FROM messages WHERE id='$id'";
    if (mysqli_query($con, $deleteSql)) {
        echo "<p style='color:green;'>Message deleted!</p>";
        header('Location: view_fee.php');
        exit();
    } else {
        echo "<p style='color:red;'>Error: " . mysqli_error($con) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View Messages</title>
    <link rel="stylesheet" href="view_fee.css">
    
</head>
<body>
    <nav>
        <ul>
            <li><a href="admin.html">Dashboard</a></li>
            <li><a href="view_fee.php">View Messages</a></li>
            <li><a href="index.html">Logout</a></li>
        </ul>
    </nav>

    <h1>User Messages</h1>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch messages from the database
            $messages = mysqli_query($conn, "SELECT * FROM feedback");
            if (mysqli_num_rows($messages) > 0) {
                while ($row = mysqli_fetch_assoc($messages)) {
                    echo "<tr>
                            <td>{$row['username']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['message']}</td>
                            <td>
                                <a class='delete-link href='view_fee.php'?}' onclick='return confirm(\"Are you sure you want to delete this message?\");'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No messages found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>