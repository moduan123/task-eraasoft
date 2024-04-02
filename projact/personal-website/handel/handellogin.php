
<?php
//session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Read user data from file
    //$userData = file('user.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    // Loop through each line in the file
    // foreach ($userData as $line) {
    //     $fields = explode(',', $line);
    //     $storedEmail = $fields[1];
    //     $storedPassword = $fields[2];
        
        // Check if email and password match
        if ($email =="mahmoudmodian34@gmail.com"&& $password == "123456") {
            // Authentication successful, redirect user to dashboard or another page
            $_SESSION['email'] = $email;
            header("Location: ../admin.php");
            exit;
        }
    }
    // If authentication fails, redirect back to login page with error message
    header("Location: ../login.php");
    exit;

?>
