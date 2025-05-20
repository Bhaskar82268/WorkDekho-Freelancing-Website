<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include DB connection
include("includes/db.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {

    // Get form data safely
    $fullname = isset($_POST["fullname"]) ? trim($_POST["fullname"]) : '';
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : '';
    $confirm_password = isset($_POST["confirm_password"]) ? trim($_POST["confirm_password"]) : '';

    // Validate fields
    if (!empty($fullname) && !empty($email) && !empty($password) && !empty($confirm_password)) {

        if ($password !== $confirm_password) {
            echo "Passwords do not match!";
            exit();
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Prepare SQL
        $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $fullname, $email, $hashed_password);

            // Execute query
            if ($stmt->execute()) {
                header("Location: login.html"); // Redirect to login after registration
                exit();
            } else {
                echo "Database Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Prepare failed: " . $conn->error;
        }

    } else {
        echo "All fields are required!";
    }
}
?>
