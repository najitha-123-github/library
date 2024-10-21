<?php
        $conn = mysqli_connect("localhost", "root", "", "online_library_management_system");
        if (!$conn) {
            echo "Database connection failed:";
            exit();
        }

$query = "
SELECT b.id AS booking_id, 
       u.username AS user_name, 
       bk.title AS book_name,
       b.booking_date, 
       b.duration 
FROM bookings b 
LEFT JOIN users u ON b.user_id = u.usid 
LEFT JOIN books bk ON b.book_id = bk.book_id;
";
$result = mysqli_query($conn, $query);
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
            <a class="head"  href="./admin.html">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
            <div class="link">
                <a href="./manage_books.php">Home</a>
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
                    <th>Book Name</th>
                    <th>Booking Date</th>
                    <th>Duration (days)</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['booking_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['book_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['booking_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['duration']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </main>

</body>
</html>
