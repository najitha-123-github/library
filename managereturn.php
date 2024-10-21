<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "online_library_management_system");
if (!$conn) {
    die("Database connection failed:");
}

// Update the SQL query to select all bookings
$sql = "
SELECT u.usid AS user_id, u.username, b.title AS book_title, bk.booking_date, bk.duration 
FROM bookings bk
LEFT JOIN books b ON bk.book_id = b.book_id
LEFT JOIN users u ON bk.user_id = u.usid;

";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="managereturn.css">
    <title>Returning Books</title>
</head>
<body>

<nav class="navbar">
        <div class="navbar">
            <a class="head"   href="./admin.html">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
            <div class="link">
                <a href="./manage_books.php">Home</a>
            </div>
        </div>
    </nav>

<div class="doc">
    <h1>All Bookings</h1>
</div>

<div class="returning-table">
    <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <tr>
                <th>User Name</th>
                <th>Book Title</th>
                <th>Booking Date</th>
                <th>Days Left for Returning</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['book_title']); ?></td>
                    <td><?php echo htmlspecialchars($row['booking_date']); ?></td>
                    <td>
                        <?php 
                        $bookingDate = new DateTime($row['booking_date']);
                        $duration = $row['duration'];

                        // Calculate return date based on duration
                        $returnDate = clone $bookingDate; // Clone to keep original booking date
                        if ($duration === '1_week') {
                            $returnDate->modify('+1 week');
                        } elseif ($duration === '2_weeks') {
                            $returnDate->modify('+2 weeks');
                        } elseif ($duration === '1_month') {
                            $returnDate->modify('+1 month');
                        }

                        // Calculate days left
                        $today = new DateTime();
                        $daysLeft = $returnDate->diff($today)->days;

                        if ($today < $returnDate) {
                            echo htmlspecialchars($daysLeft);
                        } else {
                            echo "Overdue"; 
                        }
                        ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No bookings found.</p>
    <?php endif; ?>
</div>

</body>
</html>

<?php
mysqli_close($conn);
?>
