<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "online_library_management_system");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $book_id = $_POST['book_id'];
    $duration = $_POST['duration'];
    $issue_date = date("Y-m-d"); // Current date

    // Insert the issued book into the issued_books table
    $query = "INSERT INTO bookings (user_id, book_id, booking_date, duration, mode) 
              VALUES ('$user_id', '$book_id', '$issue_date', '$duration', 'offline')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Book issued successfully!');
                window.location.href = 'manage_books.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="issuebook.css">
    <title>Issue Book</title>
</head>
<body>
    <h1>Issue a Book</h1>
    <form method="POST" action="issuebook.php">
        <label for="user_id">Select User:</label>
        <select name="user_id" id="user_id" required>
            <?php
            // Fetch users from the database
            $result = mysqli_query($conn, "SELECT usid, name FROM users");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['usid'] . "'>" . $row['name'] . " (ID: " . $row['usid'] . ")</option>";
            }
            ?>
        </select>
        <br>

        <label for="book_id">Select Book:</label>
        <select name="book_id" id="book_id" required>
            <?php
            // Fetch books from the database
            $result = mysqli_query($conn, "SELECT book_id, title FROM books");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['book_id'] . "'>" . $row['title'] . "</option>";
            }
            ?>
        </select>
        <br>

        <label for="duration">Issue Duration:</label>
        <select name="duration" id="duration" required>
            <option value="1_week">1 Week</option>
            <option value="2_weeks">2 Weeks</option>
            <option value="1_month">1 Month</option>
        </select>
        <br>

        <input type="submit" value="Issue Book">
    </form>
</body>
</html>

