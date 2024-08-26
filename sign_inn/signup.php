<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <form action="process_signup.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="citizen_name">First Name:</label>
        <input type="text" id="citizen_name" name="citizen_name" required><br>

        <label for="citizen_surname">Last Name:</label>
        <input type="text" id="citizen_surname" name="citizen_surname" required><br>

        <label for="citizen_phone">Phone Number:</label>
        <input type="text" id="citizen_phone" name="citizen_phone" required><br>

        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
