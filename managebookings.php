<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "online_library_management_system");
if (!$conn) {
    echo "Database connection failed:";
    exit();
}

// Update the query to fetch book_id, author_name, status, and mode
$query = "
SELECT b.id AS booking_id, 
       u.username AS user_name, 
       bk.book_id, 
       bk.title AS book_name,
       bk.author AS author,
       b.booking_date, 
       b.duration, 
       b.status, 
       b.mode 
FROM bookings b 
LEFT JOIN users u ON b.user_id = u.usid 
LEFT JOIN books bk ON b.book_id = bk.book_id;
";
$result = mysqli_query($conn, $query);

// Check for form submission to update status
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['return'])) {
    $booking_id = $_POST['booking_id'];
    $update_query = "UPDATE bookings SET status = 'returned' WHERE id = '$booking_id'";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>
                alert('Status Updated!');
                window.location.href = 'managebookings.php';
              </script>";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings - Online Library Management System</title>
    <link rel="stylesheet" href="managebookings.css"> <!-- Link to your CSS file -->
</head>
<body>
<nav class="navbar">
    <div class="navbar">
        <a href="./admin.html">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
        <div class="link">
            <a href="admin.html">Home</a>
        </div>
    </div>
</nav>

<main>
    <h1>Manage Bookings</h1>
    
    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>User Name</th>
                <th>Book ID</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Booking Date</th>
                <th>Duration (days)</th>
                <th>Status</th>
                <th>Mode</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo htmlspecialchars($row['booking_id']); ?></td>
                <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                <td><?php echo htmlspecialchars($row['book_id']); ?></td>
                <td><?php echo htmlspecialchars($row['book_name']); ?></td>
                <td><?php echo htmlspecialchars($row['author']); ?></td>
                <td><?php echo htmlspecialchars($row['booking_date']); ?></td>
                <td><?php echo htmlspecialchars($row['duration']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
                <td><?php echo htmlspecialchars($row['mode']); ?></td>
                <td>
                    <?php if ($row['status'] != 'returned') : ?>
                        <form method="POST" action="">
                            <input type="hidden" name="booking_id" value="<?php echo htmlspecialchars($row['booking_id']); ?>">
                            <input type="submit" name="return" value="Mark as Returned">
                        </form>
                    <?php else: ?>
                        Returned
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</main>

</body>
</html>
