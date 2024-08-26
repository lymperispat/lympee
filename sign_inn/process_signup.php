<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $citizen_name = $_POST['citizen_name'];
    $citizen_surname = $_POST['citizen_surname'];
    $citizen_phone = $_POST['citizen_phone'];

    // Hash the password before saving it to the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username already exists
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username already exists
        echo "Username already taken. Please choose another.";
    } else {
        // Insert new user into the database
        $sql = "INSERT INTO users (username, password, citizen_name, citizen_surname, citizen_phone, creation_datetime) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param("sssss", $username, $hashed_password, $citizen_name, $citizen_surname, $citizen_phone);

        if ($stmt->execute()) {
            // Registration successful, redirect to sign in
            echo "Registration successful! You can now <a href='signin.php'>sign in</a>.";
        } else {
            echo "Error: " . htmlspecialchars($stmt->error);
        }
    }

    $stmt->close();
}
$conn->close();
?>
