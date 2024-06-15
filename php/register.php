<?php
// Example registration script (simplified)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate inputs (add validation as needed)

    // Hash password (use password_hash() in production)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Save to database (example function)
    include_once 'db_functions.php';
    if (registerUser($username, $hashed_password)) {
        // Registration successful, redirect to login page
        header('Location: ../login.html');
        exit();
    } else {
        // Registration failed
        echo "Registration failed.";
    }
}
?>
