<?php
// Check if username is provided in the URL
if (isset($_GET['username'])) {
    // File path
    $file_path = "users.txt";

    // Read file into array
    $lines = file($file_path, FILE_IGNORE_NEW_LINES);

    // Search for user data by username
    foreach ($lines as $key => $line) {
        $data = explode(',', $line);
        if (trim($data[0]) === $_GET['username']) {
            // Remove user data from array
            unset($lines[$key]);
            break;
        }
    }

    // Save updated data back to file
    file_put_contents($file_path, implode("\n", $lines));
}

// Redirect to user data page after deletion
header("Location: index.php");
exit;
?>
