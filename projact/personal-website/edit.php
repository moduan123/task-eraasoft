<?php
// Check if username is provided in the URL
if (isset($_GET['username'])) {
    // File path
    $file_path = "users.txt";

    // Read file into array
    $lines = file($file_path, FILE_IGNORE_NEW_LINES);

    // Search for user data by username
    foreach ($lines as $line) {
        $data = explode(',', $line);
        if (trim($data[0]) === $_GET['username']) {
            $username = trim($data[0]);
            $email = trim($data[1]);
            $role = trim($data[2]);
            break;
        }
    }
}

// If no username found or provided, redirect to user data page
if (!isset($username)) {
    header("Location: index.php");
    exit;
}

// Check if form is submitted for updating user data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update user data
    $new_data = $_POST["username"] . "," . $_POST["email"] . "," . $_POST["role"];

    // Replace old data with new data
    foreach ($lines as &$line) {
        if (strpos($line, $username) === 0) {
            $line = $new_data;
            break;
        }
    }

    // Save updated data back to file
    file_put_contents($file_path, implode("\n", $lines));

    // Redirect to user data page after updating
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" readonly><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br>
        <label for="role">Role:</label><br>
        <input type="text" id="role" name="role" value="<?php echo $role; ?>"><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
