<!DOCTYPE html>
<html>
<head>
    <title>Library Management System</title>
    <link rel="stylesheet" href="reg.css">
</head>
<body>
<nav class="nanbar">
    <div class="navbar">
        <a href="./index.html">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
        <div class="link">
            <a href="./index.html">Home</a>
            <a href="./login.php">Login</a>
            <a href="./fee.php">Feedback</a>
        </div>
    </div>
</nav>

<div class="logincontainer">
    <h1 class="LoginHead"><b>MES COLLEGE MARAMPALLY</b></h1>
    <form class="loginform" action="" method="post">
        <h3 class="abcd"><b>REGISTER ONLINE LIBRARY MANAGEMENT SYSTEM</b></h3>
        <input class="doc1" type="text" name="name" placeholder="Name" required><br>
        <input class="doc1" type="text" name="phonenumber" placeholder="Phone Number" required><br>
        <input class="doc1" type="email" name="email" placeholder="E-mail" required><br>
        <input class="doc1" type="text" name="username" placeholder="Username" required><br>
        <input class="doc1" type="password" name="password" placeholder="Password" required><br>
        <input class="doc1" type="password" name="confirmpassword" placeholder="Confirm Password" required><br>
        
        <!-- Dropdown to select user type -->
        <select class="doc1" name="usertype" required>
            <option value="0">Student</option>
            <option value="1">Teacher</option>
        </select><br>

        <input class="LoginButton" type="submit" name="submit" value="SIGN UP">
    </form>
</div>

</body>
</html>

<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "online_library_management_system");
if (!$conn) {
    die("Database connection failed:");
}

if (isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];  // Get usertype (0 for student, 1 for teacher)

    // Check if passwords match
    if ($password === $confirmpassword) {

        // Insert data into the login table
        $login_sql = "INSERT INTO `login` (`email`, `password`, `user_type`) VALUES ('$email', '$password', '$usertype')";
        $login_data = mysqli_query($conn, $login_sql);

        if ($usertype == 0) {
            // Insert into users table for Student
            $user_sql = "INSERT INTO `users` (`name`, `phonenumber`, `email`, `username`, `password`) 
                         VALUES ('$name', '$phonenumber', '$email', '$username', '$password')";
            $user_data = mysqli_query($conn, $user_sql);
        } elseif ($usertype == 1) {
            // Insert into teacher table for Teacher
            $teacher_sql = "INSERT INTO `teacher` (`username`, `phonenumber`, `email`, `password`) 
                            VALUES ('$username', '$phonenumber', '$email', '$password')";
            $teacher_data = mysqli_query($conn, $teacher_sql);
        }

        if ($login_data && ($user_data || $teacher_data)) {
            echo "<script>alert('Record added successfully');</script>";
        } else {
            echo "<script>alert('Error while adding record');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match');</script>";
    }
}

mysqli_close($conn);
?>
